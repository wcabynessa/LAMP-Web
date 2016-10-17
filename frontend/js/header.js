if (HAS_LOGGED_IN) {
	$("#signin-button").hide();
	$("#signup-button").hide();
} else {
	$("#your-account-nav").hide();
	$("#signout-button").hide();
	$("#my-projects-nav").hide();
}
