<?php
require '../includes/config.php';
require('../aionem.net/api/aionem.net.php');

// Password reset by SMS, in two steps on this page:
//   1. login code or phone number -> a 6-digit code is texted to the account's phone
//   2. code + new password        -> password is replaced
// The same message is shown whether or not an account was found, so the form
// cannot be used to discover who has an account.

$step = $_POST['step'] ?? '';

if ($step === 'request') {
	$wait = otp_resend_wait($_SESSION['password_reset'] ?? null);
	if ($wait > 0) {
		flash_redirect('Please wait ' . $wait . ' seconds before requesting a new code', 'forgot_password.php', 'warning');
	}
	$login = trim($_POST['login'] ?? '');
	$user = find_user_by_login($login);
	$code = otp_generate();
	// A record is stored even when no user matched, so both cases behave the same
	$_SESSION['password_reset'] = otp_record($code, ['user_id' => $user ? (int)$user['user_id'] : 0]);
	if ($user) {
		AioNem_Net_API_SMS_Send_Net('+250' . $user['phone_number'], $code . ' is your MenziCare password reset code');
		audit('password_reset_requested', ['user_id' => $user['user_id']]);
	}
	flash_redirect('If an account matches, we sent a 6-digit code to its phone number', 'forgot_password.php', 'info');
}

if ($step === 'reset') {
	if (empty($_SESSION['password_reset'])) {
		flash_redirect('Please request a reset code first', 'forgot_password.php');
	}
	$password = (string)($_POST['password'] ?? '');
	if (strlen($password) < 8) {
		flash_redirect('Your new password must be at least 8 characters long', 'forgot_password.php');
	}
	if (!hash_equals($password, (string)($_POST['password-repeat'] ?? ''))) {
		flash_redirect('The two passwords do not match', 'forgot_password.php');
	}

	$reset = &$_SESSION['password_reset'];
	$check = otp_check($reset, $_POST['code'] ?? '');
	if ($check === 'wrong' || ($check === 'ok' && empty($reset['user_id']))) {
		flash_redirect('Wrong code. Please check the SMS and try again', 'forgot_password.php');
	}
	if ($check !== 'ok') {
		unset($reset, $_SESSION['password_reset']);
		flash_redirect('This code has expired or too many wrong codes were entered. Please request a new one', 'forgot_password.php');
	}
	if (!password_column_ready()) {
		error_log('MenziCare: run database/migrations/001_security.sql (users.password too short for hashes)');
		flash_redirect('Passwords cannot be changed right now. Please contact the system admin', '../login/');
	}

	$user_id = (int)$reset['user_id'];
	unset($reset, $_SESSION['password_reset']);
	db_query("UPDATE users SET password = ? WHERE user_id = ?", [password_hash($password, PASSWORD_DEFAULT), $user_id]);
	audit('password_reset', ['user_id' => $user_id]);
	flash_redirect('Your password has been changed. You can now login with it', '../login/', 'success');
}

if ($step === 'restart' && !empty($_SESSION['password_reset'])) {
	// Back to step 1; the record stays so the resend wait still applies
	$_SESSION['password_reset']['restart'] = true;
	header('Location: forgot_password.php');
	exit();
}

$code_sent = !empty($_SESSION['password_reset']) && empty($_SESSION['password_reset']['restart']);
include '../includes/auth_head.php';
?>
            <h1>Reset Password</h1>
            <?php if (!$code_sent) { ?>
            <form action="forgot_password.php" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="step" value="request">
              <p>Enter your login code or the phone number of your account. We will send you a code by SMS.</p>
              <div>
                <label class="sr-only" for="login">Login code or phone number</label>
                <input type="text" class="form-control" id="login" name="login" placeholder="Login code or phone number" required="required" autocomplete="username" />
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Send code">
              </div>
            </form>
            <?php } else { ?>
            <form action="forgot_password.php" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="step" value="reset">
              <p>Enter the 6-digit code we sent by SMS and choose a new password.</p>
              <div>
                <label class="sr-only" for="code">Code from SMS</label>
                <input type="text" class="form-control" id="code" name="code" placeholder="Code from SMS" required="required" inputmode="numeric" autocomplete="one-time-code" maxlength="6" />
              </div>
              <div>
                <label class="sr-only" for="password">New password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New password (at least 8 characters)" required="required" minlength="8" autocomplete="new-password" />
              </div>
              <div>
                <label class="sr-only" for="password-repeat">Repeat new password</label>
                <input type="password" class="form-control" id="password-repeat" name="password-repeat" placeholder="Repeat new password" required="required" minlength="8" autocomplete="new-password" />
              </div>
              <div>
                <input type="submit" class="btn btn-success" value="Change password">
              </div>
            </form>
            <form action="forgot_password.php" method="POST" class="mt-2">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="step" value="restart">
              <button type="submit" class="btn btn-link btn-sm">Didn't get a code? Start again</button>
            </form>
            <?php } ?>
<?php include '../includes/auth_foot.php'; ?>
