<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'authentication.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container">
			<div class="row">
				<div class="col-xs-offset-4 col-xs-4">
					<fieldset>
						<legend> Create project </legend>
						<form id="create-project-form">
							<div class="form-group">
								<input type="text" class="form-control" name="title" placeholder="Project title" id="title">
							</div>
							<div class="form-group">
								<label for="description"> Description: </label>
								<textarea type="text" class="form-control" name="description" placeholder="Description" id="description"> </textarea>
							</div>
							<div class="form-group">
								<div class="input-group">
									<input type="text" class="form-control" name="image_url" placeholder="Add image" id="image-url">
									<span class="input-group-btn">
											<button class="btn btn-default" type="button" id="add-image-button">Add image</button>
									</span>
								</div>
							</div>
							<div id="image-container">
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

		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
	</body>
</html>

