<?php
include 'connect_database.php';
include 'common.php';
include 'user.php';
include 'transaction.php';

if (!pg_query($dbconn, "DROP TABLE ACCOUNT CASCADE")) {
	echo "Cannot drop table ACCOUNT<br>";
}

if (!pg_query($dbconn, "DROP TABLE PROJECT CASCADE")) {
	echo "Cannot drop table PROJECT<br>";
}

if (!pg_query($dbconn, "DROP TABLE TRANSACTION CASCADE")) {
	echo "Cannot drop table TRANSACTION<br>";
}

if (!create_user_table($dbconn)) {
	echo "Failed to create USER table<br>";
}

if (!create_project_table($dbconn)) {
	echo "Failed to create PROJECT table<br>";
}

if (!create_transaction_table($dbconn)) {
	echo "Failed to create TRANSACTION table<br>";
}

echo "Successful";
?>
