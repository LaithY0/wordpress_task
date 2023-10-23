<?php

if (!function_exists('savana_lite_loadwidgets')) {

	function savana_lite_loadwidgets() {

/*-----------------------------------------------------------------------------------*/
/* 		LOAD ALL SIDEBAR AREAS
/*-----------------------------------------------------------------------------------*/    

		register_sidebar(array(
		
			'name' => esc_html__('Side widget area','savana-lite'),
			'id'   => 'savana-lite-side-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'savana-lite'),
			'before_widget' => '<div id="%1$s" class="post-article  %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

		register_sidebar(array(
		
			'name' => esc_html__('Top widget area','savana-lite'),
			'id'   => 'savana-lite-top-widget-area',
			'description'   => esc_html__('This widget area will be shown at the top of your content (Recommended for Revolution Slider).', 'savana-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Header widget area','savana-lite'),
			'id'   => 'savana-lite-header-widget-area',
			'description'   => esc_html__('This widget area will be shown before the content.', 'savana-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

		register_sidebar(array(

			'name' => esc_html__('Bottom widget area','savana-lite'),
			'id'   => 'savana-lite-bottom-widget-area',
			'description'   => esc_html__('This widget area will be shown at the bottom of your content', 'savana-lite'),
			'before_widget' => '<div id="%1$s" class="post-container %2$s"><article class="post-article">',
			'after_widget'  => '</article></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));
	
		register_sidebar(array(

			'name' => esc_html__('Footer widget area','savana-lite'),
			'id'   => 'savana-lite-footer-widget-area',
			'description'   => esc_html__('This widget area will be shown after the content.', 'savana-lite'),
			'before_widget' => '<div id="%1$s" class="col-md-3 %2$s"><div class="widget-box">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'
		
		));

	}

	add_action( 'widgets_init', 'savana_lite_loadwidgets' );

}

?>