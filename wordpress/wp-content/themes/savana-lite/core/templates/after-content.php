<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_after_content_function')) {

	function savana_lite_after_content_function() {

		if ( savana_lite_get_archive_title() || is_page_template() || is_search() || is_home() ) {

			if ( savana_lite_setting('savana_lite_enable_readmore_button', true) == true ) {

				the_excerpt();

			} else if (savana_lite_setting('savana_lite_enable_readmore_button') == false ) {

				the_content();

			}

		} else {

			the_content();

			if ( is_single() && savana_lite_setting('savana_lite_enable_author_info_box') == true ) : 

				do_action('savana_lite_post_author');

			endif;

			the_tags( '<footer class="line"><span class="entry-info"><strong>Tags:</strong> ', ', ', '</span></footer>' );

			comments_template();

		}

	}

	add_action( 'savana_lite_after_content', 'savana_lite_after_content_function' );

}

?>
