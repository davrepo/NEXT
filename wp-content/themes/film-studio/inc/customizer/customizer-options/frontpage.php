<?php
function film_studio_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
			'film_studio_frontpage_sections', array(
				'priority' => 32,
				'title' => esc_html__( 'Frontpage Sections', 'film-studio' ),
			)
		);
	
	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'film-studio' ),
			'priority' => 13,
			'panel' => 'film_studio_frontpage_sections',
		)
	);

	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_slider_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_slider_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'film-studio' ),
			'section'     => 'slider_setting',
			'settings'    => 'film_studio_slider_setting',
			'type'        => 'checkbox'
		) 
	);

	// Slider Button Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_slider_button_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_slider_button_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Button', 'film-studio' ),
			'section'     => 'slider_setting',
			'settings'    => 'film_studio_slider_button_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Slider 1
	$wp_customize->add_setting( 
    	'slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'slider1',
		array(
		    'label'   		=> __('Slider 1','film-studio'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		

	// Slider 2
	$wp_customize->add_setting(
    	'slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'slider2',
		array(
		    'label'   		=> __('Slider 2','film-studio'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider3',
		array(
		    'label'   		=> __('Slider 3','film-studio'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	/*=========================================
	Latest Movies Section
	=========================================*/

	$wp_customize->add_section(
		'movies_section', array(
			'title' => esc_html__( 'Latest Movies Section', 'film-studio' ),
			'priority' => 14,
			'panel' => 'film_studio_frontpage_sections',
		)
	);
	
	// Slider Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_latest_movie_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_latest_movie_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'film-studio' ),
			'section'     => 'movies_section',
			'settings'    => 'film_studio_latest_movie_setting',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting(
    	'movies_section_title',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'movies_section_title',
		array(
		    'label'   		=> __('Title','film-studio'),
		    'section'		=> 'movies_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'movies_section_btn_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'movies_section_btn_text',
		array(
		    'label'   		=> __('Btn Text','film-studio'),
		    'section'		=> 'movies_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_setting(
    	'movies_section_btn_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'movies_section_btn_link',
		array(
		    'label'   		=> __('Btn Url','film-studio'),
		    'section'		=> 'movies_section',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)
	);

	$film_studio_args = array('numberposts' => -1);
	$post_list = get_posts($film_studio_args);
	$s = 0;
	$pst_sls[]= __('Select','film-studio');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $s = 1; $s <= 8; $s++ ) {
		$wp_customize->add_setting(
			'movies_section_settigs'.$s,
			array(
				'sanitize_callback' => 'film_studio_sanitize_choices',
			)
		);

		$wp_customize->add_control(
			'movies_section_settigs'.$s,
			array(
				'type'    => 'select',
				'choices' => $pst_sls,
				'label' => __('Select post','film-studio'),
				'section' => 'movies_section',
			)
		);
	}
	wp_reset_postdata();
}

add_action( 'customize_register', 'film_studio_blog_setting' );

// service selective refresh
function film_studio_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'film_studio_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'film_studio_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'film_studio_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'film_studio_blog_section_partials' );

// blog_title
function film_studio_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function film_studio_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function film_studio_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}