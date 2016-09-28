<?php
include 'connect_database.php';
include 'common.php';
include 'type.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_type_table($dbconn)) {
		echo "Failed to create type table. The table might already exist\n";
	} else {
		echo "Type table created successfully";
	}
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
