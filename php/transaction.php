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

function get_transactions_by_username($dbconn, $username) {
	$result = pg_query_params($dbconn, "SELECT * FROM TRANSACTION WHERE DONOR=$1", array($username));
	$ans = array();

	while ($row = pg_fetch_row($result)) {
		$transaction = array(
			'id' => $row[0],
			'donor' => $row[1],
			'project_id' => $row[1],
			'amount' => $row[1],
			'description' => $row[1],
			'created_time' => $row[1],
		);

		array_push($ans, $transaction);
	}

	return $ans;
}

function create_transaction($dbconn, $data) {
	$donor = get($data, 'donor');
	$project_id = get($data, 'project_id');
	$amount = get($data, 'amount');

	$result = pg_query_params($dbconn, 
		"INSERT INTO TRANSACTION(DONOR, PROJECT_ID, AMOUNT) VALUES($1, $2, $3)",
		array($donor, $project_id, $amount));

	if (!$result) return error_response('ERROR_OCCURRED');

	// Update funded amount of project
	$project = get_project_by_id($project_id);
	$funded_amount = $project['funded_amount'];

	$result = pg_query_params($dbconn, 
		"UPDATE PROJECT SET FUNDED_AMOUNT=$1 WHERE ID=$2",
		array($funded_amount, $project_id));

	if (!$result) return error_response('ERROR_OCCURRED');

	return success_response();
}
?>
