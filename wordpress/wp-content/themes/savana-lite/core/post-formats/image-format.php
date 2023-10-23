<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_image_format_function')) {

	function savana_lite_image_format_function() {

		do_action(
			'savana_lite_thumbnail',
			'savana_lite_blog_thumbnail',
			esc_attr(savana_lite_setting('savana_lite_enable_post_icon', true))
		);

	?>
    
        <div class="post-article">
        
            <?php 
				
                do_action('savana_lite_before_content', 'post');
                do_action('savana_lite_after_content'); 
                
            ?>
        
        </div>

	<?php

	}

	add_action( 'savana_lite_image_format', 'savana_lite_image_format_function' );

}

?>