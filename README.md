# MenziCare

## Setup

Requirements: PHP 7.4+ (with `mysqli`/mysqlnd and `openssl`), MySQL/MariaDB, Apache.

1. `cp includes/connection.sample.php includes/connection.php` and fill in the database credentials.
2. `cp includes/secrets.sample.php includes/secrets.php` and fill in:
   - the AioNem SMS/mail credentials,
   - `MENZI_ENCRYPTION_KEY`: generate with `php -r "echo base64_encode(random_bytes(32)), PHP_EOL;"`
     and keep a backup, because the doctors' notes can't be read without it.
3. Run `database/migrations/001_security.sql` on the database (back it up first).
4. Optional, once: `php tools/reencrypt_notes.php` moves old notes to the new encryption.
   After that, remove the `MENZI_LEGACY_*` lines from `includes/secrets.php`.

Both `connection.php` and `secrets.php` are git-ignored. Never commit them.

## Roles

| id | role |
|----|------|
| 1 | Super Admin |
| 2 | Doctor |
| 3 | Institution Admin |
| 4 | Patient |

## Security conventions

Helpers live in `includes/security.php` and are loaded by `includes/config.php`:

- Escape all output with `e()`, and links with `e_url()`.
- Protect pages and handlers with `require_login()` / `require_role(ROLE_...)`.
- Every POST form needs `<?php echo csrf_field(); ?>`. `config.php` rejects POSTs without a valid token.
- Use `db_query()` / `db_row()` (prepared statements) for anything that comes from the request.
- Encrypt medical notes with `menzi_encrypt()` / `menzi_decrypt()`.
