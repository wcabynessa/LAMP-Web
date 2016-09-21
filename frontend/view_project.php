<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'authentication.php'?>
		<?php include 'url_param_extractor.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container">
			<div class="row">
				<div id="project-container" class="col-xs-6 col-offset-xs-3">
				</div>
			</div>
		</section>

		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
		<script>
			viewProjectById(ID);
		</script>
	</body>
</html>

