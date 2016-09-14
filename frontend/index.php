<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'authentication.php'?>
		<script src="/frontend/js/authentication.js"> </script>
	</head>
	<body>
		<?php include 'header.php'?>
		<button type="submit" class="btn btn-success" id="signout-button"> Sign out </button>
		<br>
		<a id="list-project-link" href="/frontend/list_project.php"> List my projects </a>
		<br>
		<a id="create-project-link" href="/frontend/create_project.php"> Create new projects </a>
		<script>
			$(document).ready(function () {
				if (!HAS_LOGGED_IN) {
					$('#account-dropdown').hide();
					$('#signout-button').hide();
					$('#list-project-link').hide();
					$('#create-project-link').hide();
				} else {
					$('#login-dropdown').hide();
				}
			});
		</script>
	</body>
</html>

