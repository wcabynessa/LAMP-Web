function selectTab(sidetabId) {
	// Deselect currently selected sidetab
	$(".sidetab-selector.selected").attr("class", "sidetab-selector");
	$(".sidetab-content.selected").attr("class", "sidetab-content");

	console.log(sidetabId);

	// Select new tab
	var selectorId = "#selector-" + sidetabId;
	var contentId = "#content-" + sidetabId;
	$(selectorId).attr("class", "sidetab-selector selected");
	$(contentId).attr("class", "sidetab-content selected");
}

var mapId = {};

function initSidetab(sidetabCount) {
	for(var id = 0;  id < sidetabCount;  id++) {
		// Map id and bind click event to selector
		var selectorId = "#selector-" + id;
		mapId[selectorId] = id;
		$(selectorId).on("click", function (e) {
			e.preventDefault();
			var selectorId = "#" + e.currentTarget.id;
			selectTab(mapId[selectorId]);
			return false;
		});
	}
	selectTab(0);
}
