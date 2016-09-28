<?php
include 'connect_database.php';
include 'common.php';
include 'session.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_session_table($dbconn)) {
		echo "Failed to create session table. The table might already exist\n";
	} else {
		echo "Session table created successfully";
	}
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
