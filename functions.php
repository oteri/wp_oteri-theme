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
// Load bootstrap in the theme. 
/*Integrating bootstrap in an extension is different:
wp_enqueue_script( 'bootstrap-js', plugins_url( '/bootstrap/js/bootstrap.min.js', __FILE__ ), array( 'jquery' ), null, true );
wp_enqueue_style( 'bootstrap-css',plugins_url( '/bootstrap/css/bootstrap.min.css', __FILE__ ) );
*/
    wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ));
    wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');    
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


//Registers a category for the post about papers
function oteri_paper_post_type() {
	register_post_type('papers',
		array(
			'labels'      => array(
                                'name'          => __( 'Papers', 'textdomain' ),
                                'singular_name' => __( 'Paper',  'textdomain' ),
                            ),
			'public'      => true,
			'has_archive' => true,          
			'rewrite'     => array( 'slug' => 'Papers' ), // my custom slug
            'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}
add_action('init', 'oteri_paper_post_type');

function oteri_software_post_type() {
    register_post_type('software',
        array(
            'labels'      => array(
                                'name'          => __( 'Softwares', 'textdomain' ),
                                'singular_name' => __( 'Software',  'textdomain' ),
                            ),
            'public'      => true,
            'has_archive' => true,          
            'rewrite'     => array( 'slug' => 'Software' ), // my custom slug
            'supports' => array( 'title', 'editor', 'thumbnail' ),
        )
    );
}
add_action('init', 'oteri_software_post_type');
//For debug purpose is inactivated
//add_action( 'after_switch_theme', 'my_rewrite_flush' );
function my_rewrite_flush() {
    oteri_software_post_type();
    oteri_paper_post_type();
    flush_rewrite_rules();
    
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure('/%category%/');
    $wp_rewrite->flush_rules();
}
//For debug purpose it is always executed
my_rewrite_flush();



if ( ! function_exists( 'oteri_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function oteri_setup() {
		/**
		 * Enable support for post thumbnails and featured images for papers blog.
		 */
		add_theme_support( 'post-thumbnails', array( 'papers' ) );
	}
endif; // oteri_setup
add_action( 'after_setup_theme', 'oteri_setup' );
