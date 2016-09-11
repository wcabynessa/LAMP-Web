<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'authentication.php'?>
		<script src="/frontend/js/authentication.js"> </script>
	</head>
	<body>
		<button type="submit" class="btn btn-success" id="signout-button"> Sign out </button>
		<a id="signin-link" href="/frontend/signin.php"> Signin here </a>
		<br>
		<a id="signup-link" href="/frontend/signup.php"> Signup here </a>
		<script>
			$(document).ready(function () {
				if (!HAS_LOGGED_IN) {
					$('#signout-button').hide();
					$('#signin-link').show();
				} else {
					$('#signout-button').show();
					$('#signin-link').hide();
				}
			});
		</script>
	</body>
</html>

