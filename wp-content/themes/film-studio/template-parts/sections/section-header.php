<header class="<?php if( get_theme_mod( 'film_studio_sticky_header', '1') != '') { ?>main-header<?php } else { ?>close-sticky<?php } ?>">
	<div class="lower-header-area">	
		<div class="container">
			<?php 
				$film_studio_topheader_btn_text = get_theme_mod('film_studio_topheader_btn_text');
				$film_studio_topheader_btn_link = get_theme_mod( 'film_studio_topheader_btn_link' );
			?>    		
      	<div class="row">
	    		<div class="col-lg-3 col-md-3 align-self-center">
						<div class="logo">
							<?php if(has_custom_logo()) {	
								the_custom_logo();
							} else { 
								$film_studio_site_title = get_theme_mod('film_studio_site_title_setting','1');
										    if($film_studio_site_title == '1') { ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
									<h4 class="site-title">
										<?php 
											echo esc_html(bloginfo('name'));
										?>
									</h4>
								</a>
								<?php }
								$film_studio_tagline = get_theme_mod('film_studio_tagline_setting','0' );
									if($film_studio_tagline  ) { ?>	
								<?php 
									$film_studio_site_desc = get_bloginfo( 'description'); ?>
										<p class="site-description"><?php echo esc_html($film_studio_site_desc); ?></p>
								<?php } ?>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-7 col-md-6 align-self-center">
						<div class="menubar">
		      		<div class="innermenubox">
	      				
			          	<div class="toggle-nav mobile-menu">
            				<button onclick="film_studio_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','film-studio'); ?></span></button>
	          			</div>

         	 			<div id="mySidenav" class="nav sidenav">
            			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'film-studio' ); ?>">
			              	<?php 
			                  	wp_nav_menu( array(
				                    'theme_location' => 'primary-menu',
				                    'container_class' => 'main-menu clearfix' ,
				                    'menu_class' => 'clearfix',
				                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
				                    'fallback_cb' => 'wp_page_menu',
			                  	) );
			              	?>
              				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="film_studio_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','film-studio'); ?></span></a>
	            		</nav>
	          		</div>
	        		</div>
						</div>
          </div>
         	<div class="col-lg-2 col-md-3 align-self-center">
         		<?php if( $film_studio_topheader_btn_link != '' || $film_studio_topheader_btn_text != ''){?>
							<a href="<?php echo apply_filters('film_studio_topheader', $film_studio_topheader_btn_link); ?>" class="offer-text"><?php echo apply_filters('film_studio_topheader', $film_studio_topheader_btn_text); ?></a>
						<?php }?>
         	</div>
      	</div>
    </div>
  </div>
</header>