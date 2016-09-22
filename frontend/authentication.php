<?php
session_start();

if (!function_exists('get')) {
	function get($arr, $key, $default = null) {
		if (isset($arr[$key])) return $arr[$key];
		return $default;
	}
}

if ($_SESSION['user']) {
	$user = $_SESSION['user'];
	$has_logged_in = 1;
} else {
	$has_logged_in = 0;
}
?>

<script>
var USER = {
	'username': '<?php echo get($user, 'username', ''); ?>',
	'firstname': '<?php echo get($user, 'firstname', ''); ?>',
	'lastname': '<?php echo get($user, 'lastname', ''); ?>',
	'isAdmin': '<?php echo (get($user, 'is_admin') ? 1 : 0); ?>',
};
var HAS_LOGGED_IN = <?php echo $has_logged_in; ?>;
</script>

