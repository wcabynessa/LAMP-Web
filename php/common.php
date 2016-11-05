<?php
if (!function_exists('get')) {
	function get($arr, $key, $default = null) {
		if (isset($arr[$key])) return $arr[$key];
		return $default;
	}
}

if (!function_exists('date_difference')) {
	// Format: YYYY-MM-DD
	function date_difference($date1, $date2) {
		$time1 = strtotime($date1);
		$time2 = strtotime($date2);
		$days1 = (int)date('Y', $time1) * 365 + (int)date('m', $time1) * 30 + (int)date('d', $time1);
		$days2 = (int)date('Y', $time2) * 365 + (int)date('m', $time2) * 30 + (int)date('d', $time2);
		return $days2 - $days1;
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
