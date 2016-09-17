<?php
include 'connect_database.php';
include 'common.php';
include 'transaction.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_transaction_table($dbconn)) {
		echo "Failed to create transaction table. The table might already exist\n";
	} else {
		echo "Transaction table created successfully";
	}
} else if ($query == 'create') {
	echo json_encode(create_transaction($dbconn, $_POST));
} else if ($query == 'list') {
	$username= get($_GET, 'username');
	echo json_encode(get_transactions_by_username($dbconn, $username));
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
