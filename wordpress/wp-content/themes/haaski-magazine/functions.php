<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueu scripts */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_enqueue_scripts')) {

	function haaski_magazine_enqueue_scripts() {

		wp_enqueue_style(
			'owl.carousel',
			get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css',
			array(), '2.3.4'
		);

		wp_enqueue_style(
			'owl.theme.default',
			get_stylesheet_directory_uri() . '/assets/css/owl.theme.default.css',
			array(), '2.3.4'
		);

		wp_enqueue_style(
			'haaski-magazine-owl-theme',
			get_stylesheet_directory_uri() . '/assets/css/haaski.lite.owl.theme.css',
			array(), '1.0.0'
		);

		wp_enqueue_script(
			'owl.carousel',
			get_stylesheet_directory_uri() . '/assets/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_deregister_style( 'google-fonts' );
		wp_deregister_style( 'savana-lite-style' );
		wp_deregister_style( 'savana-lite-' . esc_attr(get_theme_mod('savana_lite_skin', 'orange')) );

		wp_enqueue_style( 'haaski-magazine-parent-style' , get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'haaski-magazine-style' , get_stylesheet_directory_uri() . '/style.css' );

		wp_enqueue_style(
			'haaski-magazine-' . esc_attr(get_theme_mod('savana_lite_skin', 'orange')),
			get_stylesheet_directory_uri() . '/assets/skins/' . esc_attr(get_theme_mod('savana_lite_skin', 'orange')) . '.css',
			array( 'haaski-magazine-style' ),
			'1.0.0'
		);

		wp_enqueue_script(
			'haaski-magazine-script',
			get_stylesheet_directory_uri() . '/assets/js/script.js',
			array('jquery'),
			'1.0.0',
			TRUE
		);

		$googleFontsArgs = array(
			'family' =>    str_replace('|', '%7C', haaski_magazine_google_font_args()),
			'subset' =>    'latin,latin-ext'
		);

		wp_enqueue_style('google-fonts', add_query_arg ( $googleFontsArgs, "https://fonts.googleapis.com/css" ), array(), '1.0.0' );

	}

	add_action( 'wp_enqueue_scripts', 'haaski_magazine_enqueue_scripts', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Replace hooks */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_replace_hooks')) {

	function haaski_magazine_replace_hooks() {

		remove_action( 'savana_lite_mobile_menu', 'savana_lite_mobile_menu_function' );
		remove_action( 'savana_lite_slick_slider', 'savana_lite_slick_slider_function');
		remove_action( 'savana_lite_thumbnail', 'savana_lite_thumbnail_function', 10, 2 );
		remove_action( 'savana_lite_before_content', 'savana_lite_before_content_function' );
		remove_action( 'savana_lite_archive_title', 'savana_lite_archive_title_function' );
		remove_action( 'savana_lite_searched_item', 'savana_lite_searched_item_function' );
		remove_action( 'savana_lite_postformat', 'savana_lite_postformat_function' );

	}

	add_action('init','haaski_magazine_replace_hooks');

}

/*-----------------------------------------------------------------------------------*/
/* Theme setup */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_theme_setup')) {

	function haaski_magazine_theme_setup() {

		remove_theme_support('custom-header');
		unregister_nav_menu( 'top-menu' );
		register_nav_menu( 'secondary-menu', esc_attr__( 'Secondary Menu', 'haaski-magazine' ) );

		load_child_theme_textdomain( 'haaski-magazine', get_stylesheet_directory() . '/languages' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/functions/function-style.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/functions/google-fonts.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/post/related-post.php' );

		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/post-formats.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/before-content.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/related-posts.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/featured-posts.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/mobile-menu.php' );
		require_once( trailingslashit( get_stylesheet_directory() ) . 'core/templates/media.php' );

		if ( !get_theme_mod('savana_lite_logo_text_color') )
			set_theme_mod( 'savana_lite_logo_text_color', '#616161' );

		if ( !get_theme_mod('savana_lite_logo_font_size') )
			set_theme_mod( 'savana_lite_logo_font_size', '40px' );

		if ( !get_theme_mod('savana_lite_logo_description_top_margin') )
			set_theme_mod( 'savana_lite_logo_description_top_margin', '10px' );

		if ( !get_theme_mod('savana_lite_screen3') )
			set_theme_mod( 'savana_lite_screen3', '1170' );

		if ( !get_theme_mod('savana_lite_screen4') )
			set_theme_mod( 'savana_lite_screen4', '1370' );

	}

	add_action( 'after_setup_theme', 'haaski_magazine_theme_setup', 999);

}

/*-----------------------------------------------------------------------------------*/
/* Customize register */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_customize_register')) {

	function haaski_magazine_customize_register( $wp_customize ) {

		$wp_customize->remove_section('slideshow_section');
		$wp_customize->remove_section('topmenu_section');
		$wp_customize->remove_control('savana_lite_enable_slideshow_overlay');
		$wp_customize->remove_control('savana_lite_enable_topbar');
		$wp_customize->remove_control('savana_lite_sticky_header');
		$wp_customize->remove_control('savana_lite_enable_header_search_form');
		$wp_customize->remove_control('savana_lite_enable_breadcrumb');
		$wp_customize->remove_control('savana_lite_enable_category_title');
		$wp_customize->remove_control('savana_lite_enable_searched_item');

		/* Slideshow section
		   ========================================================================== */

		$wp_customize->add_section('haaski_magazine_post_slideshow_section', array(
			'title' => esc_html__( 'Haaski Magazine Post Slideshow', 'haaski-magazine' ),
			'description' => esc_html__( 'Haaski Magazine Post Slideshow', 'haaski-magazine' ),
			'priority' => 12,

		));

		/**
		 * Slideshow section > Slideshow layout option
		 */

		$wp_customize->add_setting( 'haaski_magazine_post_slideshow_layout', array(
			'default' => 'layout-1',
			'sanitize_callback' => 'haaski_magazine_select_sanitize',
		));

		$wp_customize->add_control( 'haaski_magazine_post_slideshow_layout' , array(
			'priority' => 9,
			'type' => 'select',
			'section' => 'haaski_magazine_post_slideshow_section',
			'label' => esc_html__('Grid layout','haaski-magazine'),
			'description' => esc_html__('Please select one of available layouts for the desktop devices.','haaski-magazine'),
			'choices'  => array (
			   'disable' => esc_html__( 'Disable','haaski-magazine'),
			   'layout-1' => esc_html__( 'Layout 1','haaski-magazine'),
			   'layout-2' => esc_html__( 'Layout 2','haaski-magazine'),
			   'layout-3' => esc_html__( 'Layout 3','haaski-magazine'),
				 'layout-4' => esc_html__( 'Layout 4','haaski-magazine'),
				 'layout-5' => esc_html__( 'Layout 5','haaski-magazine'),
				 'layout-6' => esc_html__( 'Layout 6','haaski-magazine'),
				 'layout-7' => esc_html__( 'Layout 7','haaski-magazine'),
			),
		));

		/**
		 * Slideshow section > Featured posts items option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_posts_items', array(
			'default' => '3',
			'sanitize_callback' => 'haaski_magazine_select_sanitize',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_posts_items' , array(
			'priority' => 9,
			'type' => 'select',
			'section' => 'haaski_magazine_post_slideshow_section',
			'label' => esc_html__('Slideshow items','haaski-magazine'),
			'description' => esc_html__('Please note that, since it is a post grid, each slide contains 6 articles.','haaski-magazine'),
			'choices'  => array (
			   '1' => esc_html__( '1 slide with 6 posts','haaski-magazine'),
			   '2' => esc_html__( '2 slide with 12 posts','haaski-magazine'),
			   '3' => esc_html__( '3 slide with 18 posts','haaski-magazine'),
			   '4' => esc_html__( '4 slide with 24 posts','haaski-magazine'),
			   '5' => esc_html__( '5 slide with 30 posts','haaski-magazine'),
			),
		));

		/**
		 * Slideshow section > Slideshow dots option
		 */

		$wp_customize->add_setting( 'haaski_magazine_slideshow_dots', array(
			'default' => true,
			'sanitize_callback' => 'haaski_magazine_checkbox_sanize',
			'transport'  => 'refresh'
		));

		$wp_customize->add_control( 'haaski_magazine_slideshow_dots', array(
			'label' => esc_html__( 'Show Dots','haaski-magazine'),
			'section' => 'haaski_magazine_post_slideshow_section',
			'type' => 'checkbox',
		));

		/**
		 * Main settins panel > General settings section > Related posts option
		 */

		$wp_customize->add_setting( 'haaski_magazine_enable_related_posts', array(
			'default' => 'on',
			'sanitize_callback' => 'haaski_magazine_checkbox_sanize',
		));

		$wp_customize->add_control( 'haaski_magazine_enable_related_posts' , array(
			'type' => 'checkbox',
			'section' => 'settings_section',
			'label' => esc_html__('Related posts','haaski-magazine'),
			'description' => esc_html__('Do you want to display the related posts at the end of each article?','haaski-magazine'),
		));

		/**
		 * Main settins panel > Layouts section > Header menu layout option
		 */

		$wp_customize->add_setting( 'haaski_magazine_header_menu_layout', array(
			'default' => 'layout-1',
			'sanitize_callback' => 'haaski_magazine_select_sanitize',
		));

		$wp_customize->add_control( 'haaski_magazine_header_menu_layout' , array(
			'priority' => 9,
			'type' => 'select',
			'section' => 'layouts_section',
			'label' => esc_html__('Header menu layout','haaski-magazine'),
			'description' => esc_html__('Please select one of available layout for the header menu.','haaski-magazine'),
			'choices'  => array (
			   'layout-1' => esc_html__( 'Layout 1','haaski-magazine'),
			   'layout-2' => esc_html__( 'Layout 2','haaski-magazine'),
			),
		));

		/* Typography panel > Google Fonts section
		========================================================================== */

		$wp_customize->add_section( 'haaski_magazine_fonts', array(
			'title' => esc_html__( 'Google Fonts','haaski-magazine'),
			'panel' => 'typography_panel',
			'priority' => 9,
			'description' => esc_html__('From this section you can select one of the 17 Google Fonts included with Haaski Magazine','haaski-magazine'),
		));

		/**
		 * Typography panel > Google Fonts section > Site font option
		 */

		$wp_customize->add_setting( 'haaski_magazine_body_font_family', array(
			'default' => 'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic',
			'sanitize_callback' => 'haaski_magazine_select_sanitize',
		));

		$wp_customize->add_control( 'haaski_magazine_body_font_family' , array(
			'priority' => 9,
			'type' => 'select',
			'section' => 'haaski_magazine_fonts',
			'label' => esc_html__('Site font','haaski-magazine'),
			'description' => esc_html__('Choose the font for your website.','haaski-magazine'),
			'choices' => haaski_magazine_google_fonts(),
		));

		/* Featured links panel > Featured Link #4 section
		========================================================================== */

		$wp_customize->add_section( 'haaski_magazine_featured_link_4', array(
			'title' => esc_html__( 'Featured Link #4','haaski-magazine'),
			'panel' => 'featured_links_panel',
			'priority' => 10,
			'description' => esc_html__('Featured Link #4','haaski-magazine'),
		));

		/**
		 * Featured links panel > Featured Link #4 section > Image option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_4_image', array(
			'default' => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, 'haaski_magazine_featured_link_4_image', array(
			'label' => esc_html__( 'Image','haaski-magazine'),
			'mime_type' => 'image',
			'description' => esc_html__( 'Upload the image','haaski-magazine'),
			'section' => 'haaski_magazine_featured_link_4',
			'settings' => 'haaski_magazine_featured_link_4_image',
			'width' => 940,
			'height' => 627,
		)));

		/**
		 * Featured links panel > Featured Link #4 section > Title option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_4_title', array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_4_title' , array(
			'type' => 'text',
			'section' => 'haaski_magazine_featured_link_4',
			'label' => esc_html__('Title','haaski-magazine'),
			'description' => esc_html__('Insert the title of this slide','haaski-magazine'),
		));

		/**
		 * Featured links panel > Featured Link #4 section > URL option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_4_url', array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_4_url' , array(
			'type' => 'url',
			'section' => 'haaski_magazine_featured_link_4',
			'label' => esc_html__('Url','haaski-magazine'),
			'description' => esc_html__('Insert the url of this slide','haaski-magazine'),
		));

		/* Featured links panel > Featured Link #5 section
		========================================================================== */

		$wp_customize->add_section( 'haaski_magazine_featured_link_5', array(
		    'title' => esc_html__( 'Featured Link #5', 'haaski-magazine' ),
		    'panel' => 'featured_links_panel',
		    'description' => esc_html__( 'Featured Link #5', 'haaski-magazine' ),
		));

		/**
		 * Featured links panel > Featured Link #5 section > Image option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_5_image', array(
		    'default' => '',
		    'capability' => 'edit_theme_options',
		    'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'haaski_magazine_featured_link_5_image', array(
		    'label' => esc_html__( 'Image', 'haaski-magazine' ),
		    'mime_type' => 'image',
		    'description' => esc_html__( 'Upload the image', 'haaski-magazine' ),
		    'section' => 'haaski_magazine_featured_link_5',
		    'settings' => 'haaski_magazine_featured_link_5_image',
		    'width' => 940,
		    'height' => 627,
		)));

		/**
		 * Featured links panel > Featured Link #5 section > Title option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_5_title', array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_5_title', array(
		    'type' => 'text',
		    'section' => 'haaski_magazine_featured_link_5',
		    'label' => esc_html__( 'Title', 'haaski-magazine' ),
		    'description' => esc_html__( 'Insert the title of this slide', 'haaski-magazine' ),
		));

		/**
		 * Featured links panel > Featured Link #5 section > URL option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_5_url', array(
		    'default' => '',
		    'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_5_url', array(
		    'type' => 'url',
		    'section' => 'haaski_magazine_featured_link_5',
		    'label' => esc_html__( 'Url', 'haaski-magazine' ),
		    'description' => esc_html__( 'Insert the url of this slide', 'haaski-magazine' ),
		));

		/* Featured links panel > Featured Link #6 section
		========================================================================== */

		$wp_customize->add_section( 'haaski_magazine_featured_link_6', array(
		    'title' => esc_html__( 'Featured Link #6', 'haaski-magazine' ),
		    'panel' => 'featured_links_panel',
		    'description' => esc_html__( 'Featured Link #6', 'haaski-magazine' ),
		));

		/**
		 * Featured links panel > Featured Link #6 section > Image option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_6_image', array(
		    'default' => '',
		    'capability' => 'edit_theme_options',
		    'sanitize_callback' => 'absint'
		));

		$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'haaski_magazine_featured_link_6_image', array(
		    'label' => esc_html__( 'Image', 'haaski-magazine' ),
		    'mime_type' => 'image',
		    'description' => esc_html__( 'Upload the image', 'haaski-magazine' ),
		    'section' => 'haaski_magazine_featured_link_6',
		    'settings' => 'haaski_magazine_featured_link_6_image',
		    'width' => 940,
		    'height' => 627,
		)));

		/**
		 * Featured links panel > Featured Link #6 section > Title option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_6_title', array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_text_field',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_6_title', array(
		    'type' => 'text',
		    'section' => 'haaski_magazine_featured_link_6',
		    'label' => esc_html__( 'Title', 'haaski-magazine' ),
		    'description' => esc_html__( 'Insert the title of this slide', 'haaski-magazine' ),
		));

		/**
		 * Featured links panel > Featured Link #6 section > URL option
		 */

		$wp_customize->add_setting( 'haaski_magazine_featured_link_6_url', array(
		    'default' => '',
		    'sanitize_callback' => 'esc_url_raw',
		));

		$wp_customize->add_control( 'haaski_magazine_featured_link_6_url', array(
		    'type' => 'url',
		    'section' => 'haaski_magazine_featured_link_6',
		    'label' => esc_html__( 'Url', 'haaski-magazine' ),
		    'description' => esc_html__( 'Insert the url of this slide', 'haaski-magazine' ),
		));


		function haaski_magazine_select_sanitize ($value, $setting) {

			global $wp_customize;

			$control = $wp_customize->get_control( $setting->id );

			if ( array_key_exists( $value, $control->choices ) ) {

				return $value;

			} else {

				return $setting->default;

			}

		}

		function haaski_magazine_checkbox_sanize ($input) {

			return $input ? true : false;

		}

	}

	add_action( 'customize_register', 'haaski_magazine_customize_register', 11 );

}

/*-----------------------------------------------------------------------------------*/
/* POST ICON */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_posticon')) {

	function haaski_magazine_posticon() {

		$html = '';

		$icons = array (
			'video' => 'fa fa-play' ,
			'gallery' => 'fa fa-camera' ,
			'audio' => 'fa fa-volume-up' ,
			'chat' => 'fa fa-users',
			'status' => 'fa fa-keyboard-o',
			'image' => 'fa fa-picture-o' ,
			'quote' => 'fa fa-quote-left',
			'link' => 'fa fa-external-link',
			'aside' => 'fa fa-file-text-o',
		);

		if ( get_post_format() ) {

			$html .= '<i class="'.esc_attr($icons[get_post_format()]).'"></i> ';
			$html .= ucfirst( strtolower( esc_html(get_post_format()) ));

		} else {

			$html .= '<i class="fa fa-pencil-square-o"></i> ';
			$html .= esc_html__( 'Article','haaski-magazine');

		}

		return $html;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Get posts on slideshow */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_get_posts_on_slideshow')) {

	function haaski_magazine_get_posts_on_slideshow() {

		return intval(savana_lite_setting('haaski_magazine_featured_posts_items', 3)) * 6;

	}

}

/*-----------------------------------------------------------------------------------*/
/* Exclude featured posts on homepage */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_exclude_featured_posts_on_home')) {

	function haaski_magazine_exclude_featured_posts_on_home(&$query) {

		if (
			(
				$query->is_home() &&
				$query->is_main_query() &&
				strstr(savana_lite_setting('haaski_magazine_post_slideshow_layout','layout-1'), 'layout' ) == true
			)
		){

			$offset = haaski_magazine_get_posts_on_slideshow();

			$ppp = get_option('posts_per_page');

			if ( $query->is_paged ) {

				$page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );
				$query->set('offset', $page_offset );

			}
			else {
				$query->set('offset',$offset);
			}

		}

	}

	add_action('pre_get_posts', 'haaski_magazine_exclude_featured_posts_on_home', 1 );

}

/*-----------------------------------------------------------------------------------*/
/* Adjust offset pagination */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_adjust_offset_pagination')) {

	function haaski_magazine_adjust_offset_pagination($found_posts, $query) {

		$offset = haaski_magazine_get_posts_on_slideshow();

		if (
			(
				$query->is_home() &&
				$query->is_main_query() &&
				strstr(savana_lite_setting('haaski_magazine_post_slideshow_layout','layout-1'), 'layout' ) == true
			)
		){
			return $found_posts - $offset;
		}

		return $found_posts;

	}

	add_filter('found_posts', 'haaski_magazine_adjust_offset_pagination', 1, 2 );

}

/*-----------------------------------------------------------------------------------*/
/* Get featured links */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('haaski_magazine_get_featured_links')) {

	function haaski_magazine_get_featured_links() {

		$temp = '';
		$count = 0;

		for ($i = 1; $i <= 6; $i++) {

			if ($i <=3 ) {
				$themeSlug = 'savana_lite_';
			} else {
				$themeSlug = 'haaski_magazine_';
			}

			if (savana_lite_setting($themeSlug . 'featured_link_' . $i . '_image')) :

	        $featured_image = esc_attr(savana_lite_setting($themeSlug . 'featured_link_' . $i . '_image'));
	        $featured_link = wp_get_attachment_url($featured_image);
					$featured_title = savana_lite_setting($themeSlug . 'featured_link_' . $i . '_title');
					$featured_url = savana_lite_setting($themeSlug . 'featured_link_' . $i . '_url');

	        $temp .= '<div class="featured-link-item">';

	        if ($featured_url) :

	            $temp .= '<a href="' . esc_url($featured_url) . '"></a>';

	        endif;

	        $temp .= '<img src="' . esc_url($featured_link) . '" alt="' . esc_attr($featured_title) . '">';

	        if ($featured_title) :

	            $temp .= '<div class="featured-link-title">';
	            $temp .= '<h6>' . esc_html($featured_title) . '</h6>';
	            $temp .= '</div>';

	        endif;

	        $temp .= '</div>';

					$count++;

	    endif;

		}

		$html  = '<div class="featured-links-parent featured-elements-' . $count . '">';
		$html .= $temp;
		$html .= '</div>';

		return $html;

	}

}

?>
