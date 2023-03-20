$(function(){
	let clWidth = document.documentElement.clientWidth;

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
});