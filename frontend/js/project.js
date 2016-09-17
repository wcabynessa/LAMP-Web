$(document).ready(function () {

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

		$.ajax({
			url: '/php/project_query_handler.php',
			method: 'POST',
			data: {
				query: 'add',
				title: title,
				owner: USERNAME,
				description: description,
				target_amount: target_amount,
				images: JSON.stringify(imageList)
			}
		}).done(function (data) {
			window.location.href = '/frontend/list_project.php';
		});

		return false;
	});

	$('#add-image-button').on('click', function (e) {
		var imageUrl = $('#image-url').val();
		imageList.push(imageUrl);

		$('#image-container').html(getImageListContainerHtml(imageList));
		$('#image-url').val('');
	});

	function initProjectList() {
		var projectList = [];

		$.ajax({
			url: '/php/project_query_handler.php',
			method: 'GET',
			data: {
				query: 'list',
				username: USERNAME
			}
		}).done(function (data) {
			projectList = JSON.parse(data);
			$('#project-container').html(getProjectListContainerHtml(projectList));
		});
	};

	initProjectList();
});
