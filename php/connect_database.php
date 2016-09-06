<?php
$dbconn = pg_connect("host=localhost port=5432 user=postgres dbname=data password=");
if (!$dbconn) {
	echo "Can't connect to database. An error occurred.\n";
	exit;
}
?>
