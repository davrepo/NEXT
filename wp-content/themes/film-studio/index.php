<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Film Studio
 */
get_header(); ?>

<section class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row">
			<?php 
	            $film_studio_index_sidebar_setting = get_theme_mod('film_studio_index_sidebar_setting','1');
	            $film_studio_content_class = ($film_studio_index_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';
            ?>
			<div class="<?php echo esc_attr($film_studio_content_class); ?>">
				<div class="row">
					<?php 
						$film_studio_paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
						$args = array( 'post_type' => 'post','paged'=>$film_studio_paged );	
					?>
					<?php if( have_posts() ): ?>
						<?php while( have_posts() ) : the_post(); ?>
							<div class="col-lg-12">
								<?php get_template_part('template-parts/content/content-post', get_post_format()); ?>
							</div>
						<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part('template-parts/content/content','none'); ?>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-12 text-center mt-5">
						<div class="sp-post-pagination">
							<?php
							the_posts_pagination( array(
								'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
								'next_text'          => '<i class="fa fa-angle-double-right"></i>',
							) ); ?>
						</div>
					</div>
				</div>
			</div>
			<?php if( $film_studio_index_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>