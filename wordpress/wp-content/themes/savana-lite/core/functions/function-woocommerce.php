<?php

/*-----------------------------------------------------------------------------------*/
/* Woocommerce init */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'savana_lite_woocommerce_init' ) ) {

	function savana_lite_woocommerce_init() {
		
		remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
		remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
		remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

		if ( savana_lite_setting ('savana_lite_enable_woocommerce_cross_sell_cart') == true ) 
			add_action( 'savana_lite_cross_sell_cart', 'woocommerce_cross_sell_display' );

		if ( savana_lite_setting ('savana_lite_enable_woocommerce_related_products') == true )
			add_action( 'savana_lite_related_products', 'woocommerce_output_related_products', 20 );

		if ( savana_lite_setting ('savana_lite_enable_woocommerce_upsell_products') == true )
			add_action( 'savana_lite_upsell_products', 'woocommerce_upsell_display', 15 );

	}

	add_action( 'init', 'savana_lite_woocommerce_init' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce header cart */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'savana_lite_header_cart' ) ) {

	function savana_lite_header_cart() {

		if ( 
			savana_lite_is_woocommerce_active() && 
			savana_lite_setting('savana_lite_enable_woocommerce_header_cart', true) == true                            
		) :
		
	?>

            <div class="header-cart">
            
                <a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','savana-lite' ); ?>">
                    <i class="fa <?php echo esc_attr(savana_lite_setting('savana_lite_woocommerce_header_icon', 'fa-shopping-basket'));?>"></i>
					<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>  
                </a>
                            
                <div class="header-cart-widget">
                
                    <?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
                
                </div>
                
            </div>
    
	<?php

		endif;

	}
	
}

if ( ! function_exists( 'savana_lite_cart_link_fragment' ) ) {

	function savana_lite_cart_link_fragment( $fragments ) {
	
		ob_start();

?>
		<a class="cart-contents" href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" title="<?php esc_attr_e( 'View your shopping cart','savana-lite' ); ?>">
			<i class="fa <?php echo esc_attr(savana_lite_setting('savana_lite_woocommerce_header_icon', 'fa-shopping-basket'));?>"></i>
			<span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>  
		</a>
        
<?php

		$fragments['a.cart-contents'] = ob_get_clean();
		
		return $fragments;
	
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'savana_lite_cart_link_fragment' );

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce before content */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('savana_lite_woocommerce_before_main_content')) {

	function savana_lite_woocommerce_before_main_content() { 
	
		if ( is_product() ) {
			
			$classes = "product-wrapper" ;
	
		} else {
	
			$classes = "product-wrapper products-list" ;
	
		}

		get_template_part('core/templates/breadcrumb'); 
		get_sidebar('top');
		get_sidebar('header');

?>
	
	<div class="container">
	
		<div class="row">
		
			<div class="<?php echo savana_lite_template('span') . " " . savana_lite_template('sidebar') . " " . $classes; ?>" >
	
<?php
	
	}
	
	add_action('woocommerce_before_main_content', 'savana_lite_woocommerce_before_main_content');

}

/*-----------------------------------------------------------------------------------*/
/* Woocommerce after content */
/*-----------------------------------------------------------------------------------*/ 

if (!function_exists('savana_lite_woocommerce_after_main_content')) {
	
	function savana_lite_woocommerce_after_main_content() { ?>
	
			</div>
			
			<?php get_sidebar(); ?>
	
		</div>
		
	</div>

<?php

	}
	
	add_action('woocommerce_after_main_content', 'savana_lite_woocommerce_after_main_content');

}

/*-----------------------------------------------------------------------------------*/
/* Replace woocommerce_get_product_thumbnail function  */
/*-----------------------------------------------------------------------------------*/ 
	
if ( ! function_exists( 'savana_lite_get_wc_product_thumbnail' ) ) {
	
	function savana_lite_get_wc_product_thumbnail( $size = 'woocommerce_thumbnail', $deprecated1 = 0, $deprecated2 = 0 ) {
		
		global $post, $product;
		$imgSize = apply_filters( 'single_product_archive_thumbnail_size', $size);

		if ( $product ) {
			return (savana_lite_setting('savana_lite_enable_woocommerce_linkable_product_thumbnails') == true) ? '<a href="' . esc_url(get_permalink( $post->ID)) . '">' . $product->get_image($imgSize) . '</a>' : $product->get_image($imgSize);
		} else {
			return '';
		}
		
	}
	
}

/*-----------------------------------------------------------------------------------*/
/* Replace wc_get_gallery_image_html function  */
/*-----------------------------------------------------------------------------------*/ 

if ( ! function_exists( 'savana_lite_wc_get_gallery_image_html' ) ) {
	
	function savana_lite_wc_get_gallery_image_html( $attachment_id, $main_image = false ) {
		$flexslider        = (bool) apply_filters( 'woocommerce_single_product_flexslider_enabled', get_theme_support( 'wc-product-gallery-slider' ) );
		$gallery_thumbnail = wc_get_image_size( 'gallery_thumbnail' );
		$thumbnail_size    = apply_filters( 'woocommerce_gallery_thumbnail_size', array( $gallery_thumbnail['width'], $gallery_thumbnail['height'] ) );
		$image_size        = apply_filters( 'woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size );
		$full_size         = apply_filters( 'woocommerce_gallery_full_size', apply_filters( 'woocommerce_product_thumbnails_large_size', 'full' ) );
		$thumbnail_src     = wp_get_attachment_image_src( $attachment_id, $thumbnail_size );
		$full_src          = wp_get_attachment_image_src( $attachment_id, $full_size );
		$image             = wp_get_attachment_image( $attachment_id, $image_size, false, array(
			'title'                   => get_post_field( 'post_title', $attachment_id ),
			'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
			'data-src'                => $full_src[0],
			'data-large_image'        => $full_src[0],
			'data-large_image_width'  => $full_src[1],
			'data-large_image_height' => $full_src[2],
			'class'                   => $main_image ? 'wp-post-image' : '',
		) );
	
		return '<div data-thumb="' . esc_url( $thumbnail_src[0] ) . '" class="woocommerce-product-gallery__image"><a class="swipebox" data-rel="[product-gallery]" href="' . esc_url( $full_src[0] ) . '">' . $image . '</a></div>';
	}

}

?>