<?php 
  $film_studio_latest_movie = get_theme_mod('film_studio_latest_movie_setting','1');
  
  if($film_studio_latest_movie == '1') {
?>
  <section id="top-movies-section" class="second-main-box py-5">
    <div class="container">
      <?php
        $film_studio_movies_section_title = get_theme_mod( 'movies_section_title' );
        $film_studio_movies_section_btn_text = get_theme_mod( 'movies_section_btn_text' );
        $film_studio_movies_section_btn_link = get_theme_mod( 'movies_section_btn_link' );
      ?>
      <div class="movies_heading pb-4">
        <?php if( $film_studio_movies_section_title != ''){?>
          <h3 class="text-center text-md-start"><?php echo apply_filters('film_studio_movies_section', $film_studio_movies_section_title); ?></h3>
        <?php }?>
        <?php if( $film_studio_movies_section_btn_link != '' || $film_studio_movies_section_btn_text != ''){?>
          <a href="<?php echo apply_filters('film_studio_movies_section', $film_studio_movies_section_btn_link); ?>"><?php echo apply_filters('film_studio_movies_section', $film_studio_movies_section_btn_text); ?></a>
        <?php }?>
      </div>
      <?php
        for ( $s = 1; $s <= 8; $s++ ) {
          $film_studio_mod =  get_theme_mod( 'movies_section_settigs' .$s );
          if ( 'page-none-selected' != $film_studio_mod ) {
            $film_studio_post[] = $film_studio_mod;
          }
        }
         if( !empty($film_studio_post) ) :
        $film_studio_args = array(
          'post_type' =>array('post','page'),
          'post__in' => $film_studio_post
        );
        $film_studio_query = new WP_Query( $film_studio_args );
        if ( $film_studio_query->have_posts() ) :
          $s = 1;
      ?>
      <div class="row">
        <?php  while ( $film_studio_query->have_posts() ) : $film_studio_query->the_post(); ?>
          <div class="col-lg-3 col-md-3 mb-4">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="inner-box-image ">
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                <div class="inner-box py-2">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                </div>
              </div>
            <?php endif; ?>
          </div>
        <?php $s++; endwhile; ?>
      </div>
      <?php wp_reset_postdata();
      else : ?>
      <div class="no-postfound"></div>
        <?php endif;
      endif;?>
    </div>
  </section>
<?php } ?>