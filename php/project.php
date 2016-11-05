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
	$query .= "CREATED_TIME TIMESTAMP NOT NULL DEFAULT clock_timestamp(),";
	$query .= "TARGET_DATE DATE NOT NULL,";
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
		'target_date' => $data[9]
	);
}

function get_project_by_id($dbconn, $projectid) {
	$result = pg_query_params($dbconn, "SELECT * FROM PROJECT WHERE ID=$1;", array($projectid));
	if (!$result || (pg_num_rows($result) == 0)) return null;

	$row = pg_fetch_row($result);
	$project = get_project_from_raw_data($row);

	// Add donor count
	$result = pg_query_params($dbconn, "SELECT COUNT(DISTINCT T.DONOR) FROM TRANSACTION T WHERE T.PROJECT_ID=$1", array($projectid));
	$row = pg_fetch_row($result);
	$donor_count = $row[0];
	$project['donor_count'] = $donor_count;

	// Add remaining date
	$today = date('Y-m-d');
	$project['days_to_go'] = max(date_difference($today, $project['target_date']), 0);

	return $project;
}

function list_projects($dbconn, $args) {
	$query = "SELECT * FROM PROJECT P";
	$filter_criteria = array();
	$query_params = array();

	// Add filter criteria
	if (get($args, 'username')) {
		$username = $args['username'];
		array_push($filter_criteria, array('key' => 'OWNER', 'value' => $username));
	}
	if (get($args, 'category')) {
		$category= $args['category'];
		array_push($filter_criteria, array('key' => 'CATEGORY', 'value' => $category));
	}

	// Nesting query
	foreach ($filter_criteria as $filter_criterion) {
		$key = $filter_criterion['key'];
		$value = $filter_criterion['value'];

		array_push($query_params, $value);
		$query_param_index = count($query_params);

		$query = "SELECT * FROM (" . $query . ") P WHERE " . $key . "=$" . $query_param_index;
	}

	// Search
	if (get($args, 'search')) {
		$search_pattern = "%" . $args['search'] . "%";
		array_push($query_params, $search_pattern);
		$query_param_index = count($query_params);

		$query = "SELECT * FROM (" . $query . ") P WHERE TITLE LIKE $" . $query_param_index;
	}

	// Not finished only
	if (get($args, 'not_finished')) {
		$query = "SELECT * FROM (" . $query . ") P WHERE FUNDED_AMOUNT < TARGET_AMOUNT";
	}

	// OrderBy, default = created time
	$order_attr = get($args, 'order_by', 'CREATED_TIME');
	$query = "SELECT * FROM (" . $query . ") P ORDER BY " . $order_attr;

	// Check if descending order is needed
	if (!get($args, 'reverse_order')) {
		$query = $query . " DESC";
	}

	// Query here
	$result = pg_query_params($dbconn, $query, $query_params);
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

function create_project($dbconn, $data) {
	$title = get($data, 'title');
	$owner = get($data, 'owner');
	$description = get($data, 'description');
	$images = get($data, 'images');
	$target_amount = get($data, 'target_amount');
	$category = get($data, 'category');
	$target_date = get($data, 'target_date');
	$created_time = date('Y-m-d');

	$result = pg_query_params($dbconn, 
		"INSERT INTO PROJECT(TITLE, OWNER, DESCRIPTION, IMAGES, TARGET_AMOUNT, CATEGORY, TARGET_DATE, CREATED_TIME) VALUES($1, $2, $3, $4, $5, $6, $7, $8)",
		array($title, $owner, $description, $images, $target_amount, $category, $target_date, $created_time));

	if (!$result) return error_response('ERROR_OCCURRED');
	return success_response();
}

function update_project($dbconn, $data) {
	$id = get($data, 'id');
	$title = get($data, 'title');
	$owner = get($data, 'owner');
	$description = get($data, 'description');
	$images = get($data, 'images');
	$target_amount = get($data, 'target_amount');
	$category = get($data, 'category');

	$result = pg_query_params($dbconn, 
		"UPDATE PROJECT SET TITLE=$1, OWNER=$2, DESCRIPTION=$3, IMAGES=$4, TARGET_AMOUNT=$5, CATEGORY=$6 WHERE ID=$7",
		array($title, $owner, $description, $images, $target_amount, $category, $id));

	if (!$result) return error_response('ERROR_OCCURRED');
	return success_response();
}

function count_projects_by_category($dbconn) {
	$result = pg_query($dbconn, "SELECT COUNT(*), CATEGORY FROM PROJECT P GROUP BY CATEGORY;");
	$ans = array();

	while ($row = pg_fetch_row($result)) {
		array_push($ans, array(
			'quantity' => $row[0],
			'category' => $row[1]
		));
	}

	return $ans;
}
