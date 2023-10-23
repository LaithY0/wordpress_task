<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_before_content_function')) {

	function savana_lite_before_content_function( $type = "post" ) {
		
		if ( 
			$type == 'post' && 
			( savana_lite_setting('savana_lite_enable_post_author', true) || savana_lite_setting('savana_lite_enable_post_date', true))
		) :
			
			echo '<span class="entry-date">';

			if ( savana_lite_setting('savana_lite_enable_post_author', true) == true ) :

				esc_html_e('Written by ','savana-lite');
				echo get_the_author_posts_link();
			
			endif;

			if ( savana_lite_setting('savana_lite_enable_post_date', true) == true ) :

				esc_html_e(' on ','savana-lite');
				echo get_the_date();
			
			endif;

			echo '</span>';

		endif;
		
		if ( ! savana_lite_is_single() ) {

			do_action('savana_lite_get_title', 'blog' ); 

		} else {

			if ( !savana_lite_is_woocommerce_active('is_cart') ) :
	
				if ( savana_lite_is_single() && !is_page_template() ) :
							 
					do_action('savana_lite_get_title', 'single');
							
				else :
					
					do_action('savana_lite_get_title', 'blog'); 
							 
				endif;
	
			endif;

		}

		if ( 
			$type == 'post' && 
			( savana_lite_setting('savana_lite_enable_post_category', true))
		) :
			
			echo '<span class="entry-category">'; 
			the_category(' . '); 
			echo '</span>';
		
		endif;

	} 
	
	add_action( 'savana_lite_before_content', 'savana_lite_before_content_function' );

}

?>