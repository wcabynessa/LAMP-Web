<?php
include 'project.php';
include 'common.php';

function create_transaction_table($dbconn) {
	$query  = "CREATE TABLE TRANSACTION(";
	$query .= "ID SERIAL,";
	$query .= "DONOR VARCHAR(32) REFERENCES ACCOUNT(USERNAME) NOT NULL,";
	$query .= "PROJECT_ID INTEGER REFERENCES PROJECT(ID) NOT NULL,";
	$query .= "AMOUNT INTEGER DEFAULT 0 NOT NULL,";
	$query .= "DESCRIPTION VARCHAR(512) DEFAULT '' NOT NULL,";
	$query .= "CREATED_TIME DATE NOT NULL DEFAULT clock_timestamp(),";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_transaction_from_raw_data($data) {
	return array(
		'id' => $data[0],
		'donor' => $data[1],
		'project_id' => $data[2],
		'amount' => $data[3],
		'description' => $data[4],
		'created_time' => $data[5],
	);
}

function get_transactions_by_username($dbconn, $username) {
	$result = pg_query_params($dbconn, "SELECT * FROM TRANSACTION WHERE DONOR=$1", array($username));
	$ans = array();

	while ($row = pg_fetch_row($result)) {
		$transaction = get_transaction_from_raw_data($row);
		array_push($ans, $transaction);
	}

	return $ans;
}

function get_transactions_by_project_id($dbconn, $project_id) {
	$result = pg_query_params($dbconn, "SELECT * FROM TRANSACTION WHERE PROJECT_ID=$1", array($project_id));
	$ans = array();

	while ($row = pg_fetch_row($result)) {
		$transaction = get_transaction_from_raw_data($row);
		array_push($ans, $transaction);
	}

	return $ans;
}

function create_transaction($dbconn, $data) {
	$username = get($data, 'username');
	$project_id = get($data, 'project_id');
	$amount = get($data, 'amount', 0);

	$result = pg_query_params($dbconn, 
		"INSERT INTO TRANSACTION(DONOR, PROJECT_ID, AMOUNT) VALUES($1, $2, $3)",
		array($username, $project_id, $amount));

	if (!$result) return error_response('ERROR_OCCURRED');

	// Update funded amount of project
	$project = get_project_by_id($dbconn, $project_id);
	$funded_amount = $project['funded_amount'];

	$result = pg_query_params($dbconn, 
		"UPDATE PROJECT SET FUNDED_AMOUNT=$1 WHERE ID=$2",
		array($funded_amount + $amount, $project_id));

	if (!$result) return error_response('ERROR_OCCURRED');

	return success_response();
}
?>
