var getImageContainerHtml = function(imageUrl, floatValue='float-left', height=100) {
	var html = "";

	html += "<div class=\"image\" class=\"" + floatValue + "\">";
	html += "	<img src=\"" + imageUrl + "\" height=\"" + height + "px\"> </img>";
	html += "</div>";

	return html;
}

var getImageListContainerHtml = function(imageUrlList, floatValue='float-left', height=100) {
	var html = "";

	html += "<div class=\"image-list-container\" style=\"height:" + height + "px\">";
	imageUrlList.forEach(function (imageUrl) {
		html += getImageContainerHtml(imageUrl, floatValue, height);
	});
	html += "</div>";

	return html;
}

var getProjectContainer = function(project) {
	var html = "";

	html += "<div class=\"project-card\">";
	html += "	<h3> " + project.title + "</h3>";
	html += "	<div> " + project.description + "</div>";
	html += "	<div> " + getImageListContainerHtml(project.images, 'float-left', 70) + "</div>";
	html += "</div>";

	return html;
}

var getProjectListContainerHtml = function(projectList) {
	var html = "";

	html += "<div>";
	projectList.forEach(function (project) {
		html += getProjectContainer(project);
	});
	html += "</div>";

	return html;
}
