function initProfilePage(user) {
	$.ajax({
		url: '/php/project_query_handler.php?query=list&username=' + (user.isAdmin ? '' : user.username),
		method: 'GET'
	}).done(function (data) {
		var projects = JSON.parse(data);
		$("#projects-container").html(getProjectTableTemplate(projects));
	});

	$.ajax({
		url: '/php/transaction_query_handler.php?query=list&username=' + (user.isAdmin ? '' : user.username),
		method: 'GET'
	}).done(function (data) {
		var transactions = JSON.parse(data);
		$("#transactions-container").html(getTransactionTableTemplate(transactions));
	});
}

