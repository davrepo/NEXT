<?php

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'film-studio-customize-section-button',
		get_theme_file_uri( 'assets/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);
	wp_localize_script(
		'film-studio-customize-section-button',
		'film_studio_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		)
	);

	wp_enqueue_style(
		'film-studio-customize-section-button',
		get_theme_file_uri( 'assets/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

 /**
 * Enqueue scripts and styles.
 */
function film_studio_scripts() {
	
	// Styles	 

	wp_enqueue_style('all-min',get_template_directory_uri().'/assets/css/all.min.css');

	wp_enqueue_style('bootstrap-min',get_template_directory_uri().'/assets/css/bootstrap.min.css');
	
	wp_enqueue_style('owl-carousel-min',get_template_directory_uri().'/assets/css/owl.carousel.min.css');
	
	wp_enqueue_style('font-awesome',get_template_directory_uri().'/assets/css/fonts/font-awesome/css/font-awesome.min.css');
	
	wp_enqueue_style('film-studio-editor-style',get_template_directory_uri().'/assets/css/editor-style.css');
	
	wp_style_add_data('film-studio', 'rtl', 'replace');

	wp_enqueue_style('film-studio-main', get_template_directory_uri() . '/assets/css/main.css');

	wp_enqueue_style('film-studio-woo', get_template_directory_uri() . '/assets/css/woo.css');
	
	wp_enqueue_style( 'film-studio-style', get_stylesheet_uri() );

	
	// Scripts

	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false, true);

	wp_enqueue_script('film-studio-sliderscript', get_template_directory_uri().'/assets/js/sliderscript.js', array('jquery'), '1.1', true);

	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false, true);

	wp_enqueue_script('film-studio-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), false, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'film_studio_scripts' );

//Admin Enqueue for Admin
function film_studio_admin_enqueue_scripts(){
	wp_enqueue_style('film-studio-admin-style', esc_url( get_template_directory_uri() ) . '/inc/aboutthemes/admin.css');
	wp_enqueue_script('dismiss-notice-script', get_stylesheet_directory_uri() . '/inc/aboutthemes/theme-admin-notice.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'film_studio_admin_enqueue_scripts' );

// Function to enqueue custom CSS
function film_studio_enqueue_custom_css() {
    // Define a unique handle for your inline stylesheet
    $handle = 'film-studio-style';
    
    // Get the generated custom CSS
    $film_studio_custom_css = "";

    $film_studio_blog_layouts = get_theme_mod('film_studio_blog_layout_option_setting', 'Default');
    if ($film_studio_blog_layouts == 'Default') {
        $film_studio_custom_css .= '.blog-item{';
        $film_studio_custom_css .= 'text-align:center;';
        $film_studio_custom_css .= '}';
    } elseif ($film_studio_blog_layouts == 'Left') {
        $film_studio_custom_css .= '.blog-item{';
        $film_studio_custom_css .= 'text-align:Left;';
        $film_studio_custom_css .= '}';
    }

    // Enqueue the inline stylesheet
    wp_add_inline_style($handle, $film_studio_custom_css);
}

// Hook the function to the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'film_studio_enqueue_custom_css');