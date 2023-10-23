<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( !is_home() ) : ?>

	<div id="breadcrumb_wrapper">

		<div class="container">

			<div class="row">

				<div class="col-md-11">

					<?php

						global $s;

						$delimiter = '<i class="fa fa-long-arrow-right"></i>';

						echo '<ul id="breadcrumb">';

						echo '<li><strong>' . esc_html__('You are here : ', 'haaski-magazine') . '</strong></li>';

						if ( !savana_lite_is_woocommerce_active('is_woocommerce') ) {

							echo '<li><a href="' . esc_url(home_url()) . '">' . esc_html__('Home','haaski-magazine') . '</a></li>' . $delimiter;

							if ( is_category() ) {

								echo '<li>' . savana_lite_get_archive_title() . '</li>';

							} elseif (is_single() && !is_attachment()) {

								echo '<li>';
								the_category(' , </li> <li>');
								echo '</li>' . $delimiter . '<li> ' . esc_html(get_the_title()) . '</li>';

							} elseif (is_page()) {

								echo '<li>' . esc_html(get_the_title()) . '</li>';

							} else if ( savana_lite_get_archive_title()) {

								echo '<li>' . savana_lite_get_archive_title() . '</li>';

							} else if ( is_search() ) {

								echo '<li>' . esc_html__( 'Search results for ', 'haaski-magazine' ) . esc_html($s) . '</li>';

							} else if ( is_404() ) {

								echo '<li>' . esc_html__( 'Page 404', 'haaski-magazine' ) . esc_html($s) . '</li>';

							} else if ( is_attachment() ) {

								echo '<li>' . esc_html__( 'Attachment: ', 'haaski-magazine' ) . esc_html(get_the_title()) . '</li>';

							}

						} else if ( savana_lite_is_woocommerce_active('is_woocommerce') ) {

							woocommerce_breadcrumb(

								array(
									'delimiter'   => $delimiter,
									'wrap_before' => '',
									'wrap_after'  => '',
									'before'      => '<li>',
									'after'       => '</li>',
								)

							);

						}

						echo '</ul>';

					?>

				</div>

				<?php

					if (
						savana_lite_is_woocommerce_active() &&
						savana_lite_setting('savana_lite_enable_woocommerce_header_cart', true) == true
					) :

				?>

						<div class="col-md-1">

							<?php echo savana_lite_header_cart(); ?>

						</div>

				<?php

					endif;

				?>

			</div>

		</div>

	</div>

<?php endif; ?>
