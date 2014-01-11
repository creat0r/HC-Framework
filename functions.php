<?php

// Load the Options Panel

if ( ! function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/functions/options/' );
	require_once dirname( __FILE__ ) . '/functions/options/options-framework.php';
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 *
 * You can delete it if you not using that option
 */

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function() {

	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});

	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}

});
</script>

<?php
}



// Activate Metaboxes
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'functions/metaboxes/init.php' );
	}
}


include('functions/overrides.php');
include('functions/menus.php');
include('functions/widgets.php');
include('functions/metaboxes.php');

// Enqueue Scripts
function add_hcfw_scripts() {
	wp_register_script('hcfw_modernizer', get_template_directory_uri() . '/assets/js/modernizr.js', array(), 1.0, false);
	//If you want modernier loaded on every page just uncomment it below.
	//wp_enqueue_script('hcfw_modernizer');
	
	wp_register_script('hcfw_functions', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), 1.0, true);
	wp_enqueue_script('hcfw_functions');
	
	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
	
	wp_register_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), 1.0, 'all' );
	wp_enqueue_style( 'style', get_stylesheet_uri(), array('normalize'), 1.0, 'all' );
}
add_action( 'wp_enqueue_scripts', 'add_hcfw_scripts' );  

// Register Custom Post Types
include('functions/post-types/post-types.php');

// Register Post Thumbnails
    if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 250, 250, true );
    }

?>