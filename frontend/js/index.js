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
