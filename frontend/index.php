<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<?php include 'html-header.php'?>
	</head>
	<body>
		<?php include 'header.php'?>
		<section class="container-fluid no-padding home-container">
			<div class="slideshow">
				<div class="slideshow-image">
					<img src="/frontend/img/art.jpg"> </img>
					<div class="slideshow-center-line"> </div>
					<div class="slideshow-center-text clickable">
						Welcome
					</div>
				</div>
			</div>
		</section>
		<section class="container-fluid no-padding home-container">
			<div class="col-xs-10 col-xs-offset-1 project-best-container">

				<h3> Newest project: </h3>
				<div class="project-most-recent"> </div>

				<h3> Most donated project: </h3>
				<div class="project-most-donated"> </div>

				<h3> Most backed project: </h3>
				<div class="project-most-interested"> </div>
			</div>
		</section>
		<script src="/frontend/js/slideshow.js"> </script>
		<script src="/frontend/js/template.js"> </script>
		<script src="/frontend/js/project.js"> </script>
		<script> 
			$.ajax({
				url: '/php/project_query_handler.php',
				method: 'GET',
				data: {
					'query': 'best'
				}
			}).done(function (data) {
				var projectList = JSON.parse(data);

				for(key in projectList) {
					projectList[key] = preprocessProjectData(projectList[key]);
				};

				$('.project-most-donated').html(getProjectCardTemplate(projectList.most_donated));
				$('.project-most-recent').html(getProjectCardTemplate(projectList.newest));
				$('.project-most-interested').html(getProjectCardTemplate(projectList.most_interested));

				for(key in projectList) {
					var project = projectList[key];
					var htmlSelector = "#project-card-" + project.id + " .project-card-title";
					$(htmlSelector).on('click', function () {
						window.location.href = "/frontend/view_project.php?id=" + project.id;
					});
				};
			});
		</script>
	</body>
</html>
