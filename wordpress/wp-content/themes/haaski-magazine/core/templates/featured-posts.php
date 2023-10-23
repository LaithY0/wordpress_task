<?php

/**
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('haaski_magazine_featured_posts_function')) {

	function haaski_magazine_featured_posts_function($catID = false) {

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => haaski_magazine_get_posts_on_slideshow() ,
			'ignore_sticky_posts' => true,
		);

		$query = new WP_Query($args);

		if (
			$query->have_posts() &&
			(
				is_home() ||
				is_front_page()
			) &&
			strstr(savana_lite_setting('haaski_magazine_post_slideshow_layout','layout-1'), 'layout' ) == true &&
			get_query_var('paged') <= 1
		) :

		    $counter = 0;
		    $currentCounter = 0;

	?>

            <section class="featured-posts-wrapper">

                <div id="featured-posts-inner" class="container-fluid">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="featured-posts-container <?php echo esc_attr(savana_lite_setting('haaski_magazine_post_slideshow_layout','layout-1'));?>">

                            	<div class="single-item owl-carousel owl-theme" data-dots="<?php echo esc_attr(savana_lite_setting('haaski_magazine_slideshow_dots', true));?>">

                                  <?php

                                      while ( $query->have_posts() ) : $query->the_post();

                                          global $post;

                                          $counter++;

                                          $thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
                                          $featuredPostsStyle = (isset($thumb[0])) ? 'style="background-image: url(' . esc_url($thumb[0]) . ')"' : '';

                                          if ( $counter % 6 == 1 ) {
                                              echo '<div class="item">';
                                          }

                                  ?>

                                          <div class="featured-post featured-post-<?php echo esc_attr($currentCounter);?>" <?php echo $featuredPostsStyle;?> >

                                              <a title="<?php echo esc_attr(get_the_title());?>" class="featured-post-permalink" href="<?php echo esc_url(get_permalink($post->ID)); ?>" ></a>

                                              <div class="featured-post-info">
                                                  <h2 class="title"><?php echo esc_html(get_the_title()); ?></h2>
                                                  <span><?php echo esc_html(get_the_date(false, $post->ID)); ?></span>
                                              </div>

                                          </div>

                                  <?php

                                      $currentCounter++;

                                      if (
																				$counter % 6 == 0 ||
																				$counter == $query->post_count
																			) {

                                          echo "</div>\n";
                                          $currentCounter = 0;

																			}

                                      endwhile;

                                  ?>

                            	</div>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

	<?php

		endif;
		wp_reset_postdata();

	}

	add_action( 'haaski_magazine_featured_posts', 'haaski_magazine_featured_posts_function', 10, 1);

}

?>
