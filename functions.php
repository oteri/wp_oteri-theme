<?php
function oteri_custom_header_setup() {
	$args = array(
		'default-image'      => get_template_directory_uri() . 'img/default-image.jpg',
		'default-text-color' => '000',
		'width'              => 1280,
		'height'             => 426,
		'flex-width'         => true,
		'flex-height'        => true,
	);
	add_theme_support( 'custom-header', $args );
}

function add_customization_panel($wp_customize){
    $wp_customize->add_panel( 'oteri_option_panel', array(
        'title' => 'Customize oteri theme',
        'description' => 'Customize your site.',
        'capability' => 'edit_theme_options', 
        'theme_supports' => '',
        'active_callback' => ''
    ));
}



//=================================================================
// Add Profile picture Uploader 
//=================================================================
 function oteri_profile_option($wp_customize){
    $wp_customize->add_section( 'oteri_front_page_assets', array(
        'title' => 'Home Page',
        'description' => 'Customize the front page',
        'panel' => 'oteri_option_panel',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'active_callback' => '',
        'description_hidden' => false
    ));

//Profile    
    $wp_customize->add_setting( 'oteri_profile_photo', array(
        'default' => "", // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'oteri_profile_photo', array(
        'label' => 'Upload Profile Photo',
        'section' => 'oteri_front_page_assets',
        'settings' => 'oteri_profile_photo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));

  }

//=================================================================
// Add Description 
//=================================================================
function oteri_description_option($wp_customize){
//Description    
    $wp_customize->add_setting( 'oteri_description' , array(
            'default'           => '',
            'type'              => 'theme_mod',
            'capability'        => 'edit_theme_options',           
        ) );
 
    $wp_customize->add_control( 'oteri_description', array(
            'label'             => 'Description',
            'description'       => 'Put a description of yourself',
            'section'           => 'oteri_front_page_assets',
            'settings'          => 'oteri_description',
            'type'              => 'textarea',
        ) );

  }


 //=================================================================
 // Add Social network profiles
 //=================================================================
 function oteri_social_network_options($wp_customize){
    $wp_customize->add_section( 'oteri_customization', array(
        'title' => 'Social network profiles',
        'description' => 'Add the Social Network Profiles to show on the Home Page',
        'panel' => 'oteri_option_panel',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'active_callback' => '',
        'description_hidden' => false
    ));


    $supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium"); 
    foreach ($supported_social_networks as $network) {          
            $name = 'oteri_'. strtolower($network);       
            $wp_customize->add_setting( $name, array(
                'default' => null,
                'sanitize_callback' => 'esc_url_raw'
            ));
            $wp_customize->add_control( $name, array(
                'label' => $network,
                'section' => 'oteri_customization',
                'settings' => $name,
                'type' => 'text',
                'input_attrs' => array( 'placeholder' => 'Account URL' )
            ));
    }
}

add_action( 'after_setup_theme',  'oteri_custom_header_setup' );
add_action( 'customize_register', 'add_customization_panel' );
add_action( 'customize_register', 'oteri_profile_option' );
add_action( 'customize_register', 'oteri_description_option' );
add_action( 'customize_register', 'oteri_social_network_options' );



function add_theme_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

//	wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all' );
	//wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), 1.1, true );
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


//Registers a category for the post about papers
function oteri_paper_post_type() {
	register_post_type('Paper',
		array(
			'labels'      => array(
				'name'          => __( 'Papers', 'textdomain' ),
				'singular_name' => __( 'Paper',  'textdomain' ),
			),
			'public'      => true,
			'has_archive' => false, //true
//			'rewrite'     => array( 'slug' => 'papers' ), // my custom slug
		)
	);
}
add_action('init', 'oteri_paper_post_type');

function oteri_software_post_type() {
    //Registers a category for the post about papers
	register_post_type('Software',
		array(
			'labels'      => array(
				'name'          => __( 'Softwares', 'textdomain' ),
				'singular_name' => __( 'software',  'textdomain' ),
			),
			'public'      => true,
			'has_archive' => false, //true
//			'rewrite'     => array( 'slug' => 'software' ), // my custom slug
		)
	);
}
add_action('init', 'oteri_software_post_type');

