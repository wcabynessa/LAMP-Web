<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
		<?php include 'url_param_extractor.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid main-container">
			<div class="row">
				<div class="col-xs-8 col-xs-offset-2">
					<div class="project-view-container">
						<div class="project-view-image"> 
							<img src="" height="100%"> </img>
						</div>
						<div class="project-view-info"> 
							<div class="project-view-money"> </div>
							<div class="progress project-view-progress">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow=""> </div>
							</div>
							<div class="project-view-donate"> 
								<button class="btn btn-default" type="button"> Donate now </button>
							</div>
							<div class="project-view-donate-panel">	
								<div class="input-group"> 
									<input class="money-input form-control" type="number" placeholder="Enter amount"/>
									<span class="input-group-btn">";
										<button class="donate-button btn btn-default" type="button">Donate</button>"
									</span>
								</div>
							</div>
						</div>
						<div class="project-view-description">
							<h4> Project description: </h4>
							<div class="text"> </div>
						</div>
						<div class="project-view-donations">
							<div class="project-view-donations-label"> Recent Donations </div>
							<div class="project-view-donations-container">
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
		<script>
			viewProjectById(URL_PARAMS.id);
		</script>
	</body>
</html>

