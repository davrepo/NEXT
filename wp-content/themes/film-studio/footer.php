</div>
<footer class="footer-area">  
   <div class="container"> 
		<?php $film_studio_footer_widgets_setting = get_theme_mod('film_studio_footer_widgets_setting','1');
		do_action('film_studio_footer_above'); 
			if ( is_active_sidebar( 'film-studio-footer-widget-area' ) ) { 
				if( $film_studio_footer_widgets_setting != ''){?> ?>	
				<div class="row footer-row"> 
					<?php dynamic_sidebar( 'film-studio-footer-widget-area' ); ?>
				</div>  
			<?php } ?>
		<?php }?>
	</div>
	
	<?php 
		$film_studio_footer_copyright = get_theme_mod('film_studio_footer_copyright','');
	?>
	<?php $film_studio_footer_copyright_setting = get_theme_mod('film_studio_footer_copyright_setting','1');
	 if( $film_studio_footer_copyright_setting != ''){?>
		<div class="copy-right"> 
			<div class="container">
				<p class="copyright-text">	
					<?php
						echo esc_html( apply_filters('film_studio_footer_copyright',($film_studio_footer_copyright)));
				    ?>
					<?php if($film_studio_footer_copyright == "") { ?>
						<?php
							echo esc_html('Copyright &copy; 2023,');
				        ?>
						<a href="https://www.seothemesexpert.com/wordpress/free-film-wordpress-themes/" target="blank">
							<?php
							   echo esc_html( 'Film Studio');
							?>
						</a>
						<span> | </span>
						<a href="https://wordpress.org/">
							<?php
							   echo esc_html( 'WordPress Theme');
							?>
						</a>
					<?php } ?>
				</p>
			</div>
		</div>
	<?php }?>
	<?php $film_studio_scroll_top = get_theme_mod('film_studio_scroll_top_setting','1');
      if($film_studio_scroll_top == '1') { ?>
		<a id="scrolltop"><span><?php esc_html_e('TOP','film-studio');?><span></a>
	<?php } ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
