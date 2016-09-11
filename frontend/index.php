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
		<a id="signin-link" href="/frontend/signin.php"> Signin here </a>
		<br>
		<a id="signup-link" href="/frontend/signup.php"> Signup here </a>
		<br>
		<a id="list-project-link" href="/frontend/list_project.php"> List my projects </a>
		<br>
		<a id="create-project-link" href="/frontend/create_project.php"> Create new projects </a>
		<script>
			$(document).ready(function () {
				if (!HAS_LOGGED_IN) {
					$('#signout-button').hide();
					$('#list-project-link').hide();
					$('#create-project-link').hide();
				} else {
					$('#signin-link').hide();
					$('#signup-link').hide();
				}
			});
		</script>
	</body>
</html>

