<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('savana_lite_post_author_function')) {

	function savana_lite_post_author_function() { ?>

	<div class="post-author">

		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
		</div>

		<div class="author-content">
			<h5><?php esc_html_e('Written by ','savana-lite'); the_author_posts_link(); ?></h5>
			<p><?php the_author_meta('description'); ?></p>
		</div>

		<div class="clear"></div>

	</div>


<?php

	}

	add_action( 'savana_lite_post_author', 'savana_lite_post_author_function', 10, 2 );

}

?>
