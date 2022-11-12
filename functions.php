<?php 
 function oteri_banner_option($wp_customize){
//=================================================================
// Add Banner Uploader 
//=================================================================
    $wp_customize->add_setting( 'oteri_banner', array(
        'default' => get_theme_file_uri('assets/image/banner.jpg'), // Add Default Image URL 
        'sanitize_callback' => 'esc_url_raw'
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'oteri_banner_control', array(
        'label' => 'Upload Banner',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'oteri_banner',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select Banner',
                    'remove' => 'Remove Banner',
                    'change' => 'Change Banner',
                    )
    )));
 }

 function oteri_social_network_options($wp_customize){
    $supported_social_networks = array("Github", "Linkedin", "Twitter", "Medium");

    //=================================================================
    // Add Social network profiles
    //=================================================================
    $wp_customize->add_panel( 'oteri_option_panel', array(
        'title' => 'Social Networks',
        'description' => 'oteri Options help you to customize your site.',
        'capability' => 'edit_theme_options', 
        'theme_supports' => '',
        'active_callback' => ''
    ));

    $wp_customize->add_section( 'oteri_social_network_section', array(
        'title' => 'Profiles',
        'description' => 'Add the Social Network Profiles to show on the Home Page',
        'panel' => 'oteri_option_panel',
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'active_callback' => '',
        'description_hidden' => false
    ));

    foreach ($supported_social_networks as $network) {          
            $name = 'oteri_'. strtolower($network);       
            $wp_customize->add_setting( $name, array(
                'default' => null,
                'sanitize_callback' => 'esc_url_raw'
            ));
            $wp_customize->add_control( $name, array(
                'label' => $network,
                'section' => 'oteri_social_network_section',
                'settings' => $name,
                'type' => 'text',
                'input_attrs' => array( 'placeholder' => 'Account URL' )
            ));
    }
}

add_action( 'customize_register', 'oteri_banner_option' );
add_action( 'customize_register', 'oteri_social_network_options' );
