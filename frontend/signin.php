<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php include 'html-header.php'?>
	</head>
	<body>
		<section class=".container-fluid main-container">
			<div class="row">
				<div class="col-xs-offset-4 col-xs-4">
					<fieldset>
						<legend> Sign in </legend>
						<form action="/php/user_query_handler.php" method="POST">
							<input type="hidden" name="query" value="signin">
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-success"> Submit </button>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</section>
	</body>
</html>

