// Check if user has logged in first
if (!HAS_LOGGED_IN) {
	window.location.href = '/frontend/signin.php';
}

var imageList = [];

// Handle both update and create project
function updateProject(query) {
	var title = $('#title').val();
	var description = $('#description').val();
	var target_amount = $('#target-amount').val();
	var category = $('#category').val();
	var projectId = $('#project-id').val();

	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'POST',
		data: {
			id: projectId,
			query: query,
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
};

$('#create-project-form').on('submit', function (e) {
	e.preventDefault();
	updateProject('create');
	return false;
});

$('#edit-project-form').on('submit', function (e) {
	e.preventDefault();
	updateProject('update');
	return false;
});

$('#add-image-button').on('click', function (e) {
	var imageUrl = $('#image-url').val();
	imageList.push(imageUrl);

	$('#image-container').html(getImageListTemplate(imageList, {height: '80px'}));
	$('#image-url').val('');
});

function preprocessProjectData(project) {
	// JSONDecode imageList and set main Image
	if (project.images && project.images.length) {
		project.main_image = project.images[0];
	} else {
		project.main_image = '/frontend/img/image-not-found.png';
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

		// Money and progress
		$(".project-view-money").text('$' + project.funded_amount);
		$(".project-view-percentage").text(project.progress + '%');
		$(".project-view-total-money").text('of $' + project.target_amount);


		// Progress bar
		$(".project-view-progress .progress-bar").attr("aria-valuenow", project.progress);
		$(".project-view-progress .progress-bar").css("width", project.progress + "%");
		$(".project-view-image img").attr("src", project.main_image);

		// Project description
		$(".project-view-description h3").text(project.title);
		$(".project-view-description .text").text(project.description);

		// Image list
		imageList = project.images;
		// Remove the first image as it's displayed in main
		imageList.splice(0, 1);
		if (imageList.length) {
			$('.project-view-description .images').html(getImageListTemplate(imageList, {height: '200px'}));
		} else {
			$('.project-view-description .images').hide();
		}

		getDonationByProjectId(project.id, function (data) {
			var html = getDonationListTemplate(data);
			$(".project-view-donations-container").html(html);
		});

		// Bind event handler to projects
		var donateButtonSelector = ".project-view-donate-panel .donate-button";
		$(donateButtonSelector).on('click', function (e) {
			e.preventDefault();

			var moneyInputSelect = ".project-view-donate-panel .money-input";
			var money = $(moneyInputSelect).val();

			if (!money) return false;
			donateProject(project, money);
		});
	});
}

function InitEditProject(projectId) {
	$.ajax({
		url: '/php/project_query_handler.php',
		method: 'GET',
		data: {
			query: 'view',
			projectid: projectId
		}
	}).done(function (data) {
		var project = preprocessProjectData(JSON.parse(data));

		// Set value of input for editing
		$('#title').val(project.title);
		$('#description').val(project.description);
		$('#target-amount').val(project.target_amount);
		$('#category').val(project.category);
		$('#project-id').val(project.id);

		// Initialize image list
		imageList = project.images;
		$('#image-container').html(getImageListTemplate(imageList, {height: '80px'}));
	});
}
