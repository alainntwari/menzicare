<?php
/**
 * Copy this file to includes/secrets.php (git-ignored) and fill in real values.
 * Never commit includes/secrets.php.
 */

// Show PHP errors in the browser. Keep false on the live server.
define('APP_DEBUG', false);

// AioNem SMS / mail API credentials (get new ones - the old ones were committed to git)
define('AIONEM_UID', 'your_aionem_uid');
define('AIONEM_KEY', 'your_aionem_key');
define('AIONEM_SMS_FROM', 'Menzicare');
define('AIONEM_MAIL_EMAIL', 'info@example.com');
define('AIONEM_MAIL_PASSWORD', 'your_mail_password');
define('AIONEM_MAIL_FROM', 'MenziCare');
define('AIONEM_MAIL_REPLY', 'info@example.com');

// Key for encrypting doctors' notes: 32 random bytes, base64 encoded.
// Generate one with:  php -r "echo base64_encode(random_bytes(32)), PHP_EOL;"
// Keep a safe backup - losing it means losing access to all medical notes.
define('MENZI_ENCRYPTION_KEY', 'PASTE_BASE64_KEY_HERE');

// Old key/IV, only needed to read notes saved before the security update.
// Remove both lines after running tools/reencrypt_notes.php.
define('MENZI_LEGACY_ENCRYPTION_KEY', 'yann_vladimir_bajeneza');
define('MENZI_LEGACY_ENCRYPTION_IV', '1234567891011121');
