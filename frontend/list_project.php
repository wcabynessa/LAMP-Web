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
				<div id="project-container" class="col-xs-6 col-xs-offset-3">
				</div>
			</div>
		</section>
		<div class="container-fluid project-filter-container">
			<div class="row">
				<div class="col-xs-2 project-filter-bar">
					<fieldset>
						<div class="project-filter-bar-title"> Filter the results </div>
						<form class="project-filter-form">
							<div class="form-group">
								<label for="project-filter-category"> Category: </label>
								<select class="form-control" id="project-filter-category">
									<option> All </option>
									<option> Art </option>
									<option> Comics </option>
									<option> Crafts </option>
									<option> Dance </option>
									<option> Design </option>
									<option> Fashion </option>
									<option> Film & Video </option>
									<option> Food </option>
									<option> Games </option>
									<option> Journalism </option>
									<option> Music </option>
									<option> Photography </option>
									<option> Publishing </option>
									<option> Technology </option>
									<option> Theater </option>
									<option> Others </option>
								</select>
							</div>
							<div class="form-group">
								<label for="project-filter-order-by"> Order by: </label>
								<select class="form-control" id="project-filter-order-by">
									<option> CREATED_TIME </option>
									<option> TITLE </option>
									<option> FUNDED_AMOUNT </option>
									<option> TARGET_AMOUNT </option>
								</select>
							</div>
							<div class="form-group">
								<label for="project-filter-order-by"> Search: </label>
								<input type="text" class="form-control" id="project-filter-search-key">
							</div>
						</form>
						<div class="form-group project-filter-button">
							<div class="align-center-div">
								<button type="submit" class="btn btn-success"> Apply </button>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</div>

		<script src="/frontend/js/filter.js"> </script>
		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
		<script>
			viewProjects(URL_PARAMS);
			initFilterValue(URL_PARAMS);
		</script>
	</body>
</html>

