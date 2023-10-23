<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_related_posts')) {

	function haaski_magazine_related_posts($content) {

		if (
			savana_lite_setting('haaski_magazine_enable_related_posts', true) == true &&
			is_single()
		) :

			global $post;

			$postID = $post->ID;

			$catsArray = array();
			$tagsArray = array();

			foreach (get_the_category($postID) as $cat) {
				$catsArray[] = $cat->term_id;
			}

			foreach (wp_get_post_tags($postID) as $tag) {
				$tagsArray[] = $tag->term_id;
			}

			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 6,
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'desc',
				'fields' => 'ids',
				'exclude' => array($postID),
				'tax_query' => array(
					'relation' => 'OR',
					 array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $catsArray,
						'operator' => 'IN'
					 ),
					 array(
						'taxonomy' => 'post_tag',
						'field' => 'term_id',
						'terms' => $tagsArray,
						'operator' => 'IN'
					 )

				)
			);

			$relatedPosts = get_posts($args);

			$NRelatedPosts = count($relatedPosts);

			if ( $NRelatedPosts <= 0 ) {

				return $content;

			} else {

				$relatedHTML = '<div class="related-posts">';

					$relatedHTML .= '<h3>';
					$relatedHTML .= esc_html__('You may also like','haaski-magazine');
					$relatedHTML .= '</h3>';

					$relatedHTML .= '<div class="related-posts-grid related-posts-grid-'.$NRelatedPosts.'">';

						foreach ( $relatedPosts as $related ) {

							$relatedHTML .= '<section>';
							$relatedHTML .= haaski_magazine_get_related_post($related, false, false);
							$relatedHTML .= '</section>';

						}

					$relatedHTML .= '</div>';

				$relatedHTML .= '</div>';

				return $content . $relatedHTML;

			}

		else :

			return $content;

		endif;

	}

	add_filter('the_content', 'haaski_magazine_related_posts');

}

?>
