<?php

function film_studio_footer( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	// Footer Panel // 
	$wp_customize->add_panel( 
		'film_studio_footer_section', 
		array(
			'priority'      => 34,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Footer', 'film-studio'),
		) 
	);

	// Footer Widgets // 
	$wp_customize->add_section(
        'film_studio_footer_top',
        array(
            'title' 		=> __('Footer Widgets','film-studio'),
			'panel'  		=> 'film_studio_footer_section',
			'priority'      => 3,
		)
    );

    // Footer Widgets Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_footer_widgets_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_footer_widgets_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Widgets', 'film-studio' ),
			'section'     => 'film_studio_footer_top',
			'settings'    => 'film_studio_footer_widgets_setting',
			'type'        => 'checkbox'
		) 
	);

	// Footer Bottom // 
	$wp_customize->add_section(
        'film_studio_footer_bottom',
        array(
            'title' 		=> __('Footer Bottom','film-studio'),
			'panel'  		=> 'film_studio_footer_section',
			'priority'      => 3,
		)
    );

    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_footer_copyright_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_footer_copyright_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Footer Copytight', 'film-studio' ),
			'section'     => 'film_studio_footer_bottom',
			'settings'    => 'film_studio_footer_copyright_setting',
			'type'        => 'checkbox'
		) 
	);
	
	// Footer Copyright Head
	$wp_customize->add_setting(
		'footer_btm_copy_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'film_studio_sanitize_text',
			'priority'  => 3,
		)
	);
	
	// Footer Copyright 
	$film_studio_foo_copy = esc_html__('Copyright &copy; 2023,Film Studio WordPress Theme', 'film-studio' );
	$wp_customize->add_setting(
    	'film_studio_footer_copyright',
    	array(
			'default' => $film_studio_foo_copy,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);

	$wp_customize->add_control( 
		'film_studio_footer_copyright',
		array(
		    'label'   		=> __('Copytight','film-studio'),
		    'section'		=> 'film_studio_footer_bottom',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);
}
add_action( 'customize_register', 'film_studio_footer' );

// Footer selective refresh
function film_studio_footer_partials( $wp_customize ){
	// footer_copyright
	$wp_customize->selective_refresh->add_partial( 'footer_copyright', array(
		'selector'            => '.copy-right .copyright-text',
		'settings'            => 'footer_copyright',
		'render_callback'  => 'film_studio_footer_copyright_render_callback',
	) );
}
add_action( 'customize_register', 'film_studio_footer_partials' );

// copyright_content
function film_studio_footer_copyright_render_callback() {
	return get_theme_mod( 'footer_copyright' );
}