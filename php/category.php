<?php

include 'common.php';

function create_category_table($dbconn) {
	$query  = "CREATE TABLE CATEGORY(";
	$query .= "ID SERIAL,";
	$query .= "NAME VARCHAR(32) UNIQUE NOT NULL,";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_project_by_name($dbconn, $name) {
	$result = pg_query_params($dbconn, "SELECT * FROM CATEGORY WHERE NAME=$1", array($name));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);

	return array(
		'id' => $row[0],
		'name' => $row[1]
	);
}

?>
