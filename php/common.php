<?php
if (!function_exists('get')) {
	function get($arr, $key, $default = null) {
		if (isset($arr[$key])) return $arr[$key];
		return $default;
	}
}

if (!function_exists('error_response')) {
	function error_response($msg) {
		return array(
			'STATUS' => 'ERROR',
			'MSG' => $msg
		);
	}
}

if (!function_exists('success_response')) {
	function success_response($data = '') {
		return array(
			'STATUS' => 'OK',
			'DATA' => $data
		);
	}
}
?>
