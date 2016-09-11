<?php
include 'common.php';

function create_project_table($dbconn) {
	$query  = "CREATE TABLE PROJECT(";
	$query .= "ID SERIAL,";
	$query .= "TITLE VARCHAR(128) NOT NULL,";
	$query .= "OWNER VARCHAR(32) REFERENCES ACCOUNT(USERNAME),";
	$query .= "DESCRIPTION VARCHAR(4096),";
	$query .= "IMAGES VARCHAR(4096),";
	$query .= "CREATED_TIME DATE NOT NULL DEFAULT clock_timestamp(),";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_project_by_id($dbconn, $projectid) {
	$result = pg_query_params($dbconn, "SELECT * FROM PROJECT WHERE ID=$1", array($projectid));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);

	return array(
		'id' => $row[0],
		'title' => $row[1],
		'owner' => $row[2],
		'description' => $row[3],
		// images is an array stored in json format
		'images' => json_decode($row[4]),
		'created_time' => $row[5],
	);
}

function get_projects_by_owner($dbconn, $username) {
	$result = pg_query_params($dbconn, "SELECT * FROM PROJECT WHERE OWNER=$1", array($username));

	$ans = array();

	while ($row = pg_fetch_row($result)) {
		$project = array(
			'id' => $row[0],
			'title' => $row[1],
			'owner' => $row[2],
			'description' => $row[3],
			// images is an array stored in json format
			'images' => json_decode($row[4]),
			'created_time' => $row[5],
		);

		array_push($ans, $project);
	}

	return $ans;
}

function delete_project_by_id($dbconn, $projectid) {
	$result = pg_query_params($dbconn, "DELETE FROM PROJECT WHERE ID=$1", array($projectid));
	if (!$result) return error_response("ERROR OCCURRED");
	return success_response();
}

function add_project($dbconn, $data) {
	$title = get($data, 'title');
	$owner = get($data, 'owner');
	$description = get($data, 'description');
	$images = get($data, 'images');

	$result = pg_query_params($dbconn, 
		"INSERT INTO PROJECT(TITLE, OWNER, DESCRIPTION, IMAGES) VALUES($1, $2, $3, $4)",
		array($title, $owner, $description, $images));

	if (!$result) return error_response('ERROR_OCCURRED');
	return success_response();
}
