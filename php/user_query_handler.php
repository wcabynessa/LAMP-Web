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
	$data = array(
		'USERNAME' => get($_POST, 'username'),
		'PASSWORD' => get($_POST, 'password'),
		'FIRSTNAME' => get($_POST, 'firstname'),
		'LASTNAME' => get($_POST, 'lastname'),
	);

	echo json_encode(signup($dbconn, $data));
} else if ($query == 'signin') {
	$data = array(
		'USERNAME' => get($_POST, 'username'),
		'PASSWORD' => get($_POST, 'password')
	);

	echo json_encode(signin($dbconn, $data));
} else if ($query == 'signout') {
	echo json_encode(signout($dbconn, $data));
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
