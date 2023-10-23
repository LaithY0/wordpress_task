<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'savana_lite_admin_notice' ) ) {

	class savana_lite_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'savana-lite-dismissed-notice') &&
				version_compare( PHP_VERSION, SAVANA_LITE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
			
			}

		}

		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['savana-lite-dismiss'] ) && check_admin_referer( 'savana-lite-dismiss-action' ) ) {
		
				update_option( 'savana-lite-dismissed-notice', intval($_GET['savana-lite-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="notice notice-warning is-dismissible">
            
            	<p>
            
            		<strong>

						<?php
                        
                            esc_html_e( 'Upgrade to the premium version of Savana, to enable 600+ Google Fonts, unlimited sidebars, portfolio section and much more. ', 'savana-lite' ); 
                            
							printf( 
								'<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'savana-lite' ) . '</a>', 
								esc_url( wp_nonce_url( add_query_arg( 'savana-lite-dismiss', '1' ), 'savana-lite-dismiss-action'))
							);
                            
                        ?>
                    
                    </strong>
                    
            	</p>
                    
            	<p>
            		
            		<a class="button button-primary" target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/savana-clean-elegant-wordpress-woocommerce-theme/?ref=2&campaign=savana-notice' ); ?>" ><?php esc_html_e( 'Upgrade to Savana Pro', 'savana-lite' ); ?></a>
                
            	</p>

            </div>
		
		<?php
		
		}

	}

}

new savana_lite_admin_notice();

?>