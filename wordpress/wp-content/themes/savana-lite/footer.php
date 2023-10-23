    <footer id="footer">
    
    	<?php
		
			get_sidebar('bottom');
			get_sidebar('footer');
		
		?>
        
        <div class="container">
    
             <div class="row copyright" >
                
                <div class="col-md-12" >

                    <?php do_action( 'savana_lite_socials' ); ?>

                    <p>

                    	<?php 
						
							if ( savana_lite_setting('savana_lite_copyright_text')) :
							
								echo wp_filter_post_kses(savana_lite_setting('savana_lite_copyright_text'));
								
							else:
							
								esc_html_e('Copyright ', 'savana-lite');
								echo esc_html(get_bloginfo('name'));
								echo esc_html( date_i18n( __( ' Y', 'savana-lite' )));
							
							endif;
							
                    	?>

                    	<a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank"><?php printf( esc_html__( ' | Theme by %s', 'savana-lite' ), 'ThemeinProgress' ); ?></a>
                    	<a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'savana-lite' ); ?>" rel="generator"><?php printf( esc_html__( ' | Proudly powered by %s', 'savana-lite' ), 'WordPress' ); ?></a>
                            
                    </p>

                </div>
            
            </div>
            
        </div>
    
    </footer>

</div>

<?php 

	if ( savana_lite_setting('savana_lite_enable_backtotop_button', true) == true )
		echo '<div id="back-to-top"><span class="dashicons dashicons-arrow-up-alt"></span></div>';

	wp_footer(); 
	
?>   

</body>

</html>