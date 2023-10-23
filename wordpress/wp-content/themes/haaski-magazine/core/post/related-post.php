<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

function haaski_magazine_get_related_post($postID, $getData = false, $getSummary = false) {

	$excerpt = wp_trim_words(get_the_content($postID), 10 , '...' );

	$html = '';

	$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($postID), 'large');

	$imgBackground = (isset($thumb[0])) ? $thumb[0] : get_stylesheet_directory_uri() . '/assets/images/placeholder-337x225.jpg';

	$html .= '<div class="single_related_post" style="background-image:url(' . esc_url($imgBackground) . ')">';

		$html .= '<a title="' . esc_attr(get_the_title($postID)) . '" class="related_post_permalink" href="' . esc_url(get_permalink($postID)) . '"></a>';

		$html .= '<div class="related_post_details">';

			$html .= '<div class="related_post_inner_details" style="display:block">';

				$html .= '<h3>' . esc_html(get_the_title($postID)) . '</h3>';

				if ($getData == true)
					$html .= '<div class="meta-info">' . esc_html(get_the_date(false,$postID)) . '</div>';

				if ($getSummary == true)
					$html .= '<p>' . esc_html($excerpt) . ' </p>';

			$html .= '</div>';

		$html .= '</div>';

	$html .= '</div>';

	return $html;

}

?>
