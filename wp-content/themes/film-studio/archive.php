<?php
/**
 * The template for displaying archive pages.
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
	            $film_studio_archive_sidebar_setting = get_theme_mod('film_studio_archive_sidebar_setting','1');
	            $film_studio_content_class = ($film_studio_archive_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';
            ?>
            <div class="<?php echo esc_attr($film_studio_content_class); ?>">
				<div class="row">
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
			</div>
			<?php if( $film_studio_archive_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>