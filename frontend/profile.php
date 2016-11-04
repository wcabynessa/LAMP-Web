<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'authentication.php'?>
		<?php include 'url_param_extractor.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container no-padding">
			<div class="no-padding sidetab-selector-container">
				<div id="selector-0" class="sidetab-selector">
					<h4> Projects </h4>
				</div>
				<div id="selector-1" class="sidetab-selector">
					<h4> Transactions </h4>
				</div>
				<div id="selector-2" class="sidetab-selector">
					<h4> Statistics </h4>
				</div>
			</div>
			<div class="sidetab-content-container">
				<div id="content-0" class="sidetab-content">
					<div id="projects-container"> </div>
				</div>
				<div id="content-1" class="sidetab-content">
					<div id="transactions-container"> </div>
				</div>
				<div id="content-2" class="sidetab-content">
					<div id="Statistics-container"> </div>
				</div>
			</div>
		</section>

		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/profile.js"> </script>
		<script src="/frontend/js/sidetab.js"> </script>
		<script>
			var sidetabCount = 3;
			initSidetab(sidetabCount);
			initProfilePage(USER);
		</script>
	</body>
</html>

