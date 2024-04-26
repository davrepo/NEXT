<?php 
/**
	Template Name: Page with Sidebar
*/

get_header(); ?>

<section id="post-section" class="blog-area inarea-blog-2-column-area three">
	<div class="container">
		<div class="row row-cols-1 gy-5">
			<?php 
                $film_studio_single_page_sidebar_setting = get_theme_mod('film_studio_single_page_sidebar_setting','1');
                $film_studio_content_class = ($film_studio_single_page_sidebar_setting == '') ? 'col-lg-12' : 'col-lg-8';
            ?>
            <div class="<?php echo esc_attr($film_studio_content_class); ?>">
				<?php the_post(); ?>
				<article class="post-items">
					<div class="post-content">
						<?php
							the_content();
						?>
					</div>
				</article>
				<?php
					if( $post->comment_status == 'open' ) { 
						comments_template( '', true ); // show comments 
					}
				?>
			</div>
            <?php if( $film_studio_single_page_sidebar_setting != '') { ?> 
                <?php get_sidebar(); ?>
            <?php } ?>
		</div>
	</div>
</section>
	
<?php get_footer(); ?>