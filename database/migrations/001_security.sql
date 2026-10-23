-- MenziCare security update - run once on the live database BEFORE deploying the new code.
-- Back up the database first.

-- 1. Room for bcrypt password hashes (60+ chars). Existing plain-text passwords
--    keep working and are upgraded to a hash the next time each user logs in.
ALTER TABLE users MODIFY password VARCHAR(255);

-- 2. Encrypted notes are now a bit longer (random IV + auth tag). Make sure the
--    note columns are TEXT. Skip any line whose column is already TEXT.
ALTER TABLE doctors_narrations
    MODIFY dn_patient_history TEXT NULL,
    MODIFY dn_physical_examination TEXT NULL,
    MODIFY dn_investigation TEXT NULL,
    MODIFY dn_diagonisis TEXT NULL,
    MODIFY dn_treatment TEXT NULL;
