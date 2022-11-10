jQuery(function ($) {
	$(document).ready(function () {
		$('.our-services .row-services .item a').on('click', function (e) {
			if ($(this).parent('.item').hasClass('active')) {
				window.location.href = $(this).attr("href");
			}
			e.preventDefault();
		})

		$('.our-services .row-services .item').on('click', function () {
			$('.our-services .row-services .item.active').removeClass('active');
			$(this).addClass('active');

			$('.our-services .row-services .item a').on('click', function (e) {
				if ($(this).parent('.item').hasClass('active')) {
					window.location.href = $(this).attr("href");
				}
				e.preventDefault();
			})
		})


	})


	/**
	 * Animation on scroll
	 */
	window.addEventListener('load', () => {
		AOS.init({
			duration: 1000,
			easing: 'ease-in-out',
			once: true,
			mirror: false
		})
	});

})
