<?php
session_start();

if ($_SESSION['user']) {
	$user = $_SESSION['user'];
	$username = $user['username'];
	$firstname = $user['firstname'];
	$lastname= $user['lastname'];
	$has_logged_in = 1;
	$session_id = session_id();
} else {
	$username = '';
	$has_logged_in = 0;
	$session_id = '';
}
?>

<script>
var USERNAME = '<?php echo $username; ?>';
var HAS_LOGGED_IN= <?php echo $has_logged_in; ?>;
var SESSIONID = '<?php echo $session_id; ?>';
</script>

