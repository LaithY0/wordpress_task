<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_get_title_function')) {

	function savana_lite_get_title_function($type) {
		
		global $post;
		
		$title = get_the_title();
		
		if ( !empty($title) ) {
		
			if ( $type == "blog" ) { 
		
				echo '<h3 class="title page-title"><a href="'.esc_url(get_permalink($post->ID)).'">'. esc_html($title) .'</a></h3>';
		
			} else if ( $type == "single" ) {
				
				echo '<h1 class="title page-title">'. esc_html($title) .'</h1>';
	
			}
	
		}
	
	}

	add_action( 'savana_lite_get_title', 'savana_lite_get_title_function' );

}

?>