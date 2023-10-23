<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_slick_slider_function')) {

	function savana_lite_slick_slider_function($columns, $size) {
		
		$placeholder = ( $columns == 1 ) ? 'placeholder-940x600.jpg' : 'placeholder-400x400.jpg' ; 

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => savana_lite_setting('savana_lite_slideshow_limit','-1'),
		);

		$query = new WP_Query($args); 
		
		if ( $query->have_posts() ) :  
                                
?>

        <div class="post-container slick-slideshow" data-columns="<?php echo esc_attr($columns);?>">

            <div class="slider slick-slides">

			<?php
        
                if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
        
                    global $post;

			?>
			
					<div>
				   
						<div class="slick-article">
                        
							<?php
                            
								if ( '' != get_the_post_thumbnail() ) { 
								
									the_post_thumbnail($size);
								
								} else {
								
									echo '<img src="' . get_template_directory_uri()."/assets/images/".$placeholder . '" alt="'.esc_attr(get_the_title()).'">';
						
								}
                            
                            ?>
							
                            <a class="entry-button" href="<?php echo esc_url(get_permalink($post->ID)); ?>"></a>

							<?php if ( savana_lite_setting('savana_lite_enable_slideshow_overlay', true) == true ) : ?>
                                
								<div class="slider-overlay">
								
                                	<div class="slider-overlay-wrapper">
								
                                		<div class="slider-overlay-content">
                                
                                            <span class="entry-date">
                                            	<?php echo esc_html__('Written by ','savana-lite') . get_the_author_posts_link() . esc_html__(' on ','savana-lite') . get_the_date(); ?>
                                            </span>	
                                            
                                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                                			<span class="entry-category"><?php the_category(' . ');?></span>
								
                                		</div>
								
                                	</div>
								
                                </div>
                                
                            <?php endif; ?>
                            
						</div>
						
					</div>
			
			<?php

				endwhile; 
				endif;
                wp_reset_query();
                wp_reset_postdata();

			?>

            </div>
            
        </div>

<?php

        endif;
	
	}

	add_action( 'savana_lite_slick_slider', 'savana_lite_slick_slider_function', 10, 2);

}

?>