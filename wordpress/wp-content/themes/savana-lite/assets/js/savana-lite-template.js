/*
 * jQuery Savana Lite theme functions file
 * https://www.themeinprogress.com
 *
 * Copyright 2019, ThemeinProgress
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   HEADER CART
   ============================================= */
	
	$('div.header-cart').hover(
		
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeIn(100);
		}, 
		function () {
			$(this).children('div.header-cart-widget').stop(true, true).fadeOut(400);		
		}
			
	);
	
/* ===============================================
   FIXED HEADER
   =============================================== */

	function savana_lite_header() {

		if( $('body').hasClass('sticky_header') ) {

			var menuHeight = $('#menu-wrapper').innerHeight();
			var headerHeight = $('#header').innerHeight() + $('#logo-wrapper').innerHeight();
		
			if( $(window).scrollTop() > headerHeight ) {
				$('#menu-wrapper').addClass('fixed');
				$('body').css({'padding-top': menuHeight});
			} else {
				$('#menu-wrapper').removeClass('fixed');
				$('body').css({'padding-top': 0});
			}
			
		}
	
	}
	
	$( document ).ready(savana_lite_header);
	$( window ).scroll(savana_lite_header);
	$( window ).resize(savana_lite_header);

/* ===============================================
   SCROLL SIDEBAR
   =============================================== */

	$(document).ready(function() {

		$("#scroll-sidebar").niceScroll(".wrap", {
			cursorwidth: "5px",
			cursorborder: "1px solid #333",
			railpadding: {
				top: 0,
				left: 0,
				bottom: 0,
				right: 0
			}
		});

		$('nav#mobilemenu ul > li > a').click(function(){
			setTimeout(function(){
			  $("#scroll-sidebar").getNiceScroll().resize();
			}, 500);
		});
		
	});

	$(window).load(function() {

		$(".mobile-navigation").click(function() {

			$('#overlay-body').fadeIn(500).addClass('visible');
			$('body').addClass('overlay-active').addClass('no-scrolling');
			$('#wrapper').addClass('open-sidebar');

		    setTimeout(function(){
				$('#scroll-sidebar a.mobile-navigation').focus();
    		}, 100);

		});

		if ( $(window).width() < 992 ) {

			$("#overlay-body").swipe({
	
				swipeLeft:function() {
					$('#overlay-body').fadeOut(500);
					$('body').removeClass('overlay-active').removeClass('no-scrolling');
					$('#wrapper').removeClass('open-sidebar');
				},
	
				threshold:0
		
			});

			$("#sidebar-wrapper .mobile-navigation").click(function() {
				
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
		
			});

		} else if ( $(window).width() > 992 ) {

			$("#sidebar-wrapper .mobile-navigation, #overlay-body").click(function() {
				$('#overlay-body').fadeOut(600);
				$('body').removeClass('overlay-active').removeClass('no-scrolling');
				$('#wrapper').removeClass('open-sidebar');
			});

		}
		
	});


/* ===============================================
   Mobile menu
   =============================================== */

	 $('nav#mobilemenu.mobile-menu-1 ul > li').each(function(){

 		if( $('ul', this).length > 0 ) {

 			var element = $(this).children('a');
 			$( '<a class="sub-indicator" href="#"><span class="sf-sub-indicator"><i class="fa fa-caret-down"></i></span></a>' ).insertAfter(element);

 		}

 	});

	 $('nav#mobilemenu.mobile-menu-2 ul > li').each(function(){

 		if( $('ul', this).length > 0 ) {

			$(this)
			.children('a')
			.append('<span class="sf-sub-indicator"><i class="fa fa-caret-down"></i></span>'); 

 		}

 	});

/* ===============================================
   Mobile menu 1
   =============================================== */

	function savana_lite_open_submenu_one(selector) {

		if(
			selector.closest('a').next('ul.sub-menu').css('display') === 'none' ||
			selector.closest('a').next('ul.children').css('display') === 'none' ||
			selector.next('ul.children').css('display') === 'none'
		) {
			selector.html('<i class="fa fa-caret-up"></i>');
		} else {
			selector.html('<i class="fa fa-caret-down"></i>');
		}

		selector
			.closest('a')
			.next('ul.sub-menu')
			.stop(true,false)
			.slideToggle(500);

		selector
			.closest('a')
			.next('ul.children')
			.stop(true,false)
			.slideToggle(500);

	}

	$('nav#mobilemenu.mobile-menu-1 ul > li .sub-indicator, nav#mobilemenu.mobile-menu-1 ul > li > ul > li .sub-indicator').click(function(e){

		e.preventDefault();
		var selector = $(this);
		savana_lite_open_submenu_one(selector);

	});

	$('nav#mobilemenu.mobile-menu-1 ul > li .sub-indicator, nav#mobilemenu.mobile-menu-1 ul > li > ul > li .sub-indicator').keydown(function(e){

		var selector = $(this);
		if ( e.keyCode === 13 ) {
			e.preventDefault();
			savana_lite_open_submenu_one(selector);
		}

	});

/* ===============================================
   Mobile menu 2
   =============================================== */

	$('nav#mobilemenu.mobile-menu-2 > ul ').children('li').each(function(){
		if( $('ul', this).length > 0 ) {
			$(this).addClass('submenuitem-level-1');
		}
	});

	function savana_lite_open_submenu_two(selector) {

		if(
			selector.next('ul.sub-menu').css('display') === 'none' ||
			selector.next('ul.children').css('display') === 'none'
		) {

			selector
				.find('.sf-sub-indicator')
				.html('<i class="fa fa-caret-up"></i>');

			$('nav#mobilemenu.mobile-menu-2 > ul > li')
				.not(selector.parents('.submenuitem-level-1:visible'))
				.children('a')
				.children('.sf-sub-indicator')
				.html('<i class="fa fa-caret-down"></i>');

			$('nav#mobilemenu.mobile-menu-2 > ul > li')
				.not(selector.parents('.submenuitem-level-1:visible'))
				.find('ul.sub-menu')
				.slideUp(500)
				.find('.sf-sub-indicator')
				.html('<i class="fa fa-caret-down"></i>');

			selector
				.next('ul.sub-menu')
				.stop(true,false)
				.slideDown('slow');
			selector
				.next('ul.children')
				.stop(true,false)
				.slideDown(500);

			return false;

		} else {

			if ( selector.attr('href') === '#' ) {

				selector
					.find('.sf-sub-indicator')
					.html('<i class="fa fa-caret-down"></i>');

				selector
					.next('ul')
					.stop(true,false)
					.slideUp(500);

				return false;

			} else {

				window.location.href = selector.attr('href');
				return true;

			}

		}

	}

	$('nav#mobilemenu.mobile-menu-2 ul > li > a').click(function(e){

		e.preventDefault();
		var selector = $(this);
		savana_lite_open_submenu_two(selector);

	});

	$('nav#mobilemenu.mobile-menu-2 ul > li > a').keydown(function(e){

		var selector = $(this);
		if ( e.keyCode === 13 ) {
			e.preventDefault();
			savana_lite_open_submenu_two(selector);
		}

	});

/* ===============================================
   TRAP TAB FOCUS ON MODAL SIDEBAR
   ============================================= */

	var focusableElements = [
	  'button',
	  '[href]',
	  'input',
	  'select',
	  'textarea',
	  'textarea',
	  '[tabindex]:not([tabindex="-1"])',
	];

	$.each(focusableElements, function(index, value) {

		var elements = $('#scroll-sidebar').find(value);

		var firstEl = elements[0];
		var lastEl = elements[ elements.length - 1 ];

		$(document).on('keydown', function (event) {

			var tabKey = event.keyCode === 9;
			var shiftKey = event.shiftKey;
			var activeEl = document.activeElement;

			if ( ! shiftKey && tabKey && lastEl === activeEl ) {
				event.preventDefault();
				firstEl.focus();
			}

			if ( shiftKey && tabKey && firstEl === activeEl ) {
				event.preventDefault();
				lastEl.focus();
			}

		});

	});

/* ===============================================
   Open header search
   =============================================== */

	function savana_lite_open_search_form() {

		$('.header-search .search-form').addClass('is-open');
		$('body').addClass('no-scrolling');
		setTimeout(function(){
		   $('.search-form  #header-searchform input#header-s').filter(':visible').focus();
		}, 100);

		return false;
	}

	$( ".header-search a.open-search-form").on("click", savana_lite_open_search_form);

/* ===============================================
   Close header search
   =============================================== */

	function savana_lite_close_search_form() {
		$('.header-search .search-form').removeClass('is-open');
		$('body').removeClass('no-scrolling');
	}

	$( ".header-search a.close-search-form").on("click", savana_lite_close_search_form);

/* ===============================================
   TRAP TAB FOCUS ON MODAL SEARCH
   ============================================= */

	$('.search-form  #header-searchform :input').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form a.close-search-form').focus();

	    }
	});

	$('.search-form  a.close-search-form').on('keydown', function (e) {
	    if ($("this:focus") && (e.which === 9)) {
	        e.preventDefault();
	        $(this).blur();
	        $('.search-form  #header-searchform :input').focus();

	    }
	});

/* ===============================================
   Footer fix
   =============================================== */

	function savana_lite_footer() {
	
		var footerHeight = $('#footer').innerHeight();
		$('#wrapper').css({'padding-bottom':footerHeight});
	
	}
	
	$( document ).ready(savana_lite_footer);
	$( window ).resize(savana_lite_footer);

/* ===============================================
   Scroll to top Plugin
   =============================================== */

	$(window).scroll(function() {
		
		if( $(window).scrollTop() > 400 ) {
			$('#back-to-top').fadeIn(500);
		} else {
			$('#back-to-top').fadeOut(500);
		}
		
	});

	$('#back-to-top').click(function(){
		$("html, body").animate({scrollTop: 0}, 700);
		return false;
	});

/* ===============================================
   Masonry
   =============================================== */

	function savana_lite_masonry() {
		
		$('.masonry').imagesLoaded(function () {
	
			$('.masonry').masonry({
				itemSelector: '.masonry-item',
				isAnimated: true
			});
	
		});

	}
   
	$(document).ready(function(){
		savana_lite_masonry();
	});

	$(window).resize(function(){
		savana_lite_masonry();
	});
	
/* ===============================================
   fitVids
   =============================================== */

	function sheeba_lite_embed() {

		$('#wrapper').imagesLoaded(function () {
			$('.embed-container, .video-container, .maps-container').fitVids();
			savana_lite_masonry();
		});
		
	}

	$(window).load(sheeba_lite_embed);
	$(document).ready(sheeba_lite_embed);

/* ===============================================
   Swipebox gallery
   =============================================== */

	$(document).ready(function(){
		
		var counter = 0;

		$('div.gallery').each(function(){
			
			counter++;
			
			$(this).find('.swipebox').attr('data-rel', 'gallery-' + counter );
		
		});
		
		$('.swipebox').swipebox();

	});

/* ===============================================
   Slick slider
   ============================================= */

	$('.slick-slideshow').each(function(){

		var mobilecolums = 1;
		var colums = parseInt($(this).attr('data-columns'));
		if ( colums >= 3 ) { mobilecolums = 2 ;}

		$(this).children('.slick-slides').slick({
		
			centerMode: true,
			centerPadding: '50px',
			slidesToShow: colums,
			prevArrow: '<div class="prev-arrow"><span class="dashicons dashicons-arrow-left-alt"></span></div>',
			nextArrow: '<div class="next-arrow"><span class="dashicons dashicons-arrow-right-alt"></span></div>',
			responsive: [
				{
					breakpoint: 480,
					settings: {
						centerMode: false,
						slidesToShow: 1,
						arrows: false
					}
				},
				{
					breakpoint: 600,
					settings: {
						centerMode: false,
						slidesToShow: 2,
						arrows: true
					}
				},
				{
					breakpoint: 992,
					settings: {
						centerMode: false,
						slidesToShow: mobilecolums,
						arrows: true
					}
				}
		
			]
	
		});
	
	});

	function slickActiveItem() {
		
		$('.slick-slideshow').each(function(){

			var items = $(this).find('.slick-slide').length;
			var colums = parseInt($(this).attr('data-columns'));
			$(this).find('.slick-slide').removeClass('slick-visible-item');

			if ( $('body').width() > 992 ) {
				
				if ( items <= colums ) {
				
					$(this).find('.slick-slide').addClass('slick-visible-item');
				
				} else {
					
					if ( colums%2 === 0 ) {
						
						$(this).find('.slick-active').prev().addClass('slick-visible-item');
							
					} else {
						
						$(this).find('.slick-active').addClass('slick-visible-item');
			
					}
				}
				
			} else {
				
				$(this).find('.slick-active').addClass('slick-visible-item');
				
			}
			
		}); 
		
	}
	
	$(document).ready(function(){
		
		slickActiveItem();
		$(".slick-slideshow .slick-slides").on('afterChange', function(){
			slickActiveItem();
		});
	
	});

});          