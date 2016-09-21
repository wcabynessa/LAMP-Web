// Check if user has logged in first
if (!HAS_LOGGED_IN) {
	window.location.href = '/frontend/signin.php';
}

var imageList = [];

$('#create-project-form').on('submit', function (e) {
	e.preventDefault();

	var title = $('#title').val();
	var description = $('#description').val();
	var target_amount = $('#target-amount').val();
	var category = $('#category').val();

	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'POST',
		data: {
			query: 'add',
			title: title,
			owner: USERNAME,
			description: description,
			target_amount: target_amount,
			images: JSON.stringify(imageList),
			category: category
		}
	}).done(function (data) {
		window.location.href = '/frontend/list_project.php';
	});

	return false;
});

$('#add-image-button').on('click', function (e) {
	var imageUrl = $('#image-url').val();
	imageList.push(imageUrl);

	$('#image-container').html(getImageListTemplate(imageList, {height: '80px'}));
	$('#image-url').val('');
});

function preprocessProjectData(project) {
	console.log(project);
	if (project.images && project.images.length) {
		project.main_image = project.images[0];
	} else {
		project.main_image = 'http://www.mosaicdevelopmentfl.com/Common/images/jquery/galleria/image-not-found.png';
	}
	project.progress = Math.min(project.funded_amount * 1.0 / project.target_amount * 100, 100.0);
	return project;
}

function donateProject(project, money) {
	$.ajax({
		url: '/php/transaction_query_handler.php',
		method: 'POST',
		data: {
			query: 'create',
			username: USERNAME,
			project_id: project.id,
			amount: money
		}
	}).done(function (data) {
		location.reload();
	});
}

function viewProjectsByUsername(username) {
	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'GET',
		data: {
			query: 'list',
			username: username
		}
	}).done(function (data) {
		var projectList = JSON.parse(data);
		projectList.forEach(function (project, index) {
			projectList[index] = preprocessProjectData(project);
		});
		$('#project-container').html(getProjectListTemplate(projectList));

		// Bind event handler to project cards
		projectList.forEach(function (project) {
			var htmlSelector = "#project-card-" + project.id + " .project-card-title";
			$(htmlSelector).on('click', function () {
				window.location.href = "/frontend/view_project.php?id=" + project.id;
			});
		});
	});
};

function viewProjectById(projectId) {
	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'GET',
		data: {
			query: 'view',
			projectid: projectId
		}
	}).done(function (data) {
		var project = preprocessProjectData(JSON.parse(data));
		$('#project-container').html(getViewProjectTemplate(project));

		// Bind event handler to projects
		var donateButtonSelector = "#project-card-" + project.id + " .donate-button";
		$(donateButtonSelector).on('click', function (e) {
			e.preventDefault();

			var moneyInputSelect = "#project-card-" + project.id + " .money-input";
			var money = $(moneyInputSelect).val();

			donateProject(project, money);
		});
	});
}
