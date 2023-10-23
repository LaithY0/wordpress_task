<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_before_content_function')) {

	function haaski_magazine_before_content_function( $type = "post" ) {

		if (!savana_lite_is_woocommerce_active('is_cart')) :

			echo '<div class="post-details">';

				if (
					$type == 'post' &&
					(
						savana_lite_setting('savana_lite_enable_post_category', true)
					)
				) :

					echo '<span class="post-meta post-category-meta">';

						echo '<span>';

						the_category(' . ');

						echo '</span>';

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
					(
						savana_lite_setting('savana_lite_enable_post_author', true) ||
						savana_lite_setting('savana_lite_enable_post_date', true) ||
						savana_lite_setting('savana_lite_enable_post_icon', true)
					)
				) :

					echo '<span class="post-meta">';

						if ( savana_lite_setting('savana_lite_enable_post_author', true) == true ) :

							echo '<span>';

							echo '<i class="fa fa-user-circle" aria-hidden="true"></i> ';
							echo get_the_author_posts_link();

							echo '</span>';

						endif;

						if ( savana_lite_setting('savana_lite_enable_post_date', true) == true ) :

							echo '<span>';

							echo '<i class="fa fa-calendar" aria-hidden="true"></i> ';
							echo get_the_date();

							echo '</span>';

						endif;

						if ( savana_lite_setting('savana_lite_enable_post_icon', true) == true ):

							echo '<span>';

							echo haaski_magazine_posticon();

							echo '</span>';

						endif;

					echo '</span>';

				endif;

			echo '</div>';

		endif;

	}

	add_action( 'savana_lite_before_content', 'haaski_magazine_before_content_function' );

}

?>
