<?php 

/**
 * Wp in Progress
 * 
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_mobile_menu_function')) {

	function savana_lite_mobile_menu_function() {

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
							
							?>
                            
                        </nav> 
                        
                    </div>
                
				</div>
                
            </div>
        
        </div>
        
<?php
	
	}

	add_action( 'savana_lite_mobile_menu', 'savana_lite_mobile_menu_function' );

}

?>