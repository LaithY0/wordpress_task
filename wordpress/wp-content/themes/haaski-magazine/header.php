<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2, user-scalable=yes" />

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php

if ( function_exists('wp_body_open') ) {
	wp_body_open();
}

?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'haaski-magazine' ); ?></a>

<?php do_action( 'savana_lite_mobile_menu' ); ?>

<div id="overlay-body"></div>

<div id="wrapper">

	<header id="header-wrapper" >

        <div id="header" class="header-menu-<?php echo esc_attr(savana_lite_setting('haaski_magazine_header_menu_layout','layout-1'));?>">

            <div class="container">

                <div class="row hd-flex">

                    <div class="hd-flex-col-2 col-md-4" >

                        <a class="mobile-navigation" href="#modal-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>

                        <button class="menu-toggle" aria-controls="mainmenu" aria-expanded="false" type="button">
                            <span aria-hidden="true"><?php esc_html_e( 'Menu', 'haaski-magazine' ); ?></span>
                            <span class="dashicons" aria-hidden="true"></span>
                        </button>

                        <nav id="primary-menu" class="header-menu" >

                            <?php

                                wp_nav_menu( array(
                                    'theme_location' => 'main-menu',
                                    'container' => 'false'
                                ));

                            ?>

                        </nav>

                    </div>

                    <div class="hd-flex-col-10 col-md-4" >

                        <div id="logo">

                            <?php

                                if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) {

                                    the_custom_logo();

                                } else {

                                    echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '">';

                                        echo esc_html(get_bloginfo('name'));
                                        echo '<span>'. esc_html(get_bloginfo('description')) . '</span>';

                                    echo '</a>';

                                }

                            ?>

                        </div>

                    </div>


                    <div class="header-menu-col col-md-4" >

                        <?php if ( has_nav_menu( 'secondary-menu' ) ) : ?>

                            <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false" type="button">
                                <span aria-hidden="true"><?php esc_html_e( 'Menu', 'haaski-magazine' ); ?></span>
                                <span class="dashicons" aria-hidden="true"></span>
                            </button>

                            <nav id="secondary-menu" class="header-menu" >

                                <?php

                                    wp_nav_menu( array(
                                        'theme_location' => 'secondary-menu',
                                        'container' => 'false'
                                    ));

                                ?>

                            </nav>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

	</header>
