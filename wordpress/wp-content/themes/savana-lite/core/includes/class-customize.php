<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'savana_lite_customize' ) ) {

	class savana_lite_customize {

		public $theme_fields;

		public function __construct( $fields = array() ) {

			$this->theme_fields = $fields;

			add_action ('admin_init' , array( &$this, 'admin_scripts' ) );
			add_action ('customize_register' , array( &$this, 'customize_panel' ) );
			add_action ('customize_controls_enqueue_scripts' , array( &$this, 'customize_scripts' ) );

		}

		public function admin_scripts() {

			global $wp_version, $pagenow;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';

			if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' || $pagenow == 'edit.php' ) {
				wp_enqueue_style ( 'savana-lite-panel',  $file_dir . 'css/panel.css', array(), '1.0.0' );
				wp_enqueue_script( 'savana-lite-script', $file_dir . 'js/panel.js', array('jquery', 'jquery-ui-core', 'jquery-ui-tabs'),'1.0.0', TRUE );
			}

		}

		public function customize_scripts() {

			wp_enqueue_style (
				'savana-lite-customizer',
				get_template_directory_uri() . '/core/admin/assets/css/customize.css',
				array(),
				''
			);

		}

		public function customize_panel ( $wp_customize ) {

			global $wp_version;

			$theme_panel = $this->theme_fields ;

			foreach ( $theme_panel as $element ) {

				switch ( $element['type'] ) {

					case 'panel' :

						$wp_customize->add_panel( $element['id'], array(

							'title' => $element['title'],
							'priority' => $element['priority'],
							'description' => $element['description'],

						) );

					break;

					case 'section' :

						$wp_customize->add_section( $element['id'], array(

							'title' => $element['title'],
							'panel' => $element['panel'],
							'priority' => $element['priority'],
							'description' => $element['description'],

						));

					break;

					case 'text' :

						$wp_customize->add_setting( $element['id'], array(

							'default' => $element['std'],
							'sanitize_callback' => 'sanitize_text_field',

						) );

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						) );

					break;

					case 'pixel_size' :

						$wp_customize->add_setting( $element['id'], array(

							'default' => $element['std'],
							'sanitize_callback' => array( &$this, 'pixel_size_sanize' ),

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => 'text',
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'slideshow_limit' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => array( &$this, 'slideshow_limit_sanize' ),
							'default' => $element['std'],

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => 'number',
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],
							'input_attrs' => array('min' => -1)

						));

					break;

					case 'number' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => 'absint',
							'default' => $element['std'],

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'checkbox' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => array( &$this, 'checkbox_sanize' ),
							'default' => $element['std'],

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => 'checkbox',
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'upload' :

						$wp_customize->add_setting( $element['id'], array(

							'default' => $element['std'],
							'capability' => 'edit_theme_options',
							'sanitize_callback' => 'absint'

						));

						$wp_customize->add_control( new WP_Customize_Cropped_Image_Control($wp_customize, $element['id'], array(

							'label' => $element['label'],
							'mime_type' => 'image',
							'description' => $element['description'],
							'section' => $element['section'],
							'settings' => $element['id'],
							'width' => 940,
							'height' => 627,

						)));

					break;

					case 'url' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => 'esc_url_raw',
							'default' => $element['std'],

						) );

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'color' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => 'sanitize_hex_color',
							'default' => $element['std'],

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'button' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => array( &$this, 'button_sanize' ),
							'default' => $element['std'],

						));

						$wp_customize->add_control( $element['id'] , array(

							'type' => 'url',
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'textarea' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => 'sanitize_textarea_field',
							'default' => $element['std'],

						) );

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],

						));

					break;

					case 'select' :

						$wp_customize->add_setting( $element['id'], array(

							'sanitize_callback' => array( &$this, 'select_sanize' ),
							'default' => $element['std'],

						) );

						$wp_customize->add_control( $element['id'] , array(

							'type' => $element['type'],
							'section' => $element['section'],
							'label' => $element['label'],
							'description' => $element['description'],
							'choices'  => $element['options'],

						));

					break;

					case 'savana-lite-customize-info' :

						$wp_customize->add_section( $element['id'], array(

							'title' => $element['title'],
							'priority' => $element['priority'],
							'capability' => 'edit_theme_options',

						));

						$wp_customize->add_setting(  $element['id'], array(
							'sanitize_callback' => 'esc_url_raw'
						));

						$wp_customize->add_control( new Savanalite_Customize_Info_Control( $wp_customize,  $element['id'] , array(
							'section' => $element['section'],
						)));

					break;

				}

			}

			if ( savana_lite_is_woocommerce_active() ) :

				$wp_customize->remove_control( 'woocommerce_catalog_rows');
				$wp_customize->remove_control( 'woocommerce_catalog_columns');

			endif;

			if (!savana_lite_is_woocommerce_active())
				$wp_customize->remove_control( 'savana_lite_woocommerce_category_layout');

	   }

		public function select_sanize ($value, $setting) {

			global $wp_customize;

			$getControl = $wp_customize->get_control($setting->id);
			$getSetting = $wp_customize->get_setting($setting->id);

			return (array_key_exists( $value, $getControl->choices)) ? $value : $getSetting->default;

		}

		public function button_sanize ( $value, $setting ) {

			$sanize = array (

				'savana_lite_footer_email_button' => 'mailto:',
				'savana_lite_footer_skype_button' => 'skype:',
				'savana_lite_footer_whatsapp_button' => 'tel:',

			);

			if (!isset($value) || $value == '' || $value == $sanize[$setting->id]) {

				return '';

			} elseif (!strstr($value, $sanize[$setting->id])) {

				return $sanize[$setting->id] . $value;

			} else {

				return esc_url_raw($value, array('mailto', 'skype', 'tel'));

			}

		}

		public function pixel_size_sanize($value, $setting) {

			global $wp_customize;

			$getSetting = $wp_customize->get_setting($setting->id);
			$newValue = absint(str_replace('px', '', $value));
			return ($newValue == 0 ) ? $getSetting->default : $newValue . 'px';

		}

		public function slideshow_limit_sanize($value, $setting) {

			global $wp_customize;

			$getSetting = $wp_customize->get_setting($setting->id);
			$newValue = ($value <= 0) ? $getSetting->default : absint($value);
			return $newValue;

		}

		public function checkbox_sanize( $input ) {
			return $input ? true : false;
		}

	}

}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Savanalite_Customize_Info_Control extends WP_Customize_Control {

		public $type = "savana-lite-customize-info";

		public function render_content() { ?>

            <div class="inside">

                <h2><?php esc_html_e('Premium features','savana-lite');?></h2>
                <p><?php esc_html_e('Upgrade to the premium version of Savana, to enable all features like:','savana-lite');?></p>

                <ul class="features-list">

                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('4 additional child themes','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('8 blog layouts','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Remove the copyright text from the footer','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Choose custom colors','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Portfolio section','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Display a slideshow for gallery posts','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Unlimited widget areas','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Select a global layout of all contents','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Select a global widget area of all contents','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Custom shortcodes','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Shortcodes generator','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Sample data','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('Unlimited website usage','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('60% discount on subscription renewal','savana-lite');?></li>
                	<li><span class="dashicon dashicons dashicons-yes"></span><?php esc_html_e('30 days money back guarantee','savana-lite');?></li>

                </ul>

                <ul>

                    <li><a class="button demo-button" href="<?php echo esc_url( 'https://demo.themeinprogress.com/?theme=Savana' ); ?>" title="<?php esc_attr_e('View live demo','savana-lite');?>" target="_blank"><?php esc_html_e('View live demo','savana-lite');?></a></li>
                    <li><a class="button purchase-button" href="<?php echo esc_url( 'https://www.themeinprogress.com/savana-clean-elegant-wordpress-woocommerce-theme/?ref=2&campaign=savana-lite-panel' ); ?>" title="<?php esc_attr_e('Upgrade to Savana Pro','savana-lite');?>" target="_blank"><?php esc_html_e('Upgrade to Savana Pro','savana-lite');?></a></li>

                </ul>

            </div>

            <div class="inside">

                <h2><?php esc_html_e('Become a supporter','savana-lite');?></h2>

                <p><?php esc_html_e("If you like this theme and support, I'd appreciate any of the following:","savana-lite");?></p>

                <ul>

                    <li><a class="button" href="<?php echo esc_url( 'https://wordpress.org/support/view/theme-reviews/'.get_stylesheet().'#postform' ); ?>" title="<?php esc_attr_e('Rate this Theme','savana-lite');?>" target="_blank"><?php esc_html_e('Rate this Theme','savana-lite');?></a></li>
                    <li><a class="button" href="<?php echo esc_url( 'https://www.themeinprogress.com/reserved-area/' ); ?>" title="<?php esc_attr_e('Subscribe our newsletter','savana-lite');?>" target="_blank"><?php esc_html_e('Subscribe our newsletter','savana-lite');?></a></li>

                </ul>

            </div>

		<?php

		}

	}

}

?>
