<?php
include 'connect_database.php';
include 'common.php';
include 'user.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_user_table($dbconn)) {
		echo "Failed to create user table. The table might already exist\n";
	} else {
		echo "User table created successfully";
	}
} else if ($query == 'signup') {
	$result = signup($dbconn, $_POST);

	if ($result['STATUS'] == 'ERROR') {
		echo json_encode($result);
	} else {
		// Sign in after sign up successfully
		$result = signin($dbconn, $_POST);

		if ($result['STATUS'] == 'OK') {
			session_start();
			$user = $result['DATA'];
			$_SESSION['user'] = $user;
		}

		echo json_encode($result);
	}
} else if ($query == 'signin') {
	$result = signin($dbconn, $_POST);

	if ($result['STATUS'] == 'OK') {
		session_start();
		$user = $result['DATA'];
		$_SESSION['user'] = $user;
	}

	echo json_encode($result);

} else if ($query == 'signout') {
	session_start();
	session_unset();
	session_destroy();
	unset($_SESSION['user']);
	echo json_encode(success_response());
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
