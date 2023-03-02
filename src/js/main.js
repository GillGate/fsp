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
});