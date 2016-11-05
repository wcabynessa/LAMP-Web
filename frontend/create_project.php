<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container">
			<div class="row">
				<div class="col-xs-offset-4 col-xs-4">
					<div class="input-area-container">
					<fieldset>
						<h4> Create project </h4>
						<form id="create-project-form">
							<div class="form-group">
								<input type="text" class="form-control" name="title" placeholder="Project title" id="title">
							</div>
							<div class="form-group">
								<label for="target_amount"> Target amount: </label>
								<input type="number" class="form-control" name="target_amount" placeholder="Target amount" id="target-amount"> </input>
							</div>
							<div class="form-group">
								<label for="category"> Select category: </label>
								<select class="form-control" id="category">
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
							<div class="form-group">
								<label for="description"> Description: </label>
								<textarea type="text" class="form-control" name="description" placeholder="Description" id="description" rows="10"> </textarea>
							</div>
							<div class="form-group">
								<label for="target-date"> Target date: </label>
								<input type="date" class="form-control" name="target-date" id="target-date"> </input>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" name="image_url" placeholder="Add image" id="image-url">
									<span class="input-group-btn">
											<button class="btn btn-default" type="button" id="add-image-button">Add image</button>
									</span>
								</div>
							</div>
							<div id="image-container"> </div>
							<div class="form-group">
								<button type="submit" class="btn btn-success"> Submit </button>
							</div>
						</form>
					</fieldset>
					</div>
				</div>
			</div>
		</section>

		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
	</body>
</html>

