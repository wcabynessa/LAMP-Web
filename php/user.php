<?php
/*
 * Because the name 'USER' is reserved in PostgreSQL, user table is named account instead.
 */
include 'common.php';

function create_user_table($dbconn) {
	$query  = "CREATE TABLE ACCOUNT(";
	$query .= "ID SERIAL,";
	$query .= "USERNAME VARCHAR(32) UNIQUE NOT NULL,";
	$query .= "HASHED_PASSWORD VARCHAR(256) NOT NULL,";
	$query .= "FIRSTNAME VARCHAR(32) DEFAULT '',";
	$query .= "LASTNAME VARCHAR(32) DEFAULT '',";
	$query .= "IS_ADMIN BOOLEAN NOT NULL DEFAULT FALSE,";
	$query .= "PRIMARY KEY(ID));";

	return pg_query($dbconn, $query);
}

function get_user_by_username($dbconn, $username) {
	$result = pg_query_params($dbconn, "SELECT * FROM ACCOUNT WHERE USERNAME=$1", array($username));
	if (!$result) return null;

	$row = pg_fetch_row($result);

	return array(
		'ID' => $row[0],
		'USERNAME' => $row[1],
		'HASHED_PASSWORD' => $row[2],
		'FIRSTNAME' => $row[3],
		'LASTNAME' => $row[4],
		'IS_ADMIN' => $row[5]
	);
}

function signin($dbconn, $data) {
	$username = get($data, 'USERNAME');
	$password = get($data, 'PASSWORD');

	$user = get_user_by_username($dbconn, $username);
	if (!$user) return error_response('Username does not exist');

	if (password_verify($password, get($user, 'HASHED_PASSWORD'))) {
		session_start();
		$_SESSION['USERNAME'] = $username;

		return success_response(session_id());
	} else {
		return error_response('Username and password do not match');
	}
}

function signup($dbconn, $data) {
	$username = get($data, 'USERNAME');
	$password = get($data, 'PASSWORD');
	$firstname = get($data, 'FIRSTNAME');
	$lastname = get($data, 'LASTNAME');

	if (!$username) return error_response('INVALID USERNAME');
	if (get_user_by_username($dbconn, $username)) return error_response('USERNAME ALREADY EXISTS');

	$hashed_password = password_hash($password, PASSWORD_BCRYPT);

	$result = pg_query_params($dbconn, 
		"INSERT INTO ACCOUNT(USERNAME, HASHED_PASSWORD, FIRSTNAME, LASTNAME) VALUES($1, $2, $3, $4);",
		array($username, $hashed_password, $firstname, $lastname));

	if (!$result) return error_response('ERROR OCCURRED');
	return success_response();
}

function signout($dbconn) {
	unset($_SESSION['USERNAME']);
	session_destroy();

	return success_response();
}
?>
