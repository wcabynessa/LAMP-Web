<?php

include 'common.php';

function create_session_table($dbconn) {
	$query  = "CREATE TABLE SESSION(";
	$query .= "ID SERIAL,";
	$query .= "SESSIONID VARCHAR(32) UNIQUE NOT NULL,";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_session_by_sessionid($dbconn, $sessionid) {
	$result = pg_query_params($dbconn, "SELECT * FROM SESSION WHERE SESSIONID=$1", array($name));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);

	return array(
		'id' => $row[0],
		'sessionid' => $row[1]
	);
}

?>
