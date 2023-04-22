$(function(){
	let clWidth = document.documentElement.clientWidth;
	let getQuery = getQueryParams(document.location.search);

	let $links = $('.navLink');
	$links.on('click', function(e) {
		e.preventDefault();

		let target = $(this).attr('href');

		$('html').animate({
			scrollTop: $(target).offset().top
		}, 700);
	});

	$('.reviews__list').slick({
		slidesToShow: 2,
		dots: true,
		appendDots: '.reviews__dots',
		arrows: false,
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 1,
				}
			},
		]
	});

	$('.header__bar').on('click', function() {
		$(this).toggleClass('header__bar--open');

		$('.header__navBody').toggleClass('header__navBody--open');

		$('html').toggleClass('openMenu');
	});

	$(".singleProject__sliderMain").slick({
		slidesToShow: 1,
		arrows: false,
		asNavFor: ".singleProject__sliderNav",
		fade: true,
		draggable: false,
	});

	$(".singleProject__sliderNav").slick({
		slidesToShow: 4,
		arrows: false,
		asNavFor: ".singleProject__sliderMain",
		focusOnSelect: true,
		draggable: false,
	});

	$(".singleProject__slider").addClass("singleProject__slider--loaded");

	$('.singleProject__panel').slick({
		slidesToShow: 1,
		arrows: false,
		fade: true,
		draggable: false,
		swipe: false
	});

	$(".singleProject__panels").slick({
		slidesToShow: 4,
		arrows: false,
		asNavFor: ".singleProject__panel",
		focusOnSelect: true
	});

	$('.singleProject__descMore').on("click", function() {
		let el = $('.singleProject__desc');
	    curHeight = el.height();
	    autoHeight = el.css('height', 'auto').height();

		el.height(curHeight).animate({height: autoHeight}, 300, 'linear');

		$(this).slideUp(300);
	});

	$('.catalog__toggleFilter').on("click", function() {
		const $toggleBtn = $(this);
		const $filter = $('.filter');

		if($toggleBtn.hasClass('catalog__toggleFilter--open')) {
			$toggleBtn.removeClass('catalog__toggleFilter--open');
			$toggleBtn.children("span").text("Фильтровать по хар-кам");
			$filter.slideUp(500);
		}
		else {
			$toggleBtn.addClass('catalog__toggleFilter--open');
			$toggleBtn.children("span").text("Закрыть фильтр");
			$filter.slideDown(500);
		}
	});

	let filterSquareValues = [
		getQuery["filter-square-min"] ?? '10',
		getQuery["filter-square-max"] ?? '300'
	];

	$('.filter__range--square .filter__rangeSlider').slider({
		range: true,
		min: 10,
		max: 300,
		values: filterSquareValues,
		create: function(event, ui) {
			$('.filter__range--square .filter__rangeMin strong').text(filterSquareValues[0]);
			$('.filter__range--square .filter__rangeMax strong').text(filterSquareValues[1]);

			$('input[name=filter-square-min]').val(filterSquareValues[0]);
			$('input[name=filter-square-max]').val(filterSquareValues[1]);
		},
		slide: function(event, ui) {
			$('.filter__range--square .filter__rangeMin strong').text(ui.values[0]);
			$('.filter__range--square .filter__rangeMax strong').text(ui.values[1]);

			$('input[name=filter-square-min]').val(ui.values[0]);
			$('input[name=filter-square-max]').val(ui.values[1]);
		}
	});

	let filterHeightValues = [
		getQuery["filter-height-min"] ?? '0',
		getQuery["filter-height-max"] ?? '8'
	];

	$('.filter__range--height .filter__rangeSlider').slider({
		range: true,
		min: 0,
		max: 8,
		values: filterHeightValues,
		create: function(event, ui) {
			$('.filter__range--height .filter__rangeMin strong').text(filterHeightValues[0]);
			$('.filter__range--height .filter__rangeMax strong').text(filterHeightValues[1]);

			$('input[name=filter-height-min]').val(filterHeightValues[0]);
			$('input[name=filter-height-max]').val(filterHeightValues[1]);
		},
		slide: function(event, ui) {
			$('.filter__range--height .filter__rangeMin strong').text(ui.values[0]);
			$('.filter__range--height .filter__rangeMax strong').text(ui.values[1]);

			$('input[name=filter-height-min]').val(ui.values[0]);
			$('input[name=filter-height-max]').val(ui.values[1]);
		}
	});

	let filterFloorValues = [
		getQuery["filter-floor-min"] ?? '1',
		getQuery["filter-floor-max"] ?? '4'
	];

	$('.filter__range--floor .filter__rangeSlider').slider({
		range: true,
		min: 1,
		max: 4,
		values: filterFloorValues,
		create: function(event, ui) {
			$('.filter__range--floor .filter__rangeMin strong').text(filterFloorValues[0]);
			$('.filter__range--floor .filter__rangeMax strong').text(filterFloorValues[1]);

			$('input[name=filter-floor-min]').val(filterFloorValues[0]);
			$('input[name=filter-floor-max]').val(filterFloorValues[1]);
		},
		slide: function(event, ui) {
			$('.filter__range--floor .filter__rangeMin strong').text(ui.values[0]);
			$('.filter__range--floor .filter__rangeMax strong').text(ui.values[1]);

			$('input[name=filter-floor-min]').val(ui.values[0]);
			$('input[name=filter-floor-max]').val(ui.values[1]);
		}
	});

	$('.singleProject__order').on('click', function() {
		$('input[name=order-project]').val($('.singleProject__title').text());
		$('input[name=order-decor-ext]').val($('input[name=decor-ext]:checked').val());
		$('input[name=order-decor-in]').val($('input[name=decor-in]:checked').val());
	});

	$('#filter').on('submit', function(e) {
		let path = (window.location.href).split('?')[0];
		path = path.replace(/\/page\/[2-9]\//, '/page/1/');

		// let formData = new FormData(document.forms[0]);
		// let search = new URLSearchParams(formData);
		// let query = search.toString();
		let query = $(this).serialize();
		
		e.preventDefault();
		
		window.location.replace(`${path}?${query}`);
	});

	function getQueryParams(qs) {
	    qs = qs.split('+').join(' ');

	    var params = {},
	        tokens,
	        re = /[?&]?([^=]+)=([^&]*)/g;

	    while (tokens = re.exec(qs)) {
	        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
	    }

	    return params;
	}
});