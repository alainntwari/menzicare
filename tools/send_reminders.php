<?php
/**
 * Text patients a reminder the day before their appointment.
 * Run once a day from cron (command line only), e.g. every day at 18:00:
 *
 *   0 18 * * * php /path/to/menzicare/tools/send_reminders.php
 *
 * Needs database/migrations/002_audit_and_reminders.sql. Each booking is
 * reminded at most once (tracked in sms_reminders), so running it again is safe.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
$_SERVER['REQUEST_METHOD'] = 'GET';
require __DIR__ . '/../includes/config.php';
require __DIR__ . '/../aionem.net/api/aionem.net.php';

$tomorrow = strtotime('tomorrow');
// Dates are stored as text: doctor bookings as "5-Oct-2026", tests/vaccines as "2026-10-05"
$dates = array_unique([date('j-M-Y', $tomorrow), date('d-M-Y', $tomorrow), date('Y-m-d', $tomorrow)]);
$in = implode(',', array_fill(0, count($dates), '?'));

$kinds = [
    'DOCTOR' => "SELECT b.b_id AS id, b.b_booking_code AS code, b.b_appointment_date AS day, b.b_appointment_time AS time,
                        CONCAT('Dr ', b.name, ' (', b.sp_name, ')') AS what, hi.hi_institute AS place, u.phone_number AS phone
                 FROM bookings_view b
                 JOIN users u ON u.user_id = b.b_ref_user
                 LEFT JOIN healthcare_institutions hi ON hi.hi_id = b.ref_healthcare_providers
                 WHERE b.b_status IN ('APPROVED','PAYMENT PENDING') AND b.b_appointment_date IN ($in)",
    'TEST' => "SELECT t.bt_id AS id, t.bt_booking_code AS code, t.bt_appointment_date AS day, '' AS time,
                      t.test_name AS what, hi.hi_institute AS place, u.phone_number AS phone
               FROM booking_tests_view t
               JOIN users u ON u.user_id = t.bt_ref_user
               LEFT JOIN healthcare_institutions hi ON hi.hi_id = t.ti_ref_institute
               WHERE t.bt_status NOT IN ('REJECTED','CANCELLED') AND t.bt_appointment_date IN ($in)",
    'VACCINE' => "SELECT v.bv_id AS id, v.bv_booking_code AS code, v.bv_appointment_date AS day, '' AS time,
                         CONCAT(v.vaccine_name, ' vaccine') AS what, hi.hi_institute AS place, u.phone_number AS phone
                  FROM booking_vaccines_view v
                  JOIN users u ON u.user_id = v.bv_ref_user
                  LEFT JOIN healthcare_institutions hi ON hi.hi_id = v.vi_ref_institute
                  WHERE v.bv_status NOT IN ('REJECTED','CANCELLED') AND v.bv_appointment_date IN ($in)",
];

$sent = 0;
foreach ($kinds as $type => $sql) {
    $res = db_query($sql, $dates);
    if (!($res instanceof mysqli_result)) {
        echo "Could not read $type bookings - check the PHP error log." . PHP_EOL;
        continue;
    }
    while ($row = mysqli_fetch_assoc($res)) {
        // Claim the booking first; if the row already exists it was reminded before
        $claimed = db_query("INSERT IGNORE INTO sms_reminders (sr_booking_type, sr_booking_id, sr_sent_at) VALUES (?, ?, NOW())", [$type, $row['id']]);
        if (!$claimed || mysqli_affected_rows($con) !== 1) {
            continue;
        }
        $when = trim('tomorrow ' . $row['day'] . ($row['time'] !== '' ? ' at ' . $row['time'] : ''));
        $message = 'Reminder: your MenziCare appointment for ' . $row['what'] . ' is ' . $when
            . ($row['place'] ? ' at ' . $row['place'] : '') . '. Appointment code ' . $row['code'] . '.';
        AioNem_Net_API_SMS_Send_Net('+250' . $row['phone'], $message);
        $sent++;
    }
}
echo "Sent $sent reminder(s) for " . date('Y-m-d', $tomorrow) . '.' . PHP_EOL;
