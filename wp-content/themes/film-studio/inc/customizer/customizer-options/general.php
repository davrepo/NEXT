<?php
function film_studio_general_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'film_studio_general', array(
			'priority' => 31,
			'title' => esc_html__( 'General', 'film-studio' ),
		)
	);

	/*=========================================
	Breadcrumb  Section
	=========================================*/
	$wp_customize->add_section(
		'breadcrumb_setting', array(
			'title' => esc_html__( 'Breadcrumb Section', 'film-studio' ),
			'priority' => 1,
			'panel' => 'film_studio_general',
		)
	);
	
	// Settings 
	$wp_customize->add_setting(
		'breadcrumb_settings'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'film_studio_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'breadcrumb_settings',
		array(
			'type' => 'hidden',
			'label' => __('Breadcrumb Settings','film-studio'),
			'section' => 'breadcrumb_setting',
		)
	);
	
	// Breadcrumb Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'hs_breadcrumb' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control(
	'hs_breadcrumb', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'film-studio' ),
			'section'     => 'breadcrumb_setting',
			'settings'    => 'hs_breadcrumb',
			'type'        => 'checkbox'
		) 
	);
	/*=========================================
	Preloader Section
	=========================================*/
	$wp_customize->add_section(
		'preloader_section_setting', array(
			'title' => esc_html__( 'Preloader', 'film-studio' ),
			'priority' => 3,
			'panel' => 'film_studio_general',
		)
	);

	// Preloader Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_preloader_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_preloader_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Preloader', 'film-studio' ),
			'section'     => 'preloader_section_setting',
			'settings'    => 'film_studio_preloader_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Scroll To Top Section
	=========================================*/
	$wp_customize->add_section(
		'scroll_to_top_section_setting', array(
			'title' => esc_html__( 'Scroll To Top', 'film-studio' ),
			'priority' => 3,
			'panel' => 'film_studio_general',
		)
	);

	// Scroll To Top Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_scroll_top_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_scroll_top_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Scroll To Top', 'film-studio' ),
			'section'     => 'scroll_to_top_section_setting',
			'settings'    => 'film_studio_scroll_top_setting',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	Woocommerce Section
	=========================================*/
	$wp_customize->add_section(
		'woocommerce_section_setting', array(
			'title' => esc_html__( 'Woocommerce Settings', 'film-studio' ),
			'priority' => 3,
			'panel' => 'film_studio_general',
		)
	);

	// Add the setting for product columns
	$wp_customize->add_setting(
	    'film_studio_custom_shop_per_columns',
	    array(
	        'default'           => '3',
	        'sanitize_callback' => 'film_studio_sanitize_numeric_input',
	    )
	);

	// Add control for product columns
	$wp_customize->add_control( 
	    'film_studio_custom_shop_per_columns',
	    array(
	        'label'     => __('Product Per Columns', 'film-studio'),
	        'section'   => 'woocommerce_section_setting',
	        'type'      => 'number', // Change type to number
	        'input_attrs' => array(
	            'min'   => 1, // Optional: set minimum allowed value
	            'max'	=> 4,
	            'step'  => 1, // Optional: set step size
	        ),
	        'transport' => $selective_refresh,
	    )  
	);

	$wp_customize->add_setting(
    	'film_studio_custom_shop_product_per_page',
    	array(
			'default' => '9',
			'sanitize_callback' => 'film_studio_sanitize_numeric_input',
		)
	);	
	$wp_customize->add_control( 
		'film_studio_custom_shop_product_per_page',
		array(
		    'label'   		=> __('Product Per Page','film-studio'),
		    'section'		=> 'woocommerce_section_setting',
			'type'      => 'number', // Change type to number
	        'input_attrs' => array(
	            'min'   => 1, // Optional: set minimum allowed value
	            'step'  => 1, // Optional: set step size
	        ),
	        'transport' => $selective_refresh,
		)  
	);

	// Woocommerce Sidebar Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_wocommerce_sidebar_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_wocommerce_sidebar_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Woocommerce Sidebar', 'film-studio' ),
			'section'     => 'woocommerce_section_setting',
			'settings'    => 'film_studio_wocommerce_sidebar_setting',
			'type'        => 'checkbox'
		) 
	);
	/*=========================================
	Sticky Header Section
	=========================================*/
	$wp_customize->add_section(
		'sticky_header_section_setting', array(
			'title' => esc_html__( 'Sticky Header Settings', 'film-studio' ),
			'priority' => 3,
			'panel' => 'film_studio_general',
		)
	);

	// Sticky Header Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_sticky_header' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_sticky_header', 
		array(
			'label'	      => esc_html__( 'Hide / Show Sticky Header', 'film-studio' ),
			'section'     => 'sticky_header_section_setting',
			'settings'    => 'film_studio_sticky_header',
			'type'        => 'checkbox'
		) 
	);

	/*=========================================
	404 Section
	=========================================*/
	$wp_customize->add_section(
		'film_studio_404_section', array(
			'title' => esc_html__( '404 Section', 'film-studio' ),
			'priority' => 1,
			'panel' => 'film_studio_general',
		)
	);

	$wp_customize->add_setting(
    	'film_studio_404_title',
    	array(
			'default' => '404',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'film_studio_404_title',
		array(
		    'label'   		=> __('404 Heading','film-studio'),
		    'section'		=> 'film_studio_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'film_studio_404_Text',
    	array(
			'default' => 'Page Not Found',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'film_studio_404_Text',
		array(
		    'label'   		=> __('404 Title','film-studio'),
		    'section'		=> 'film_studio_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->add_setting(
    	'film_studio_404_content',
    	array(
			'default' => 'The page you were looking for could not be found.',
			'sanitize_callback' => 'sanitize_text_field',
			'priority' => 2,
		)
	);	
	$wp_customize->add_control( 
		'film_studio_404_content',
		array(
		    'label'   		=> __('404 Content','film-studio'),
		    'section'		=> 'film_studio_404_section',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
}

add_action( 'customize_register', 'film_studio_general_setting' );