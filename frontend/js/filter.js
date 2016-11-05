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
	var not_finished = ($('#not-finished-only').prop('checked') ? 1 : 0);
	var reverse_order = ($('#reverse-order').prop('checked') ? 1 : 0);
	var top_filter = $('#project-filter-top').val();

	var params = {
		'category': category,
		'search': search_key,
		'order_by': order_by,
		'reverse_order': reverse_order,
		'not_finished': not_finished,
		'top_filter': top_filter
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
	if (args['reverse_order'] == "1") {
		$("#reverse-order").prop('checked', true);
	}
	if (args['not_finished'] == "1") {
		$('#not-finished-only').prop('checked', true);
	}
	if (args['top_filter']) {
		$('#project-filter-top').val(args['top_filter']);
	}
};

