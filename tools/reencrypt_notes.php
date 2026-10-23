<?php
/**
 * One-off: re-encrypt doctors' notes saved with the old fixed-IV scheme
 * into the new AES-256-GCM format. Run from the command line only:
 *
 *   php tools/reencrypt_notes.php
 *
 * Safe to run more than once (already converted values are skipped).
 * Afterwards, remove the MENZI_LEGACY_* lines from includes/secrets.php.
 */
if (PHP_SAPI !== 'cli') {
    http_response_code(404);
    exit;
}
$_SERVER['REQUEST_METHOD'] = 'GET';
require __DIR__ . '/../includes/config.php';

$columns = ['dn_patient_history', 'dn_physical_examination', 'dn_investigation', 'dn_diagonisis', 'dn_treatment'];
$res = db_query("SELECT dn_id, " . implode(',', $columns) . " FROM doctors_narrations");
$converted = 0;
while ($row = mysqli_fetch_assoc($res)) {
    $set = [];
    $params = [];
    foreach ($columns as $col) {
        $value = (string)$row[$col];
        if ($value === '' || strpos($value, 'v2:') === 0) {
            continue;
        }
        $set[] = "$col = ?";
        $params[] = menzi_encrypt(menzi_decrypt($value));
    }
    if ($set) {
        $params[] = $row['dn_id'];
        db_query("UPDATE doctors_narrations SET " . implode(', ', $set) . " WHERE dn_id = ?", $params);
        $converted++;
    }
}
echo "Re-encrypted $converted note rows." . PHP_EOL;
