<?php
function createTestTable($dbconn) {
	return pg_query($dbconn, "CREATE TABLE TEST(TITLE VARCHAR(32) NOT NULL, ID SERIAL, PRIMARY KEY(ID));");
}

function getTestById($dbconn, $testId) {
	$result = pg_query_params($dbconn, "SELECT * FROM TEST WHERE ID=$1", array($testId));
	$row = 	pg_fetch_row($result);

	return array(
		'TITLE' => $row[0],
		'ID' => $row[1]
	);
}

function addTest($dbconn, $data) {
	return pg_query_params($dbconn, "INSERT INTO TEST(TITLE) VALUES($1);", array($data['TITLE']));
}

function populateTestTable($dbconn) {
	$createdTestCount = 0;

	for($i = 1;  $i <= 10;  $i++) {
		if (addTest($dbconn, array( 'TITLE' => "NEW_TITLE"))) { 
			$createdTestCount++;
		}
	}

	return $createdTestCount;
}
?>

