<?php

include 'common.php';

function create_type_table($dbconn) {
	$query  = "CREATE TABLE TYPE(";
	$query .= "ID SERIAL,";
	$query .= "TYPE VARCHAR(30) UNIQUE NOT NULL,";
	// ENUM('admin', 'moderator', 'contractor', 'bidder') 
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_type_by_name($dbconn, $type) {
	$result = pg_query_params($dbconn, "SELECT * FROM TYPE WHERE TYPE=$1", array($name));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);

	return array(
		'id' => $row[0],
		'type' => $row[1]
	);
}

?>
