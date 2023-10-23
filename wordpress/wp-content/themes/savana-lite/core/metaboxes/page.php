<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

new savana_lite_metaboxes (

	'page', 
	
	array(

		array(
		
			'name' => 'Navigation',  
			'type' => 'navigation',  
			'item' => array( 
				
				'general' => esc_html__( 'Setting', 'savana-lite') , 
					
			),   
				
			'start' => '<ul>', 
			'end' => '</ul>'),  
		
		array(
			
			'type' => 'begintab',
			'tab' => 'general',
			'element' =>
				
				array(
					'name' => esc_html__( 'Page settings','savana-lite'),
					'type' => 'title',
				),
		
				array(
					'name' => esc_html__( 'Template','savana-lite'),
					'desc' => esc_html__( 'Select a template for this page','savana-lite'),
					'id' => 'savana_lite_template',
					'type' => 'select',
					'options' => array(
						'full' => esc_html__( 'Full Width','savana-lite'),
						'left-sidebar' =>  esc_html__( 'Left Sidebar','savana-lite'),
						'right-sidebar' => esc_html__( 'Right Sidebar','savana-lite'),
					),
					'std' => 'right-sidebar',
				),
		
		),
		
		array(
			'type' => 'endtab'
		),
		
	array( 'type' => 'endsection' )
	
	)
	
);

?>