<?php
include 'connect_database.php';
include 'test.php';

$query = $_GET['query'];

if ($query == 'init_test') {
	if (!createTestTable($dbconn)) {
		echo "Failed to create test table. The table might already exist\n";
	} else {
		echo "Test table created successfully";
	}

	echo "Populated Test table with " . populateTestTable($dbconn) . " rows";
} else if ($query == 'query_test') {
	$testId = $_GET['test_id'];

	echo json_encode(getTestById($dbconn, $testId));
}
?>
