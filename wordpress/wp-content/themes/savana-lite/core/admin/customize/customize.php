<?php

if (!function_exists('savana_lite_customize_panel_function')) {

	function savana_lite_customize_panel_function() {

		$theme_panel = array (

			/* START SUPPORT SECTION */

			array(

				'title' => esc_html__( 'Upgrade to Savana Pro','savana-lite'),
				'id' => 'savana-lite-customize-info',
				'type' => 'savana-lite-customize-info',
				'section' => 'savana-lite-customize-info',
				'priority' => '08',

			),

			/* COLORS */

			array(

				'label' => esc_html__('Logo text color','savana-lite'),
				'description' => esc_html__('Choose your custom color for the logo.','savana-lite'),
				'id' => 'savana_lite_logo_text_color',
				'type' => 'color',
				'section' => 'colors',
				'std' => '#ffffff',
			),

			/* START HEADER SECTION */

			array(

				'label' => esc_html__('Parallax Scrolling  (Scroll with Page)','savana-lite'),
				'description' => esc_html__('You can enable or disable the parallax scrolling of header image.','savana-lite'),
				'id' => 'savana_lite_header_attachment',
				'type' => 'select',
				'section' => 'header_image',
				'options' => array (
					'initial' => esc_html__( 'Disable','savana-lite'),
					'fixed' => esc_html__( 'Enable','savana-lite')
				),

				'std' => 'initial',

			),

			/* START GENERAL SECTION */

			array(

				'title' => esc_html__( 'Savana Lite Main Settings','savana-lite'),
				'description' => esc_html__( 'Savana Lite Main Settings','savana-lite'),
				'type' => 'panel',
				'id' => 'general_panel',
				'priority' => '10',

			),

			/* SKINS */

			array(

				'title' => esc_html__( 'Color Scheme','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the color scheme of Savana Lite.','savana-lite'),
				'type' => 'section',
				'panel' => 'general_panel',
				'priority' => '11',
				'id' => 'colorscheme_section',

			),

			array(

				'label' => esc_html__( 'Body Color Schemes','savana-lite'),
				'description' => esc_html__('Choose your body color scheme.','savana-lite'),
				'id' => 'savana_lite_skin',
				'type' => 'select',
				'section' => 'colorscheme_section',
				'options' => array (
				   'cyan' => esc_html__( 'Cyan','savana-lite'),
				   'orange' => esc_html__( 'Orange','savana-lite'),
				   'blue' => esc_html__( 'Blue','savana-lite'),
				   'red' => esc_html__( 'Red','savana-lite'),
				   'pink' => esc_html__( 'Pink','savana-lite'),
				   'purple' => esc_html__( 'Purple','savana-lite'),
				   'yellow' => esc_html__( 'Yellow','savana-lite'),
				   'green' => esc_html__( 'Green','savana-lite'),
				   'black' => esc_html__( 'Black','savana-lite'),
				   'clean-yellow' => esc_html__( 'Clean Yellow','savana-lite'),
				   'clean-red' => esc_html__( 'Clean Red','savana-lite'),
				   'clean-turquoise' => esc_html__( 'Clean Turquoise','savana-lite'),
				   'clean-green' => esc_html__( 'Clean Green','savana-lite'),
				   'clean-blue' => esc_html__( 'Clean Blue','savana-lite'),
				   'clean-pink' => esc_html__( 'Clean Pink','savana-lite'),
				),

				'std' => 'orange',

			),

			/* PAGE WIDTH */

			array(

				'title' => esc_html__( 'Page width','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the page width of Savana Lite.','savana-lite'),
				'type' => 'section',
				'id' => 'pagewidth_section',
				'panel' => 'general_panel',
				'priority' => '11',

			),

			array(

				'label' => esc_html__( 'Screen greater than 768px','savana-lite'),
				'description' => esc_html__( 'Set a width, for a screen greater than 768 pixel (for example 750 and not 750px ) ','savana-lite'),
				'id' => 'savana_lite_screen1',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '750',

			),

			array(

				'label' => esc_html__( 'Screen greater than 992px','savana-lite'),
				'description' => esc_html__( 'Set a width, for a screen greater than 992 pixel (for example 940 and not 940px ) ','savana-lite'),
				'id' => 'savana_lite_screen2',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			array(

				'label' => esc_html__( 'Screen greater than 1200px','savana-lite'),
				'description' => esc_html__( 'Set a width, in px, for a screen greater than 1200 pixel (for example 1170 and not 1170px ) ','savana-lite'),
				'id' => 'savana_lite_screen3',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			array(

				'label' => esc_html__( 'Screen greater than 1400px','savana-lite'),
				'description' => esc_html__( 'Set a width, in px, for a screen greater than 1400px pixel (for example 1370 and not 1370px ) ','savana-lite'),
				'id' => 'savana_lite_screen4',
				'type' => 'number',
				'section' => 'pagewidth_section',
				'std' => '940',

			),

			/* Mobile menu section */

			array(

				'title' => esc_html__( 'Mobile menu','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the settings of the mobile menu.','savana-lite'),
				'type' => 'section',
				'id' => 'mobile_menu_section',
				'panel' => 'general_panel',
				'priority' => '12',

			),

			array(

				'label' => esc_html__('Sub items','savana-lite'),
				'description' => esc_html__('How to open the sub items?','savana-lite'),
				'id' => 'savana_lite_mobile_menu',
				'type' => 'select',
				'section' => 'mobile_menu_section',
				'options' => array (
				   'mobile-menu-1' => esc_html__( 'Clicking on the down arrow','savana-lite'),
				   'mobile-menu-2' => esc_html__( 'Clicking on the whole link','savana-lite'),
				),
				'std' => 'mobile-menu-1',

			),

			/* General settings */

			array(

				'title' => esc_html__( 'General settings','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the general settings of Savana Lite.','savana-lite'),
				'type' => 'section',
				'id' => 'settings_section',
				'panel' => 'general_panel',
				'priority' => '13',

			),

			array(

				'label' => esc_html__( 'Enable the topbar','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the topbar?','savana-lite'),
				'id' => 'savana_lite_enable_topbar',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Enable the sticky header','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the sticky header?','savana-lite'),
				'id' => 'savana_lite_sticky_header',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(
				'label' => esc_html__( 'Enable the header search form','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the search form on header?','savana-lite'),
				'id' => 'savana_lite_enable_header_search_form',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,
			),

			array(

				'label' => esc_html__( 'Enable the breadcrumb','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the breadcrumb on whole website (except the homepage)?','savana-lite'),
				'id' => 'savana_lite_enable_breadcrumb',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'Category title','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the category title, under the black container?','savana-lite'),
				'id' => 'savana_lite_enable_category_title',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Searched item','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the searched item, under the black container?','savana-lite'),
				'id' => 'savana_lite_enable_searched_item',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Show categories','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the post categories?','savana-lite'),
				'id' => 'savana_lite_enable_post_category',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Show author','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the author name?','savana-lite'),
				'id' => 'savana_lite_enable_post_author',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Post author info box','savana-lite'),
				'description' => esc_html__( 'Do you want to display the post author info box below the content? (Important, the biographical info must be added from the user settings)','savana-lite'),
				'id' => 'savana_lite_enable_author_info_box',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'Show date','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the post date?','savana-lite'),
				'id' => 'savana_lite_enable_post_date',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Post Icon','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the post format icon at hover?','savana-lite'),
				'id' => 'savana_lite_enable_post_icon',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Post Format','savana-lite'),
				'description' => esc_html__( 'Do you want to use a different layout for the Aside, Link and Quote posts?','savana-lite'),
				'id' => 'savana_lite_enable_post_format_layout',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Read more','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the read more button?','savana-lite'),
				'id' => 'savana_lite_enable_readmore_button',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Back to top button','savana-lite'),
				'description' => esc_html__( 'Do you want to enable a button to back on the top of the site?','savana-lite'),
				'id' => 'savana_lite_enable_backtotop_button',
				'type' => 'checkbox',
				'section' => 'settings_section',
				'std' => true,

			),

			/* SLIDER SETTINGS */

			array(

				'title' => esc_html__( 'Slideshow settings','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the settings of homepage slideshow.','savana-lite'),
				'type' => 'section',
				'id' => 'slideshow_section',
				'panel' => 'general_panel',
				'priority' => '14',

			),

			array(

				'label' => esc_html__( 'Homepage slideshow','savana-lite'),
				'description' => esc_html__( 'Do you want to enable the slideshow on homepage?','savana-lite'),
				'id' => 'savana_lite_enable_homepage_slideshow',
				'type' => 'checkbox',
				'section' => 'slideshow_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'Caption Overlay','savana-lite'),
				'description' => esc_html__( 'Do you want to display the caption overlay on homepage slideshow?','savana-lite'),
				'id' => 'savana_lite_enable_slideshow_overlay',
				'type' => 'checkbox',
				'section' => 'slideshow_section',
				'std' => true,

			),

			array(

				'label' => esc_html__( 'Slideshow position','savana-lite'),
				'description' => esc_html__( 'Please select the position of slideshow on homepage.','savana-lite'),
				'id' => 'savana_lite_homepage_slideshow_position',
				'type' => 'select',
				'section' => 'slideshow_section',
				'options' => array (
				   'top' => esc_html__( 'Inside the top widget area (full width)','savana-lite'),
				   'header' => esc_html__( 'Inside the header widget area','savana-lite'),
				),

				'std' => 'top',

			),

			array(

				'label' => esc_html__( 'Limit','savana-lite'),
				'description' => esc_html__( 'How many items you want to display? (set -1 to load all items)','savana-lite'),
				'id' => 'savana_lite_slideshow_limit',
				'type' => 'slideshow_limit',
				'section' => 'slideshow_section',
				'std' => '5',

			),

			/* WooCommerce Settings SECTION */

			array(

				'title' => esc_html__( 'WooCommerce settings','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the settings of WooCommerce.','savana-lite'),
				'type' => 'section',
				'id' => 'woocommerce_section',
				'panel' => 'general_panel',
				'priority' => '15',

			),

			array(

				'label' => esc_html__('WooCommerce header cart','savana-lite'),
				'description' => esc_html__('Do you want to show the header cart?','savana-lite'),
				'id' => 'savana_lite_enable_woocommerce_header_cart',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => true,

			),

			array(

				'label' => esc_html__('WooCommerce header cart icon','savana-lite'),
				'description' => esc_html__('Select the icon for WooCommerce header cart (Please clear the cookies to display the new icon)','savana-lite'),
				'id' => 'savana_lite_woocommerce_header_icon',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'fa-shopping-basket' => esc_html__( 'Icon 1','savana-lite'),
				   'fa-shopping-cart' => esc_html__( 'Icon 2','savana-lite'),
				   'fa-cart-plus' => esc_html__( 'Icon 3','savana-lite'),
				),
				'std' => 'fa-shopping-basket',

			),

			array(

				'label' => esc_html__( 'Cross sell products','savana-lite'),
				'description' => esc_html__( 'Do you want to display the cross sell products on cart page?','savana-lite'),
				'id' => 'savana_lite_enable_woocommerce_cross_sell_cart',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'Related products','savana-lite'),
				'description' => esc_html__( 'Do you want to display the related products on product page?','savana-lite'),
				'id' => 'savana_lite_enable_woocommerce_related_products',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'Up sell products','savana-lite'),
				'description' => esc_html__( 'Do you want to display the up sell products on product page?','savana-lite'),
				'id' => 'savana_lite_enable_woocommerce_upsell_products',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			array(

				'label' => esc_html__( 'WooCommerce linkable product thumbnails','savana-lite'),
				'description' => esc_html__( 'Do you want to make linkable the product thumbnails on WooCommerce category pages?','savana-lite'),
				'id' => 'savana_lite_enable_woocommerce_linkable_product_thumbnails',
				'type' => 'checkbox',
				'section' => 'woocommerce_section',
				'std' => false,

			),

			array(

				'label' => esc_html__('WooCommerce Category Layout','savana-lite'),
				'description' => esc_html__('Select a layout for the woocommerce categories.','savana-lite'),
				'id' => 'savana_lite_woocommerce_category_layout',
				'type' => 'select',
				'section' => 'woocommerce_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','savana-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','savana-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','savana-lite'),
				),

				'std' => 'right-sidebar',

			),

			/* FEATURED LINKS */

			array(

				'title' => esc_html__( 'Savana Lite Featured Links','savana-lite'),
				'description' => esc_html__( 'Savana Lite Featured Links','savana-lite'),
				'type' => 'panel',
				'id' => 'featured_links_panel',
				'priority' => '10',

			),

			array(

				'title' => esc_html__( 'Featured Link Settings','savana-lite'),
				'description' => esc_html__('Featured Link #1','savana-lite'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '09',
				'id' => 'featured_links_settings',

			),

			array(

				'label' => esc_html__( 'Enable the featured links section','savana-lite'),
				'description' => esc_html__( 'Do you want to display the featured links section, below the homepage slideshow?','savana-lite'),
				'id' => 'savana_lite_enable_featuredlinks_section',
				'type' => 'checkbox',
				'section' => 'featured_links_settings',
				'std' => false,

			),

			/* #1 FEATURED LINK */

			array(

				'title' => esc_html__( 'Featured Link #1','savana-lite'),
				'description' => esc_html__('Featured Link #1','savana-lite'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_1',

			),

			array(

				'label' => esc_html__( 'Image','savana-lite'),
				'description' => esc_html__( 'Upload the image','savana-lite'),
				'id' => 'savana_lite_featured_link_1_image',
				'type' => 'upload',
				'section' => 'featured_link_1',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Title','savana-lite'),
				'description' => esc_html__( 'Insert the title of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_1_title',
				'type' => 'text',
				'section' => 'featured_link_1',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Url','savana-lite'),
				'description' => esc_html__( 'Insert the url of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_1_url',
				'type' => 'url',
				'section' => 'featured_link_1',
				'std' => '',

			),

			/* #2 FEATURED LINK */

			array(

				'title' => esc_html__( 'Featured Link #2','savana-lite'),
				'description' => esc_html__('Featured Link #2','savana-lite'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_2',

			),

			array(

				'label' => esc_html__( 'Image','savana-lite'),
				'description' => esc_html__( 'Upload the image','savana-lite'),
				'id' => 'savana_lite_featured_link_2_image',
				'type' => 'upload',
				'section' => 'featured_link_2',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Title','savana-lite'),
				'description' => esc_html__( 'Insert the title of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_2_title',
				'type' => 'text',
				'section' => 'featured_link_2',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Url','savana-lite'),
				'description' => esc_html__( 'Insert the url of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_2_url',
				'type' => 'url',
				'section' => 'featured_link_2',
				'std' => '',

			),

			/* #3 FEATURED LINK */

			array(

				'title' => esc_html__( 'Featured Link #3','savana-lite'),
				'description' => esc_html__('Featured Link #3','savana-lite'),
				'type' => 'section',
				'panel' => 'featured_links_panel',
				'priority' => '10',
				'id' => 'featured_link_3',

			),

			array(

				'label' => esc_html__( 'Image','savana-lite'),
				'description' => esc_html__( 'Upload the image','savana-lite'),
				'id' => 'savana_lite_featured_link_3_image',
				'type' => 'upload',
				'section' => 'featured_link_3',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Title','savana-lite'),
				'description' => esc_html__( 'Insert the title of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_3_title',
				'type' => 'text',
				'section' => 'featured_link_3',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Url','savana-lite'),
				'description' => esc_html__( 'Insert the url of this slide','savana-lite'),
				'id' => 'savana_lite_featured_link_3_url',
				'type' => 'url',
				'section' => 'featured_link_3',
				'std' => '',

			),

			/* LAYOUTS SECTION */

			array(

				'title' => esc_html__( 'Layouts','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the layouts of Savana Lite.','savana-lite'),
				'type' => 'section',
				'id' => 'layouts_section',
				'panel' => 'general_panel',
				'priority' => '16',

			),

			array(

				'label' => esc_html__('Home Blog Layout','savana-lite'),
				'description' => esc_html__('If you&#39;ve set the latest articles, for the homepage, choose a layout.','savana-lite'),
				'id' => 'savana_lite_home_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','savana-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','savana-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','savana-lite'),
				   'col-md-4' => esc_html__( 'Masonry','savana-lite'),
				),

				'std' => 'col-md-4',

			),

			array(

				'label' => esc_html__('Category Layout','savana-lite'),
				'description' => esc_html__('Select a layout for category pages.','savana-lite'),
				'id' => 'savana_lite_category_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','savana-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','savana-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','savana-lite'),
				   'col-md-4' => esc_html__( 'Masonry','savana-lite'),
				),

				'std' => 'col-md-4',

			),

			array(

				'label' => esc_html__('Search Layout','savana-lite'),
				'description' => esc_html__('Select a layout for the search section.','savana-lite'),
				'id' => 'savana_lite_search_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
				   'full' => esc_html__( 'Full Width','savana-lite'),
				   'left-sidebar' => esc_html__( 'Left Sidebar','savana-lite'),
				   'right-sidebar' => esc_html__( 'Right Sidebar','savana-lite'),
				   'col-md-4' => esc_html__( 'Masonry','savana-lite'),
				),

				'std' => 'col-md-4',

			),

			array(

				'label' => esc_html__('Read More Layout','savana-lite'),
				'description' => esc_html__('Select a layout for the read more button.','savana-lite'),
				'id' => 'savana_lite_readmore_layout',
				'type' => 'select',
				'section' => 'layouts_section',
				'options' => array (
					'default' => esc_html__( 'Default Button','savana-lite'),
					'nobutton' => esc_html__( 'Replace with => [...]','savana-lite'),
				),

				'std' => 'default',

			),

			/* FOOTER AREA SECTION */

			array(

				'title' => esc_html__( 'Social Links and Footer','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the social icons and the copyright text.','savana-lite'),
				'type' => 'section',
				'id' => 'footer_section',
				'panel' => 'general_panel',
				'priority' => '17',

			),

			array(

				'label' => esc_html__( 'Copyright Text','savana-lite'),
				'description' => esc_html__( 'Insert your copyright text.','savana-lite'),
				'id' => 'savana_lite_copyright_text',
				'type' => 'textarea',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Facebook Url','savana-lite'),
				'description' => esc_html__( 'Insert Facebook Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_facebook_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Twitter Url','savana-lite'),
				'description' => esc_html__( 'Insert Twitter Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_twitter_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Flickr Url','savana-lite'),
				'description' => esc_html__( 'Insert Flickr Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_flickr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Linkedin Url','savana-lite'),
				'description' => esc_html__( 'Insert Linkedin Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_linkedin_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Slack Url','savana-lite'),
				'description' => esc_html__( 'Insert Slack Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_slack_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Pinterest Url','savana-lite'),
				'description' => esc_html__( 'Insert Pinterest Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_pinterest_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Tumblr Url','savana-lite'),
				'description' => esc_html__( 'Insert Tumblr Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_tumblr_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Soundcloud Url','savana-lite'),
				'description' => esc_html__( 'Insert Soundcloud Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_soundcloud_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Spotify Url','savana-lite'),
				'description' => esc_html__( 'Insert Spotify Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_spotify_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Youtube Url','savana-lite'),
				'description' => esc_html__( 'Insert Youtube Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_youtube_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Vimeo Url','savana-lite'),
				'description' => esc_html__( 'Insert Vimeo Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_vimeo_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'VK Url','savana-lite'),
				'description' => esc_html__( 'Insert VK Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_vk_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Instagram Url','savana-lite'),
				'description' => esc_html__( 'Insert Instagram Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_instagram_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Deviantart Url','savana-lite'),
				'description' => esc_html__( 'Insert Deviantart Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_deviantart_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Github Url','savana-lite'),
				'description' => esc_html__( 'Insert Github Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_github_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Xing Url','savana-lite'),
				'description' => esc_html__( 'Insert Xing Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_xing_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Dribbble Url','savana-lite'),
				'description' => esc_html__( 'Insert Dribbble Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_dribbble_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Dropbox Url','savana-lite'),
				'description' => esc_html__( 'Insert Dropbox Url (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_dropbox_button',
				'type' => 'url',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Whatsapp Number','savana-lite'),
				'description' => esc_html__( 'Insert Whatsapp number (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_whatsapp_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Telegram Account','savana-lite'),
				'description' => esc_html__( 'Insert Telegram Account (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_telegram_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Trello Account','savana-lite'),
				'description' => esc_html__( 'Insert Trello Account (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_trello_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Twitch Account','savana-lite'),
				'description' => esc_html__( 'Insert Twitch Account (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_twitch_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Tripadvisor Account','savana-lite'),
				'description' => esc_html__( 'Insert Tripadvisor Account (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_tripadvisor_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Vine Account','savana-lite'),
				'description' => esc_html__( 'Insert Vine Account (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_vine_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Skype Url','savana-lite'),
				'description' => esc_html__( 'Insert Skype ID (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_skype_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Skype Url','savana-lite'),
				'description' => esc_html__( 'Insert Skype ID (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_skype_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Email Address','savana-lite'),
				'description' => esc_html__( 'Insert Email Address (leave empty if you want to hide the button)','savana-lite'),
				'id' => 'savana_lite_footer_email_button',
				'type' => 'button',
				'section' => 'footer_section',
				'std' => '',

			),

			array(

				'label' => esc_html__( 'Feed Rss Button','savana-lite'),
				'description' => esc_html__( 'Do you want to display the Feed Rss button?','savana-lite'),
				'id' => 'savana_lite_footer_rss_button',
				'type' => 'select',
				'section' => 'footer_section',
				'options' => array (
				   'off' => esc_html__( 'No','savana-lite'),
				   'on' => esc_html__( 'Yes','savana-lite'),
				),

				'std' => 'off',

			),

			/* TYPOGRAPHY SECTION */

			array(

				'title' => esc_html__( 'Savana Lite Typography','savana-lite'),
				'description' => esc_html__( 'Savana Lite Typography','savana-lite'),
				'type' => 'panel',
				'id' => 'typography_panel',
				'priority' => '11',

			),

			/* LOGO */

			array(

				'title' => esc_html__( 'Logo','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the logo.','savana-lite'),
				'type' => 'section',
				'id' => 'logo_section',
				'panel' => 'typography_panel',
				'priority' => '10',

			),

			array(

				'label' => esc_html__( 'Font size','savana-lite'),
				'description' => esc_html__( 'Insert a size, for logo font (For example, 60px) ','savana-lite'),
				'id' => 'savana_lite_logo_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '70px',

			),

			array(

				'label' => esc_html__( 'Description font size','savana-lite'),
				'description' => esc_html__( 'Insert a size, for logo description (For example, 14px) ','savana-lite'),
				'id' => 'savana_lite_logo_description_font_size',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '14px',

			),

			array(

				'label' => esc_html__( 'Description top margin','savana-lite'),
				'description' => esc_html__( 'Add a space between the logo and the description (For example, 15px) ','savana-lite'),
				'id' => 'savana_lite_logo_description_top_margin',
				'type' => 'pixel_size',
				'section' => 'logo_section',
				'std' => '5px',

			),

			array(

				'label' => esc_html__('Weight','savana-lite'),
				'description' => esc_html__('Choose a font weight for the logo.','savana-lite'),
				'id' => 'savana_lite_logo_font_weight',
				'type' => 'select',
				'section' => 'logo_section',
				'options' => array(
					'100' => esc_html__( '100','savana-lite'),
					'200' => esc_html__( '200','savana-lite'),
					'300' => esc_html__( '300','savana-lite'),
					'400' => esc_html__( '400','savana-lite'),
					'500' => esc_html__( '500','savana-lite'),
					'600' => esc_html__( '600','savana-lite'),
					'700' => esc_html__( '700','savana-lite'),
					'800' => esc_html__( '800','savana-lite'),
					'900' => esc_html__( '900','savana-lite'),
				),

				'std' => '500',

			),

			array(

				'label' => esc_html__('Text transform','savana-lite'),
				'description' => esc_html__('Do you want to display an uppercase logo?.','savana-lite'),
				'id' => 'savana_lite_logo_text_transform',
				'type' => 'select',
				'section' => 'logo_section',
				'options' => array(
					'none' => esc_html__( 'None','savana-lite'),
					'uppercase' => esc_html__( 'Uppercase','savana-lite'),
				),

				'std' => 'uppercase',

			),

			/* TOPMENU */

			array(

				'title' => esc_html__( 'Top Menu','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the top menu.','savana-lite'),
				'type' => 'section',
				'id' => 'topmenu_section',
				'panel' => 'typography_panel',
				'priority' => '11',

			),

			array(

				'label' => esc_html__( 'Font size','savana-lite'),
				'description' => esc_html__( 'Insert a size, for top menu font (For example, 12px) ','savana-lite'),
				'id' => 'savana_lite_topmenu_font_size',
				'type' => 'pixel_size',
				'section' => 'topmenu_section',
				'std' => '12px',

			),

			array(

				'label' => esc_html__('Menu weight','savana-lite'),
				'description' => esc_html__('Choose a font weight for the top menu.','savana-lite'),
				'id' => 'savana_lite_topmenu_font_weight',
				'type' => 'select',
				'section' => 'topmenu_section',
				'options' => array(
					'100' => esc_html__( '100','savana-lite'),
					'200' => esc_html__( '200','savana-lite'),
					'300' => esc_html__( '300','savana-lite'),
					'400' => esc_html__( '400','savana-lite'),
					'500' => esc_html__( '500','savana-lite'),
					'600' => esc_html__( '600','savana-lite'),
					'700' => esc_html__( '700','savana-lite'),
					'800' => esc_html__( '800','savana-lite'),
					'900' => esc_html__( '900','savana-lite'),
				),

				'std' => '600',

			),

			array(

				'label' => esc_html__('Text transform','savana-lite'),
				'description' => esc_html__('Do you want to display an uppercase top menu?.','savana-lite'),
				'id' => 'savana_lite_topmenu_text_transform',
				'type' => 'select',
				'section' => 'topmenu_section',
				'options' => array(
					'none' => esc_html__( 'None','savana-lite'),
					'uppercase' => esc_html__( 'Uppercase','savana-lite'),
				),

				'std' => 'uppercase',

			),

			/* MENU */

			array(

				'title' => esc_html__( 'Menu','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the menu.','savana-lite'),
				'type' => 'section',
				'id' => 'menu_section',
				'panel' => 'typography_panel',
				'priority' => '11',

			),

			array(

				'label' => esc_html__( 'Font size','savana-lite'),
				'description' => esc_html__( 'Insert a size, for menu font (For example, 14px) ','savana-lite'),
				'id' => 'savana_lite_menu_font_size',
				'type' => 'pixel_size',
				'section' => 'menu_section',
				'std' => '14px',

			),

			array(

				'label' => esc_html__('Menu weight','savana-lite'),
				'description' => esc_html__('Choose a font weight for the menu.','savana-lite'),
				'id' => 'savana_lite_menu_font_weight',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'100' => esc_html__( '100','savana-lite'),
					'200' => esc_html__( '200','savana-lite'),
					'300' => esc_html__( '300','savana-lite'),
					'400' => esc_html__( '400','savana-lite'),
					'500' => esc_html__( '500','savana-lite'),
					'600' => esc_html__( '600','savana-lite'),
					'700' => esc_html__( '700','savana-lite'),
					'800' => esc_html__( '800','savana-lite'),
					'900' => esc_html__( '900','savana-lite'),
				),

				'std' => '600',

			),

			array(

				'label' => esc_html__('Text transform','savana-lite'),
				'description' => esc_html__('Do you want to display an uppercase menu?.','savana-lite'),
				'id' => 'savana_lite_menu_text_transform',
				'type' => 'select',
				'section' => 'menu_section',
				'options' => array(
					'none' => esc_html__( 'None','savana-lite'),
					'uppercase' => esc_html__( 'Uppercase','savana-lite'),
				),

				'std' => 'uppercase',

			),

			/* CONTENT */

			array(

				'title' => esc_html__( 'Content','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the content.','savana-lite'),
				'type' => 'section',
				'id' => 'content_section',
				'panel' => 'typography_panel',
				'priority' => '12',

			),

			array(

				'label' => esc_html__( 'Font size','savana-lite'),
				'description' => esc_html__( 'Insert a size, for content font (For example, 14px) ','savana-lite'),
				'id' => 'savana_lite_content_font_size',
				'type' => 'pixel_size',
				'section' => 'content_section',
				'std' => '14px',

			),


			/* HEADLINES */

			array(

				'title' => esc_html__( 'Headlines','savana-lite'),
				'description' => esc_html__( 'From this section you can manage the typography of the headlines.','savana-lite'),
				'type' => 'section',
				'id' => 'headlines_section',
				'panel' => 'typography_panel',
				'priority' => '13',

			),

			array(

				'label' => esc_html__( 'H1 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H1 elements (For example, 24px) ','savana-lite'),
				'id' => 'savana_lite_h1_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '24px',

			),

			array(

				'label' => esc_html__( 'H2 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H2 elements (For example, 22px) ','savana-lite'),
				'id' => 'savana_lite_h2_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '22px',

			),

			array(

				'label' => esc_html__( 'H3 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H3 elements (For example, 20px) ','savana-lite'),
				'id' => 'savana_lite_h3_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '20px',

			),

			array(

				'label' => esc_html__( 'H4 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H4 elements (For example, 18px) ','savana-lite'),
				'id' => 'savana_lite_h4_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '18px',

			),

			array(

				'label' => esc_html__( 'H5 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H5 elements (For example, 16px) ','savana-lite'),
				'id' => 'savana_lite_h5_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '16px',

			),

			array(

				'label' => esc_html__( 'H6 headline','savana-lite'),
				'description' => esc_html__( 'Insert a size, for for H6 elements (For example, 14px) ','savana-lite'),
				'id' => 'savana_lite_h6_font_size',
				'type' => 'pixel_size',
				'section' => 'headlines_section',
				'std' => '14px',

			),

			array(

				'label' => esc_html__('Titles weight','savana-lite'),
				'description' => esc_html__('Choose a font weight for the titles.','savana-lite'),
				'id' => 'savana_lite_titles_font_weight',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'100' => esc_html__( '100','savana-lite'),
					'200' => esc_html__( '200','savana-lite'),
					'300' => esc_html__( '300','savana-lite'),
					'400' => esc_html__( '400','savana-lite'),
					'500' => esc_html__( '500','savana-lite'),
					'600' => esc_html__( '600','savana-lite'),
					'700' => esc_html__( '700','savana-lite'),
					'800' => esc_html__( '800','savana-lite'),
					'900' => esc_html__( '900','savana-lite'),
				),

				'std' => '600',

			),

			array(

				'label' => esc_html__('Text transform','savana-lite'),
				'description' => esc_html__('Do you want to display an uppercase title?.','savana-lite'),
				'id' => 'savana_lite_titles_text_transform',
				'type' => 'select',
				'section' => 'headlines_section',
				'options' => array(
					'none' => esc_html__( 'None','savana-lite'),
					'uppercase' => esc_html__( 'Uppercase','savana-lite'),
				),

				'std' => 'none',

			),

		);

		new savana_lite_customize($theme_panel);

	}

	add_action( 'savana_lite_customize_panel', 'savana_lite_customize_panel_function' );

}

do_action('savana_lite_customize_panel');

?>
