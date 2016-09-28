<?php
$dbconn = pg_connect("host=localhost port=5432 user=webserver dbname=data password=12345678");
if (!$dbconn) {
	echo "Can't connect to database. An error occurred.\n";
	exit;
}
?>
