<?php 

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_page_format_function')) {

	function savana_lite_page_format_function() {

		do_action(
			'savana_lite_thumbnail',
			'savana_lite_blog_thumbnail',
			false
		);
	
	?>
		
        <div class="post-article page-format">
        
            <?php 
            
                do_action('savana_lite_before_content'); 
                do_action('savana_lite_after_content');
                
            ?>
        
        </div>

	<?php

	}

	add_action( 'savana_lite_page_format', 'savana_lite_page_format_function' );

}

?>