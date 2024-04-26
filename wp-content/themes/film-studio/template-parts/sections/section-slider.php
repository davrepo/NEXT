<?php 
  $film_studio_slider = get_theme_mod('film_studio_slider_setting','1');
  $film_studio_slider_button = get_theme_mod('film_studio_slider_button_setting','1');
  
  if($film_studio_slider == '1') {
?>
  <section id="slider-section" class="slider-area home-slider">
    <!-- start of hero -->
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <?php $film_studio_pages = array();
        for ( $count = 1; $count <= 3; $count++ ) {
          $mod = intval( get_theme_mod( 'slider' . $count ));
          if ( 'page-none-selected' != $mod ) {
            $film_studio_pages[] = $mod;
          }
        }
        if( !empty($film_studio_pages) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $film_studio_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
      ?>
      <div class="carousel-inner" role="listbox">      
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <div class="row">
              <div class="col-md-6">
                <?php if(has_post_thumbnail()){ ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                <?php }else { ?><div class="slider-color-box"></div> <?php } ?>
              </div>
              <div class="col-md-6">
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'25') );?></p>
                    <?php if($film_studio_slider_button == '1') {  ?>
                      <div class="read-btn">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html('Learn More','film-studio'); ?></a>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php $i++; endwhile;
        wp_reset_postdata();?>
      </div>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" id="prev" data-bs-slide="prev">
      <i class="fas fa-angle-left" aria-hidden="true"></i>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next" id="next">
      <i class="fas fa-angle-right" aria-hidden="true"></i>
      </button>
    </div>
  </section>
<?php } ?>