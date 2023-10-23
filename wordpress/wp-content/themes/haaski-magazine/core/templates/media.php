<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_thumbnail_function')) {

	function haaski_magazine_thumbnail_function($id, $icon = false) {

		global $post;

		if ( '' != get_the_post_thumbnail() ) {

	?>

			<div class="pin-container">

				<?php

					the_post_thumbnail($id);

				?>

			</div>

	<?php

		}

	}

	add_action( 'savana_lite_thumbnail', 'haaski_magazine_thumbnail_function', 10, 2 );

}

?>
