<?php
include('inc.functions.php');
$msg = $_GET['msg'];

if (isset($_POST['user']) && isset($_POST['pass'])) {
	if ((strlen($_POST['user']) > 0) and (strlen($_POST['pass']) > 0)
	  and ($login[$_POST['user']] == $_POST['pass'])) {
		$_SESSION['user_logged_in'] = true;
		header('Location: index.php?msg=Logged in.');
		exit;
	} else {
		unset($_SESSION['user_logged_in']);
		$msg = 'Sorry, wrong user id or password.';
	}
}

print_header('Login - Procesadores');

if ($_GET['action'] == 'logout') {
	unset($_SESSION['user_logged_in']);
	session_destroy();
}

if (strlen($msg) > 0) echo '<p id="msg">'.$msg.'</p>';
if ($_SESSION['user_logged_in'] != true) {
?>
<form action="" method="post">
<p>You need to log in to edit this database.</p>
<ul>
  <li><label>User: <input type="text" name="user" value="<?= stripslashes($_POST[user]) ?>" /></label></li>
  <li><label>Pass: <input type="password" name="pass" /></label></li>
</ul>
<p><input type="submit" value="Login" /></p>
</form>
<?
} else {
	echo '<p><a href="index.php">Go to Listing</a></p>';
}

print_footer();
?>