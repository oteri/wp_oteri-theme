<?php 
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
// Add Banner and Profile picture Uploader 
//=================================================================
 function oteri_banner_option($wp_customize){
    $wp_customize->add_section( 'oteri_front_page_assets', array(
        'title' => 'Home Page',
        'description' => 'Customize the front page',
        'panel' => 'oteri_option_panel',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'active_callback' => '',
        'description_hidden' => false
    ));

//Banner
    $wp_customize->add_setting( 'oteri_banner', array(
        'default' => "", // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'oteri_banner_control', array(
        'label' => 'Upload Banner',
        'section' => 'oteri_front_page_assets',
        'settings' => 'oteri_banner',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Image',
                    'remove' => 'Remove Image',
                    'change' => 'Change Image',
                    )
    )));


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
add_action( 'customize_register', 'add_customization_panel' );
add_action( 'customize_register', 'oteri_banner_option' );
add_action( 'customize_register', 'oteri_social_network_options' );
