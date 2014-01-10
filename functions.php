<?php

// Enqueue Scripts
function add_skunkyfw_scripts() {
	wp_register_script('skunkyfw_functions', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), 1.0, true);
	wp_enqueue_script('skunkyfw_functions');
}
add_action( 'wp_enqueue_scripts', 'add_skunkyfw_scripts' );  


// Register Post Thumbnails
    if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 250, 250, true );
    }


?>