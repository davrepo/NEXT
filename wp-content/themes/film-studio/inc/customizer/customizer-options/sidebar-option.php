<?php
function film_studio_sidebar_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'film_studio_sidebar', array(
			'priority' => 31,
			'title' => esc_html__( 'Sidebar Option', 'film-studio' ),
		)
	);

	/*=========================================
	Archive Post  Section
	=========================================*/
	$wp_customize->add_section(
		'film_studio_sidebar_settings', array(
			'title' => esc_html__( 'Sidebar Option', 'film-studio' ),
			'priority' => 1,
			'panel' => 'film_studio_sidebar',
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
			'label' => __('All Sidebar Setting','film-studio'),
			'section' => 'film_studio_sidebar_settings',
		)
	);
	

	// Archive Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_archive_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_archive_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Archive Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_archive_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Index Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_index_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_index_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Index Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_index_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Pages Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_paged_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_paged_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Pages Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_paged_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Search Result Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_search_result_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_search_result_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Search Result Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_search_result_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Single Post Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_post_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_post_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Single Post Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_single_post_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);

	// Sidebar Page Sidebar Date Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_single_page_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_single_page_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Page Width Sidebar', 'film-studio' ),
			'section'     => 'film_studio_sidebar_settings',
			'settings'    => 'film_studio_single_page_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);
}

add_action( 'customize_register', 'film_studio_sidebar_setting' );