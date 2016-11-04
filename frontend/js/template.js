var getProjectTableTemplate = function (projects) {
	var html = "";

	html += "<table class=\"table\">";
	html += "	<tr class=\"table-header\">";
	html += "		<th> ID </th>";
	html += "		<th> Title </th>";
	html += "		<th> Owner </th>";
	html += "		<th> Description </th>";
	html += "		<th> Category </th>";
	html += "		<th> Funded Amount </th>";
	html += "		<th> Target Amount </th>";
	html += "		<th> Created Time </th>";
	html += "	</tr>";

	projects.forEach(function (project) {
		var rowId = "project-table-row-" + project.id;

		html += "<tr id=\"" + rowId + "\" class=\"table-row\">";
		html += "	<td> " + project.id + "</td>";
		html += "	<td> " + project.title + "</td>";
		html += "	<td> " + project.owner + "</td>";
		html += "	<td><div class=\"truncate\">" + project.description + "</div></td>";
		html += "	<td> " + project.category + "</td>";
		html += "	<td> " + project.funded_amount + "</td>";
		html += "	<td> " + project.target_amount + "</td>";
		html += "	<td> " + project.created_time + "</td>";
		html += "</tr>";
	});

	html += "</table>";
	return html;
}

var getTransactionTableTemplate = function (transactions) {
	var html = "";

	html += "<table class=\"table\">";
	html += "	<tr>";
	html += "		<th> ID </th>";
	html += "		<th> Donor </th>";
	html += "		<th> Project Title </th>";
	html += "		<th> Amount </th>";
	html += "		<th> Created Time </th>";
	html += "	</tr>";

	transactions.forEach(function (transaction) {
		html += "<tr>";
		html += "	<td> " + transaction.id + "</td>";
		html += "	<td> " + transaction.donor + "</td>";
		html += "	<td> " + transaction.project_title + "</td>";
		html += "	<td> " + transaction.amount + "</td>";
		html += "	<td> " + transaction.created_time + "</td>";
		html += "</tr>";
	});

	html += "</table>";
	return html;
}

var getImageTemplate = function(imageUrl, params = {}) {
	var floatValue = params.floatValue || 'float-left';
	var width = params.width;
	var height = params.height;
	var outerWidth = params.outerWidth;
	var outerHeight = params.outerHeight;
	var html = "";

	html += "<div class=\"image " + floatValue + "\" style=\"width:" + outerWidth + ";height:" + outerHeight + ";\">";
	html += "	<img src=\"" + imageUrl + "\" width=\"" + width + "\" height=\"" + height + "\"> </img>";
	html += "</div>";

	return html;
}

var getImageListTemplate = function(imageUrlList, params = {}) {
	var floatValue = params.floatValue || 'float-left';
	var width = params.width;
	var height = params.height;
	var html = "";

	html += "<div class=\"image-list-container\" style=\"width:" + width + ";height:" + height + "\">";
	imageUrlList.forEach(function (imageUrl) {
		html += getImageTemplate(imageUrl, params);
	});
	html += "</div>";

	return html;
}

var getDonationListTemplate = function (donations) {
	var html= "";

	donations.forEach(function (donation) {
		html += "<div class=\"project-view-donation-card\">";
		html += "	<h5> " + donation.donor + " </h5>";
		html += "	<div> " + donation.amount + " $ </div>";
		html += "</div>";
	});

	return html;
}

var getProjectCardTemplate = function(project) {
	var mainImageConfig = {
		floatValue: 'float-left',
		outerHeight: '300px',
		outerWidth: '100%',
		height: '100%'
	}

	var html = "";

	html += "<div class=\"row project-card\" id=\"project-card-" + project.id +"\">";
	html += "	<div class=\"col-xs-5 no-padding\">";
	html += "		" + getImageTemplate(project.main_image, mainImageConfig);
	html += "	</div>";
	html += "	<div class=\"col-xs-7\">"
	html += "		<div class=\"project-card-title clickable\"> " + project.title + "</div>";
	html += "		<div class=\"project-card-owner\"> by " + project.owner + "</div>";
	html += "		<div class=\"project-card-description\"> " + project.description + "</div>";
	html += "		<div class=\"progress project-card-progress\">";
	html += "			<div class=\"progress-bar progress-bar-success\" role=\"progressbar\" aria-valuemin=\"0\" aria-valuemax=\"100\" aria-valuenow=\"" + project.progress + "\" style=\"width:" + project.progress + "%;\"> </div>";
	html += "		</div>";
	html += "		<div class=\"col-xs-6 project-card-funded-money\">";
	html += "			$ " + project.funded_amount + " funded";
	html += "		</div>";
	html += "		<div class=\"col-xs-6 project-card-category\">";
	html += "			<a href=\"\"> view other " + project.category + " projects </a>";
	html += "		</div>";
	//html += "		<div> " + getImageListTemplate(project.images, {floatValue:'float-left',height:'70px'}) + "</div>";
	html += "	</div>";
	html += "</div>";

	return html;
}

var getProjectListTemplate = function(projectList) {
	var html = "";

	html += "<div>";
	projectList.forEach(function (project) {
		html += getProjectCardTemplate(project);
	});
	html += "</div>";

	return html;
}
