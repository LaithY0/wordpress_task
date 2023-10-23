<?php

// Exit if accessed directly
if (!defined('ABSPATH')) exit;

if (!function_exists('haaski_magazine_google_font_name')) {

	function haaski_magazine_google_font_name($font) {

		$result = explode(':', get_theme_mod($font));
		return str_replace('+',' ',$result[0]);

	}

}

if (!function_exists('haaski_magazine_google_font_args')) {

	function haaski_magazine_google_font_args() {

		$googleFonts = array(
      get_theme_mod('haaski_magazine_body_font_family', 'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'),
		);

		return implode('|', array_unique($googleFonts));

	}

}

if (!function_exists('haaski_magazine_google_fonts')) {

	function haaski_magazine_google_fonts() {

			$googleFonts =  array (

				'Abel:400' => 'Abel',
				'Archivo:400,400italic,500,500italic,600,600italic,700,700italic' => 'Archivo',
				'Josefin+Sans:100,100italic,300,300italic,400,400italic,600,600italic,700,700italic' => 'Josefin Sans',
				'Josefin+Slab:100,100italic,300,300italic,400,400italic,600,600italic,700,700italic' => 'Josefin Slab',
				'Lobster:400' => 'Lobster',
				'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two',
				'Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' => 'Montserrat',
				'Niramit:200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic' => 'Niramit',
				'PT+Sans:400,400italic,700,700italic' => 'PT Sans',
				'Playball:400' => 'Playball',
				'Playfair+Display:400,400italic,700,700italic,900,900italic' => 'Playfair Display',
				'Poppins:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' => 'Poppins',
				'Roboto:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic,900,900italic' => 'Roboto',
				'Roboto+Condensed:300,300italic,400,400italic,700,700italic' => 'Roboto Condensed',
				'Roboto+Mono:100,100italic,300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto Mono',
				'Roboto+Slab:100,300,400,700' => 'Roboto Slab',
				'Zilla+Slab:300,300italic,400,400italic,500,500italic,600,600italic,700,700italic' => 'Zilla Slab',

			);

      return $googleFonts;

	}

}

?>
