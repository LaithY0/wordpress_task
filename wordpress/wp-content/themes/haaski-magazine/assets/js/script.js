/*
 * Licensed under MIT license
 * https://opensource.org/licenses/mit-license.php
 */

jQuery.noConflict()(function($){

	"use strict";

/* ===============================================
   Featured posts
   =============================================== */

	$(document).ready(function(){ 

		var dots;
		var owl = $('.single-item');
		var getDots = owl.attr('data-dots');
		
		if ( getDots === '' ) {
			dots = false;
		} else if ( getDots !== null || getDots === true ) {
			dots = true;
		}

		owl.owlCarousel({
			loop:false,
			margin:0,
			nav:false,
			dots:dots,
			items:1,
			onInitialized: function() {
				$('.owl-item').find('a').attr('tabindex','-1');
				$(".owl-item").eq(0).find('a').removeAttr('tabindex');
			},
		
		});
		
		owl.on('changed.owl.carousel', function(event) {
				
			var currentItem = event.item.index;

			$('.owl-item').find('a').attr('tabindex','-1');
			$(".owl-item").eq(currentItem).find('a').removeAttr('tabindex');
		
		});
	
	});

});
