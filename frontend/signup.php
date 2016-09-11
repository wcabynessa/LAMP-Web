<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include 'html-header.php'?>
		<script src="js/authentication.js"> </script>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container">
			<div class="row">
				<div class="col-xs-offset-4 col-xs-4">
					<fieldset>
						<legend> Sign in </legend>
						<form id="signup-form">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username" id="username">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="First name" id="firstname">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Last name" id="lastname">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" id="password">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="confirm_password" placeholder="Confirm password" id="confirm_password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success"> Submit </button>
							</div>
							<div class="form-group">
								<span class="error-text" id="signup-feedback"></span>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</section>
	</body>
</html>

