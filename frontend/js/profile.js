function initProfilePage(user) {
	$.ajax({
		url: '/php/project_query_handler.php?query=list&username=' + (user.isAdmin ? '' : user.username),
		method: 'GET'
	}).done(function (data) {
		var projects = JSON.parse(data);
		$("#projects-container").html(getProjectTableTemplate(projects));
		// Bind Click event
		var mapId = {};
		projects.forEach(function (project) {
			var rowId = "project-table-row-" + project.id;
			mapId[rowId] = project.id;

			$("#" + rowId).on("click", function (e) {
				var rowId = e.currentTarget.id;
				console.log(rowId);
				window.location.href = "/frontend/edit_project.php?id=" + mapId[rowId];
			});
		});
	});

	$.ajax({
		url: '/php/transaction_query_handler.php?query=list&username=' + (user.isAdmin ? '' : user.username),
		method: 'GET'
	}).done(function (data) {
		var transactions = JSON.parse(data);
		$("#transactions-container").html(getTransactionTableTemplate(transactions));
	});
}

