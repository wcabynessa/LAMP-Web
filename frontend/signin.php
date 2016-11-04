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
					<div class="input-area-container">
					<fieldset>
						<h4> Sign In </h4>
						<form id="signin-form">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username" id="username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" id="password">
							</div>
							<div class="form-group last">
								<button type="submit" class="btn btn-success"> Submit </button>
							</div>
						</form>
					</fieldset>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>

