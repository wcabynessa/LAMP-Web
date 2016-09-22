$(document).ready(function () {
	var slideshowImages = [
		"/frontend/img/art.jpg",
		"/frontend/img/comics.jpg",
		"/frontend/img/crafts.jpg",
		"/frontend/img/dance.jpg",
		"/frontend/img/design.jpg",
		"/frontend/img/fashion.jpg",
		"/frontend/img/film.jpg",
		"/frontend/img/food.jpg",
		"/frontend/img/games.jpg",
		"/frontend/img/journalism.jpg",
		"/frontend/img/music.jpg",
		"/frontend/img/photography.jpg",
		"/frontend/img/publishing.jpg",
		"/frontend/img/technology.jpg",
		"/frontend/img/theater.jpg",
		"/frontend/img/others.jpg",
	];

	var categoryNameList = [
		'Art',
		'Comics',
		'Crafts',
		'Dance',
		'Design',
		'Fashion',
		'Film & Video',
		'Food',
		'Games',
		'Journalism',
		'Music',
		'Photography',
		'Publishing',
		'Technology',
		'Theater',
		'Others',
	];

	var categoryCount = {};

	function getProjectCountByCategory() {
		$.ajax({
			url: '/php/project_query_handler.php?query=count',
			method: 'GET',
		}).done(function (data) {
			var categoryList = JSON.parse(data);

			categoryList.forEach(function (categoryInfo) {
				var quantity = categoryInfo['quantity'];
				var category = categoryInfo['category'];
				categoryCount[category] = quantity;
			});

			setTimeout(function () {
				initSlideshow(slideshowImages, categoryNameList);
			}, 5000);
		});
	};

	function initSlideshow(images, names) {
		var currentDisplayedImageIndex = 0;

		$(".slideshow-center-text").on('mouseenter', function () {
			$(".slideshow-center-text").text('Show me !');
		});

		$(".slideshow-center-text").on('mouseleave', function () {
			var categoryName = names[currentDisplayedImageIndex];
			var numProject = categoryCount[categoryName] || 0;
			$(".slideshow-center-text").text('Explore ' + numProject + ' ' + categoryName + ' projects');
		});

		$(".slideshow-center-text").on('click', function () {
			window.location.href = '/frontend/list_project.php?category=' + names[currentDisplayedImageIndex];
		});

		function selectImage(imageIndex) {
			var categoryName = names[imageIndex];
			var numProject = categoryCount[categoryName] || 0;
			$(".slideshow-center-text").text('Explore ' + numProject + ' ' + categoryName + ' projects');
			$(".slideshow img").attr("src", images[imageIndex]);
		}

		setInterval(function () {
			var nextDisplayImageIndex = (currentDisplayedImageIndex + 1) % slideshowImages.length;
			console.log(nextDisplayImageIndex);
			selectImage(nextDisplayImageIndex);
			currentDisplayedImageIndex = nextDisplayImageIndex;
		}, 20000);

		// Start by selecting the first image
		selectImage(currentDisplayedImageIndex);
	};

	getProjectCountByCategory();
});
