<?php
include 'common.php';

function create_project_table($dbconn) {
	$query  = "CREATE TABLE PROJECT(";
	$query .= "ID SERIAL,";
	$query .= "TITLE VARCHAR(128) NOT NULL,";
	$query .= "OWNER VARCHAR(32) REFERENCES ACCOUNT(USERNAME),";
	$query .= "DESCRIPTION VARCHAR(4096),";
	$query .= "IMAGES VARCHAR(4096),";
	$query .= "CATEGORY VARCHAR(64) DEFAULT 'OTHERS',";
	$query .= "FUNDED_AMOUNT INTEGER DEFAULT 0,";
	$query .= "TARGET_AMOUNT INTEGER NOT NULL,";
	$query .= "CREATED_TIME DATE NOT NULL DEFAULT clock_timestamp(),";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_project_from_raw_data($data) {
	return array(
		'id' => $data[0],
		'title' => $data[1],
		'owner' => $data[2],
		'description' => $data[3],
		// images is an array stored in json format
		'images' => json_decode($data[4]),
		'category' => $data[5],
		'funded_amount' => $data[6],
		'target_amount' => $data[7],
		'created_time' => $data[8],
	);
}

function get_project_by_id($dbconn, $projectid) {
	$result = pg_query_params($dbconn, "SELECT * FROM PROJECT WHERE ID=$1;", array($projectid));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);
	return get_project_from_raw_data($row);
}

function get_projects_by_owner($dbconn, $username) {
	$result = pg_query_params($dbconn, "SELECT * FROM PROJECT WHERE OWNER=$1", array($username));

	$ans = array();

	while ($row = pg_fetch_row($result)) {
		$project = get_project_from_raw_data($row);
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
	$target_amount = get($data, 'target_amount');
	$category = get($data, 'category');

	$result = pg_query_params($dbconn, 
		"INSERT INTO PROJECT(TITLE, OWNER, DESCRIPTION, IMAGES, TARGET_AMOUNT, CATEGORY) VALUES($1, $2, $3, $4, $5, $6)",
		array($title, $owner, $description, $images, $target_amount, $category));

	if (!$result) return error_response('ERROR_OCCURRED');
	return success_response();
}
