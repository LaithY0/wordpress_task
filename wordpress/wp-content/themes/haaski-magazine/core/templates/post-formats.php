<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_postformat_function')) {

	function haaski_magazine_postformat_function() {

		if (
			get_post_type(get_the_ID()) == 'page' ||
			(
				is_single() &&
				!is_singular('post')
			)
		) {

			$postFormat = 'page';

		} elseif ( get_post_type( get_the_ID()) == 'product') {

			$postFormat = get_post_type( get_the_ID());

		} elseif (
			!get_post_format() ||
			in_array( get_post_format(), array('status', 'chat', 'audio', 'video', 'gallery')) ||
			in_array( get_post_format(), array('link', 'quote', 'aside')) && ( savana_lite_setting('savana_lite_enable_post_format_layout', true) == false )
		) {

			$postFormat = 'default';

		} else {

			$postFormat = get_post_format();

		}

		do_action( 'savana_lite_' . $postFormat . '_format' );

	}

	add_action( 'savana_lite_postformat', 'haaski_magazine_postformat_function' );

}

?>
