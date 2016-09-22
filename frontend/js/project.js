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
			owner: USER.username,
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
			username: USER.username,
			project_id: project.id,
			amount: money
		}
	}).done(function (data) {
		location.reload();
	});
}

function viewProjects(args = {}) {
	args.query = 'list';
	if (args.category == 'All') args.category = '';

	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'GET',
		data: args
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

function getDonationByProjectId(projectId, callback) {
	$.ajax({
		url: '/php/transaction_query_handler.php',
		method: 'GET',
		data: {
			query: 'recent',
			project_id: projectId
		}
	}).done(function (data) {
		console.log(data);
		callback(JSON.parse(data));
	});
}

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

		$(".project-view-money").text('$ ' + project.funded_amount + ' of $ ' + project.target_amount + ' goal');

		$(".project-view-progress .progress-bar").attr("aria-valuenow", project.progress);
		$(".project-view-progress .progress-bar").css("width", project.progress + "%");
		$(".project-view-image img").attr("src", project.main_image);
		$(".project-view-description .text").text(project.description);

		getDonationByProjectId(project.id, function (data) {
			var html = getDonationListTemplate(data);
			$(".project-view-donations-container").html(html);
		});

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
