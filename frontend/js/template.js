var getImageTemplate = function(imageUrl, floatValue='float-left', height=100) {
	var html = "";

	html += "<div class=\"image\" class=\"" + floatValue + "\">";
	html += "	<img src=\"" + imageUrl + "\" height=\"" + height + "px\"> </img>";
	html += "</div>";

	return html;
}

var getImageListTemplate = function(imageUrlList, floatValue='float-left', height=100) {
	var html = "";

	html += "<div class=\"image-list-container\" style=\"height:" + height + "px\">";
	imageUrlList.forEach(function (imageUrl) {
		html += getImageTemplate(imageUrl, floatValue, height);
	});
	html += "</div>";

	return html;
}

var getViewProjectTemplate = function(project) {
	var html = "";

	html += "<div class=\"project-card\" id=\"project-card-" + project.id +"\">";
	html += "	<h3 class=\"project-title clickable\"> " + project.title + "</h3>";
	html += "	<h6> Goal: " + project.target_amount + "&nbsp;&nbsp;Funded: " + project.funded_amount + "</h6>";
	html += "	<div> " + project.description + "</div>";
	html += "	<div> " + getImageListTemplate(project.images, 'float-left', 70) + "</div>";
	html += "	<div class=\"input-group\">";
	html += "		<input class=\"money-input form-control\" type=\"number\"/>";
	html += "		<span class=\"input-group-btn\">";
	html += "			<button class=\"donate-button btn btn-default\" type=\"button\">Donate</button>";
	html += "		</span>";
	html += "	</div>";
	html += "</div>";

	return html;
}

var getProjectCardTemplate = function(project) {
	var html = "";

	html += "<div class=\"project-card\" id=\"project-card-" + project.id +"\">";
	html += "	<h3 class=\"project-title clickable\"> " + project.title + "</h3>";
	html += "	<h6> Target amount: " + project.target_amount + "    Funded: " + project.funded_amount + "</h6>";
	html += "	<div> " + project.description + "</div>";
	html += "	<div> " + getImageListTemplate(project.images, 'float-left', 70) + "</div>";
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
