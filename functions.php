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
 
add_action( 'customize_register', 'oteri_banner_option' );
