<?php
include 'connect_database.php';
include 'common.php';
include 'category.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_category_table($dbconn)) {
		echo "Failed to create category table. The table might already exist\n";
	} else {
		echo "Category table created successfully";
	}
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
