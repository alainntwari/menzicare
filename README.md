# MenziCare

MenziCare is a web app for booking healthcare in Rwanda. Patients find doctors, medical tests and
vaccinations at partner healthcare institutions and book appointments online, with SMS
confirmations. Doctors and institution admins manage the bookings, write consultation notes
(stored encrypted) and maintain doctor profiles. A super admin manages the institutions.

Plain PHP + MySQL, with the [Gentelella](https://github.com/ColorlibHQ/gentelella) admin theme
(Bootstrap 4, jQuery).

## Project structure

| Path | What it is |
|------|------------|
| `index.php` | Redirects to `home/` |
| `home/`, `doctor-appointments/`, `medical-tests/`, `vaccinations/` | Public search and booking pages |
| `make-new-appointment/` | Booking form for one doctor slot, test or vaccine |
| `login/` | Login and sign-up forms |
| `appointments/`, `patients/` | Bookings and patients for doctors and admins |
| `medical-records/` | A patient's own consultation notes |
| `users/`, `health-care-institutions/`, `online-users/` | Admin pages |
| `account/` | Change password (any logged-in user) |
| `audit-log/` | Audit log of sensitive actions (super admin) |
| `doctor-details/` | Public doctor profile, loaded via AJAX |
| `app/` | Form handlers (POST targets) and AJAX search endpoints |
| `includes/` | Shared config, security helpers, layout (head, sidebar, navigation, scripts) |
| `aionem.net/api/` | SMS / mail API client |
| `database/migrations/` | SQL to run on the database, in order |
| `tools/` | One-off command-line scripts |
| `build/`, `src/`, `vendors/`, `assets/` | Theme CSS/JS (and its sources), third-party libraries, images |

Pages are built from fragments: an `index.php` loads `includes/config.php`, then includes
`head.php`, `sidebar.php`, `top-navigation.php`, the page's own fragments, `footer.php` and
`scripts.php`. Fragment files start with `defined('MENZICARE_APP') || exit;` so they
can't be opened directly.

## Setup

Requirements: PHP 7.4+ (with `mysqli`/mysqlnd and `openssl`), MySQL/MariaDB, Apache.

1. `cp includes/connection.sample.php includes/connection.php` and fill in the database credentials.
2. `cp includes/secrets.sample.php includes/secrets.php` and fill in:
   - the AioNem SMS/mail credentials,
   - `MENZI_ENCRYPTION_KEY`: generate with `php -r "echo base64_encode(random_bytes(32)), PHP_EOL;"`
     and keep a backup, because the doctors' notes can't be read without it.
3. Back up the database, then run the files in `database/migrations/` in order
   (`001_security.sql`, `002_audit_and_reminders.sql`).
4. Optional, once: `php tools/reencrypt_notes.php` moves old notes to the new encryption.
   After that, remove the `MENZI_LEGACY_*` lines from `includes/secrets.php`.

Both `connection.php` and `secrets.php` are git-ignored. Never commit them.

### Daily appointment reminders

Schedule `tools/send_reminders.php` once a day (cron, or cPanel → Cron Jobs). It texts every patient
who has an appointment tomorrow, at most once per booking:

```
0 18 * * * php /path/to/menzicare/tools/send_reminders.php
```

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
- Record sensitive actions with `audit('action_name', ['patient_id' => ..., 'booking_id' => ...])`.
- End a handler with `flash_redirect($message, $location, 'success'|'error'|'info')`. It shows the
  message on the next page, or returns it as HTML for AJAX calls.
- Page JavaScript lives in `assets/js/menzicare.js`. Load fragments with `loadInto(id, url)`, which is async.
  Don't add inline `XMLHttpRequest` code.
