-- MenziCare: audit log + appointment reminder tracking. Run once, after 001_security.sql.

-- Who did what to which patient / booking (written by audit() in includes/security.php,
-- shown to the super admin on audit-log/).
CREATE TABLE IF NOT EXISTS audit_log (
    al_id          BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    al_user_id     INT NULL,
    al_action      VARCHAR(64) NOT NULL,
    al_patient_id  INT NULL,
    al_booking_id  INT NULL,
    al_details     TEXT NULL,
    al_ip          VARCHAR(45) NULL,
    al_created_at  DATETIME NOT NULL,
    KEY idx_audit_created (al_created_at),
    KEY idx_audit_patient (al_patient_id),
    KEY idx_audit_user (al_user_id)
) DEFAULT CHARSET=utf8mb4;

-- One row per reminder SMS sent, so tools/send_reminders.php never texts twice.
CREATE TABLE IF NOT EXISTS sms_reminders (
    sr_booking_type  VARCHAR(10) NOT NULL,   -- DOCTOR, TEST or VACCINE
    sr_booking_id    INT NOT NULL,
    sr_sent_at       DATETIME NOT NULL,
    PRIMARY KEY (sr_booking_type, sr_booking_id)
) DEFAULT CHARSET=utf8mb4;
