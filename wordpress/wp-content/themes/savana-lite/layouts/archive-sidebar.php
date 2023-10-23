<div id="content" class="container">

	<div class="row" id="blog">
    
        <div class="<?php echo savana_lite_template('span') .' '. savana_lite_template('sidebar'); ?>">
        
        	<?php echo do_action('savana_lite_archive_title'); ?>

            <div class="row"> 
        
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                        <?php do_action('savana_lite_postformat'); ?>
                        <div class="clear"></div>
                        
                    </div>
		
				<?php 
                
                    endwhile; 
                    else:  
                
                ?>

                    <div class="post-container col-md-12" >
                
                        <article class="post-article not-found">
                                
                            <h1><?php esc_html_e( 'Not found', 'savana-lite' ) ?></h1>
                            <p><?php esc_html_e( 'Sorry, no posts found', 'savana-lite' ) ?></p>
                 
                        </article>
                
                    </div>
	
				<?php 
                    
                    endif;
                
                ?> 
        
            </div>
        
        </div>
        
		<?php do_action( 'savana_lite_side_sidebar'); ?>
           
    </div>

	<?php do_action( 'savana_lite_pagination', 'archive'); ?>

</div>