<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_mobile_menu_function')) {

	function haaski_magazine_mobile_menu_function() {

?>

        <div id="sidebar-wrapper">

            <div id="scroll-sidebar" class="clearfix">

                <a class="mobile-navigation" href="#modal-sidebar">
                	<i class="fa fa-times open"></i>
                </a>

                <div class="wrap">

                    <div class="mobilemenu-box">

                        <nav id="mobilemenu" class="<?php echo esc_attr(savana_lite_setting('savana_lite_mobile_menu', 'mobile-menu-1'));?>">

							<?php

								wp_nav_menu(

									array(
										'theme_location' => 'main-menu',
										'container' => 'false'
									)

								);

								if ( has_nav_menu( 'secondary-menu' ) ) :

									wp_nav_menu(

										array(
											'theme_location' => 'secondary-menu',
											'container' => 'false'
										)

									);

								endif;

							?>

                        </nav>

                    </div>

				</div>

                <div class="sidebar-area">

                    <div class="post-article copyright-section">

                    	<?php do_action( 'savana_lite_socials' ); ?>

                    	<?php

							if ( savana_lite_setting('savana_lite_copyright_text')) :

								echo wp_filter_post_kses(savana_lite_setting('savana_lite_copyright_text'));

							else:

								esc_html_e('Copyright ', 'haaski-magazine');
								echo esc_html(get_bloginfo('name'));
								echo esc_html( date_i18n( __( ' Y', 'haaski-magazine' )));

							endif;

                    	?>

                    	<br/><a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank"><?php printf( esc_html__( 'Theme by %s', 'haaski-magazine' ), 'ThemeinProgress' ); ?></a>
                    	<br/><a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'haaski-magazine' ); ?>" rel="generator"><?php printf( esc_html__( 'Proudly powered by %s', 'haaski-magazine' ), 'WordPress' ); ?></a>

                    </div>

                </div>

            </div>

        </div>

<?php

	}

	add_action( 'savana_lite_mobile_menu', 'haaski_magazine_mobile_menu_function' );

}

?>
