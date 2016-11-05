$(document).ready(function () {

	if (HAS_LOGGED_IN) {
		$("#signin-button").hide();
		$("#signup-button").hide();
		$("#login-dropdown").hide();
	} else {
		$("#signout-nav").hide();
		$("#your-account-nav").hide();
		$("#signout-button").hide();
		$("#my-projects-nav").hide();
	}

	if (!USER || !USER.isAdmin) {
		$("#my-projects-nav a").text("My projects");
	}

	$('#signout-button').on('click', function (e) {
		e.preventDefault();
		console.log('singint out');
		$.ajax({
			url: '/php/user_query_handler.php',
			method: 'POST',
			data: {
				query: 'signout',
			},
		}).done(function (data) {
			window.location.href = '/';
		});
		return false;
	});
});
