<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */


if ( savana_lite_setting('savana_lite_enable_featuredlinks_section') == true ) :

	echo '<div class="featured-links-section">';

		echo '<div class="container featured-links-wrapper">';

			echo '<div class="row">';

				echo '<div class="col-md-12">';

						echo haaski_magazine_get_featured_links();

				echo '</div>';

			echo '</div>';

		echo '</div>';

	echo '</div>';

endif;

?>
