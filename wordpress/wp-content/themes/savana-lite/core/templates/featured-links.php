<?php
	
	if ( savana_lite_setting('savana_lite_enable_featuredlinks_section') == true ) :

		echo '<div class="container featured-links-wrapper">';
			
			echo '<div class="row">';

                if ( savana_lite_setting('savana_lite_featured_link_1_image') ) :
                
                    $featured_image_1 = esc_attr(savana_lite_setting('savana_lite_featured_link_1_image'));
                    $featured_link_1 = wp_get_attachment_url($featured_image_1);
                    $featured_title_1 =  savana_lite_setting('savana_lite_featured_link_1_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_1_url') ) :
    
                        echo '<a href="' . esc_url(savana_lite_setting('savana_lite_featured_link_1_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($featured_link_1) . '" alt="' . esc_attr($featured_title_1) . '">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_1_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($featured_title_1) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;
                
                if ( savana_lite_setting('savana_lite_featured_link_2_image') ) :
                
                    $featured_image_2 = esc_attr(savana_lite_setting('savana_lite_featured_link_2_image'));
                    $featured_link_2 = wp_get_attachment_url($featured_image_2);
                    $featured_title_2 =  savana_lite_setting('savana_lite_featured_link_2_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_2_url') ) :
    
                        echo '<a href="' . esc_url(savana_lite_setting('savana_lite_featured_link_2_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($featured_link_2) . '" alt="' . esc_attr($featured_title_2) . '">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_2_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($featured_title_2) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;
                
                if ( savana_lite_setting('savana_lite_featured_link_3_image') ) :
                
                    $featured_image_3 = esc_attr(savana_lite_setting('savana_lite_featured_link_3_image'));
                    $featured_link_3 = wp_get_attachment_url($featured_image_3);
                    $featured_title_3 =  savana_lite_setting('savana_lite_featured_link_3_title');
    
                    echo '<div class="featured-link-item col-md-4">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_3_url') ) :
    
                        echo '<a href="' . esc_url(savana_lite_setting('savana_lite_featured_link_3_url')) . '"></a>';
    
                    endif;
    
                    echo '<img src="' . esc_url($featured_link_3) . '" alt="' . esc_attr($featured_title_3) . '">';
    
                    if ( savana_lite_setting('savana_lite_featured_link_3_title') ) :
    
                        echo '<div class="featured-link-title">';
                        echo '<h6>' . esc_html($featured_title_3) . '</h6>';
                        echo '</div>';
            
                    endif;
    
                    echo '</div>';
                
                endif;

			echo '</div>';
		
		echo '</div>';
		
	endif;

?>