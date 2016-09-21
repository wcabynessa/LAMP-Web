function getUrl(path = '/', params = {}) {
	var url = path + '?';

	for (key in params) {
		var value = params[key];
		if (value) url += key + '=' + value + '&';
	}

	return url;
}

$(".project-filter-button button").on('click', function (e) {
	e.preventDefault();

	var category = $("#project-filter-category").val();
	if (category === 'All') category = '';
	var search_key = $("#project-filter-search-key").val();
	var order_by = $("#project-filter-order-by").val();

	var params = {
		'category': category,
		'search': search_key,
		'order_by': order_by
	};

	window.location.href = getUrl('/frontend/list_project.php', params);
	return false;
});

function initFilterValue(args) {
	if (args['category']) {
		$("#project-filter-category").val(args['category']);
	}
	if (args['order_by']) {
		$("#project-filter-order-by").val(args['order_by']);
	}
	if (args['search_key']) {
		$("#project-filter-search-key").val(args['search']);
	}
};

