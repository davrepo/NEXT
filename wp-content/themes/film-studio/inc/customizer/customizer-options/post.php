<?php
function film_studio_post_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'film_studio_post', array(
			'priority' => 31,
			'title' => esc_html__( 'Post Option', 'film-studio' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'archive_post_setting', array(
			'title' => esc_html__( 'Archive Post', 'film-studio' ),
			'priority' => 1,
			'panel' => 'film_studio_post',
		)
	);
	
	// Archive Post Settings 
	$wp_customize->add_setting(
		'archive_post_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'film_studio_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'archive_post_settings',
		array(
			'type' => 'hidden',
			'label' => __('Archive Post Section Setting','film-studio'),
			'section' => 'archive_post_setting',
		)
	);

	// Layouts Post
	$wp_customize->add_setting('film_studio_blog_layout_option_setting',array(
	  'default' => 'Default',
	  'sanitize_callback' => 'film_studio_sanitize_choices'
	));
	$wp_customize->add_control(new Film_Studio_Image_Radio_Control($wp_customize, 'film_studio_blog_layout_option_setting', array(
	  'type' => 'select',
	  'label' => __('Blog Post Layouts','film-studio'),
	  'section' => 'archive_post_setting',
	  'choices' => array(
	      'Default' => esc_url(get_template_directory_uri()).'/assets/images/layout-1.png',
	      'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout-2.png',
	))));
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'film-studio' ),
			'section'     => 'archive_post_setting',
			'settings'    => 'film_studio_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Single Post  Section
	=========================================*/
	$wp_customize->add_section(
		'film_studio_single_post', array(
			'title' => esc_html__( 'Single Post', 'film-studio' ),
			'priority' => 3,
			'panel' => 'film_studio_post',
		)
	);
	
	// Post Heading Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_heading_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_heading_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Heading', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_heading_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Content Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_content_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_content_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Content', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_content_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Featured Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_featured_image_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_featured_image_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Feature Image', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_featured_image_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_date_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_date_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Date', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_date_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_comments_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_comments_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Comment', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_comments_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_author_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_author_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Author', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_author_settings',
			'type'        => 'checkbox'
		) 
	);

	// Post Tags Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_tags_settings' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_tags_settings', 
		array(
			'label'	      => esc_html__( 'Hide / Show Post Tags', 'film-studio' ),
			'section'     => 'film_studio_single_post',
			'settings'    => 'film_studio_single_post_tags_settings',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'film_studio_post_setting' );