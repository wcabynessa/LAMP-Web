<?php
include 'connect_database.php';
include 'common.php';
include 'project.php';

$query = get($_REQUEST, 'query');

if ($query == 'init') {
	if (!create_project_table($dbconn)) {
		echo "Failed to create project table. The table might already exist\n";
	} else {
		echo "Project table created successfully";
	}
} else if ($query == 'create') {
	echo json_encode(create_project($dbconn, $_POST));
} else if ($query == 'update') {
	echo json_encode(update_project($dbconn, $_POST));
} else if ($query == 'view') {
	$projectid = get($_GET, 'projectid');
	echo json_encode(get_project_by_id($dbconn, $projectid));
} else if ($query == 'count') {
	echo json_encode(count_projects_by_category($dbconn));
} else if ($query == 'list') {
	echo json_encode(list_projects($dbconn, $_GET));
} else if ($query == 'delete') {
	$projectid= get($_GET, 'projectid');
	echo json_encode(delete_project_by_id($dbconn, $projectid));
} else {
	echo json_encode(error_response('Invalid query'));
}
?>
