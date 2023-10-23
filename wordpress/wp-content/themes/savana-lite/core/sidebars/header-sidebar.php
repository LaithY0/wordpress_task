<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_header_sidebar_function')) {

	function savana_lite_header_sidebar_function() {

		$isWidget = is_active_sidebar('savana-lite-header-widget-area') ? TRUE : FALSE;
		$isPosition = ( savana_lite_setting('savana_lite_homepage_slideshow_position') === 'header' ) ? TRUE : FALSE;
		$isHome = savana_lite_setting('savana_lite_enable_homepage_slideshow', TRUE);
		$isSlideshow = ( $isHome == TRUE && $isPosition == TRUE && ( is_home() || is_front_page()) ) ? TRUE : FALSE;
		if ( $isWidget || $isSlideshow ): 
	
	?>
			
			<div id="header_sidebar" class="container sidebar-area">
			
				<div class="row">
				
					<div class="col-md-12">
                    
                    	<?php 
						
							if ( $isSlideshow == TRUE )
								do_action('savana_lite_slick_slider', 1, 'savana_lite_slick_large');
							
							if ( $isWidget == TRUE )
								dynamic_sidebar('savana-lite-header-widget-area');
                    	
						?>
												
					</div>
	
				</div>
				
			</div>
				
	<?php 
	
		endif;
		
	}

	add_action( 'savana_lite_header_sidebar', 'savana_lite_header_sidebar_function' );

}

?>