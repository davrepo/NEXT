<?php
function film_studio_header_settings( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';


    // Site Title Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_site_title_setting' , 
			array(
			'default' => '1',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_site_title_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Site Title', 'film-studio' ),
			'section'     => 'title_tagline',
			'settings'    => 'film_studio_site_title_setting',
			'type'        => 'checkbox'
		) 
	);

	// Tagline Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'film_studio_tagline_setting' , 
			array(
			'default' => '',
			'sanitize_callback' => 'film_studio_sanitize_checkbox',
			'capability' => 'edit_theme_options',
		) 
	);
	
	$wp_customize->add_control(
	'film_studio_tagline_setting', 
		array(
			'label'	      => esc_html__( 'Hide / Show Tagline', 'film-studio' ),
			'section'     => 'title_tagline',
			'settings'    => 'film_studio_tagline_setting',
			'type'        => 'checkbox'
		) 
	);

	// Add the setting for logo width
	$wp_customize->add_setting(
	    'film_studio_logo_width',
	    array(
	        'default'           => '150',
	        'sanitize_callback' => 'film_studio_sanitize_logo_width',
	        'priority'          => 2,
	    )
	);

	// Add control for logo width
	$wp_customize->add_control( 
	    'film_studio_logo_width',
	    array(
	        'label'     => __('Logo Width', 'film-studio'),
	        'section'   => 'title_tagline',
	        'type'      => 'number',
	        'input_attrs' => array(
	            'min'   => 1,
	            'max'   => 150,
	            'step'  => 1,
	        ),
	        'transport' => $selective_refresh,
	    )  
	);

	/*=========================================
	Header Settings Panel
	=========================================*/
	$wp_customize->add_panel( 
		'header_section', 
		array(
			'priority'      => 2,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Header', 'film-studio'),
		) 
	);

	/*=========================================
	Film Studio Site Identity
	=========================================*/
	$wp_customize->add_section(
        'title_tagline',
        array(
        	'priority'      => 1,
            'title' 		=> __('Site Identity','film-studio'),
			'panel'  		=> 'header_section',
		)
    );    

	/*=========================================
	Top header
	=========================================*/
	$wp_customize->add_section(
        'top_header',
        array(
        	'priority'      => 2,
            'title' 		=> __('Header','film-studio'),
			'panel'  		=> 'header_section',
		)
    );

	// general setting

   	$wp_customize->add_setting(
    	'film_studio_topheader_btn_text',
    	array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);	
	$wp_customize->add_control( 
		'film_studio_topheader_btn_text',
		array(
		    'label'   		=> __('Header Btn Text','film-studio'),
		    'section'		=> 'top_header',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);

   	$wp_customize->add_setting(
    	'film_studio_topheader_btn_link',
    	array(
			'default' => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);	
	$wp_customize->add_control( 
		'film_studio_topheader_btn_link',
		array(
		    'label'   		=> __('Header Btn Link','film-studio'),
		    'section'		=> 'top_header',
			'type' 			=> 'url',
			'transport'         => $selective_refresh,
		)  
	);

	$wp_customize->register_panel_type( 'film_studio_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'film_studio_WP_Customize_Section' );

}
add_action( 'customize_register', 'film_studio_header_settings' );


if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class film_studio_WP_Customize_Panel extends WP_Customize_Panel {
	   public $panel;
	   public $type = 'film_studio_panel';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class film_studio_WP_Customize_Section extends WP_Customize_Section {
	   public $section;
	   public $type = 'film_studio_section';
	   public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}