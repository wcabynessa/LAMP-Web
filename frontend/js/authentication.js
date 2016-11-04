$(document).ready(function () {
	// Hide feedback msg by default
	$('#signin-feedback').hide();
	$('#signup-feedback').hide();

	$('#signin-form').on('submit', function (e) {

		var username = $('#username').val();
		var password = $('#password').val();

		$.ajax({
			url: '/php/user_query_handler.php',
			method: 'POST',
			data: {
				query: 'signin',
				username: username,
				password: password
			},
		}).done(function (data) {
			data = JSON.parse(data);
			if (data.STATUS == 'ERROR') {
				$('#signin-feedback').show();
				$('#signin-feedback').text(data.MSG);
			} else if (data.STATUS == 'OK') {
				window.location.href = '/';
			}
		});

		// Return false to prevent default action
		return false;
	});

	$('#signup-form').on('submit', function (e) {
		var username = $('#username').val();
		var password = $('#password').val();
		var confirm_password = $('#confirm_password').val();
		var firstname = $('#firstname').val();
		var lastname = $('#lastname').val();

		// Check confirm password
		if (password !== confirm_password) {
			$('#signin-feedback').show();
			$('#signin-feedback').text("Confirm password and password do not match");
			return false;
		}

		$.ajax({
			url: '/php/user_query_handler.php',
			method: 'POST',
			data: {
				query: 'signup',
				username: username,
				password: password,
				firstname: firstname,
				lastname: lastname,
			},
		}).done(function (data) {
			data = JSON.parse(data);
			if (data.STATUS == 'ERROR') {
				$('#signup-feedback').show();
				$('#signup-feedback').text(data.MSG);
			} else if (data.STATUS == 'OK') {
				window.location.href = '/';
			}
		});

		// Return false to prevent default action
		return false;
	});
});
