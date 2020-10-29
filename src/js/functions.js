
/*--------------------------------------
	General Functions
--------------------------------------*/

(function($){

    /*--------------------------------------
        On Page Ready
    --------------------------------------*/

	$(document).on('ready', function (){

		/* Title
		--------------------------------------*/

		// Notes...

		/* Smooth Scroll
		--------------------------------------*/

		// Notes...

		// $('.answers .top a').smoothScroll({

			// offset: -20

		// });

		/* External Links
		--------------------------------------*/

		// Notes...

		// $('a').each(function() {

		// 	var external_url = new RegExp('/' + window.location.host + '/');

		// 	if (!external_url.test(this.href)) {

		// 		$(this).addClass('external');

		// 		$(this).click(function(event) {

		// 			event.preventDefault();
		// 			event.stopPropagation();

		// 			window.open(this.href, '_blank');

		// 		});

		// 	}

		// });

	});

    /*--------------------------------------
        On Page Load
    --------------------------------------*/
    
	$(window).on('load', function() {

		/* Title
		--------------------------------------*/

		// Notes...

		/* Nav Toggle
		--------------------------------------*/

		// Notes...

		$('.navigation__toggle').click( function() {

			$(this).parent().toggleClass('navigation--is-open');

		});

		/* Carousel
		--------------------------------------*/

		// Notes...

		$('.samples__list').slick({

			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			asNavFor: '.thumbnails__list',
			prevArrow: '.sample__previous',
			nextArrow: '.sample__next'

		});

		$('.thumbnails__list').slick({

			slidesToShow: 5,
			slidesToScroll: 1,
			asNavFor: '.samples__list',
			arrows: false,
			dots: false,
			centerMode: false,
			focusOnSelect: true

		});

		// $('.nav__label').click( function() {

			// $(this).parent().next().toggleClass('nav__list--is-open');

			// $('body').addClass('primary-nav-is-open');

		// });

		// $('.c-primary-nav__toggle').click( function() {

		// 	$(this).parent().removeClass('c-primary-nav--is-open');

		// 	$('body').removeClass('primary-nav-is-open');

		// });

		/* Smooth Scroll
		--------------------------------------*/

		// Notes...

		/* Move
		--------------------------------------*/

		// $('.c-move a, .c-hero__move a').smoothScroll({

			// offset: -20

        // });

		/* External Links
		--------------------------------------*/

		// If a URL has an external address, open in a new window/tab.

		$('a').each(function() {

			var external_url = new RegExp('/' + window.location.host + '/');

			if (!external_url.test(this.href)) {

				// $(this).addClass('external');

				$(this).click(function(event) {

					event.preventDefault();
					event.stopPropagation();

					window.open(this.href, '_blank');

				});

			}

		});

		/* Slideshow
		--------------------------------------*/

		// Notes...

		// $(".flexslider").flexslider({

			// animation: "fade",
			// slideshowSpeed: 7000,
			// useCSS: true,
			// controlNav: false,
			// directionNav: true,
			// smoothHeight: true,

			// start: function(slider){

				// $("body").removeClass("loading");

			// }

		// });

		/* Screen Size
		--------------------------------------*/

		// Add class of "dev" to <body>

		$("body").addClass("dev");

		// Displays screen size on the fly.

		var windowWidth = $(window).width();

		var windowHeight = $(window).height();

		$(".footer").after('<div id="dev"></div>');

		$("#dev").text(windowWidth + ' ' + 'W' + ' ' + '/' + ' ' + windowHeight + ' ' + 'H');

	});

    /*--------------------------------------
        On Window Resize
    --------------------------------------*/

	$(window).on('resize', function() {

		/* Title
		--------------------------------------*/

		// Notes...

		/* Screen Size
		--------------------------------------*/

		// Displays screen size on the fly.

		var windowWidth = $(window).width();

		var windowHeight = $(window).height();

		$("#dev").text(windowWidth + ' ' + 'W' + ' ' + '/' + ' ' + windowHeight + ' ' + 'H');

	});

})(window.jQuery);