<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {


	// Typography Defaults
	$heading_defaults = array(
		'size' => '22px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	$bodytext_defaults = array(
		'size' => '15px',
		'face' => 'arial',
		'style' => 'normal',
		'color' => '#000000' );

	// Typography Options
	$heading_options = array(
		'sizes' => array( '18','20','22','24','26', '28', '30', '32', '34', '36', '38', '40', '42', '44', '46', '48' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	$bodytext_options = array(
		'sizes' => array( '12','14','16','18','20', '22', '24' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);


	$options[] = array(
		'name' => __('General Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'desc' => __('This is just some example information you can put in the panel.', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Your Logo', 'options_framework_theme'),
		'desc' => __('Upload your logo here.', 'options_framework_theme'),
		'type' => 'info');


	// For Adding a Image or Text Logo

	$options[] = array(
		'id' => 'hcfw_logo',
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Or use custom text instead.', 'options_framework_theme'),
		'type' => 'info');

	$options[] = array(
		'id' => 'hcfw_text_title',
		'std' => '',
		'type' => 'text');


	// For Linking Social Media Accounts

	$options[] = array(
		'name' => __('Social Media', 'options_framework_theme'),
		'desc' => __('Enter the complete urls to any social media accounts you use in the fields below.', 'options_framework_theme'),
		'type' => 'info');


	$options[] = array(
		'desc' => __('Twitter', 'options_framework_theme'),
		'id' => 'hcfw_twitter_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Google Plus', 'options_framework_theme'),
		'id' => 'hcfw_googleplus_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Facebook Page', 'options_framework_theme'),
		'id' => 'hcfw_facebook_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('LinkedIn Page', 'options_framework_theme'),
		'id' => 'hcfw_linkedin_url',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'desc' => __('YouTube Channel', 'options_framework_theme'),
		'id' => 'hcfw_youtube_url',
		'std' => '',
		'type' => 'text');


	$options[] = array(
		'name' => __('Style Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array( 'name' => __('H1 Headings', 'options_framework_theme'),
		'id' => "hcfw_h1_headings",
		'std' => $heading_defaults,
		'type' => 'typography',
		'options' => $heading_options );

	$options[] = array( 'name' => __('H2 Headings', 'options_framework_theme'),
		'id' => "hcfw_h2_headings",
		'std' => $heading_defaults,
		'type' => 'typography',
		'options' => $heading_options );

	$options[] = array( 'name' => __('H3 Headings', 'options_framework_theme'),
		'id' => "hcfw_h3_headings",
		'std' => $heading_defaults,
		'type' => 'typography',
		'options' => $heading_options );

	$options[] = array( 'name' => __('Body Text', 'options_framework_theme'),
		'id' => "hcfw_body_text",
		'std' => $bodytext_defaults,
		'type' => 'typography',
		'options' => $bodytext_options );



	$options[] = array(
		'name' => __('Custom CSS', 'options_framework_theme'),
		'desc' => __('Add custom CSS here.', 'options_framework_theme'),
		'id' => 'hcfw_custom_css',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Custom JavaScript', 'options_framework_theme'),
		'desc' => __('Add custom JavaScript here.', 'options_framework_theme'),
		'id' => 'hcfw_custom_javascript',
		'std' => '',
		'type' => 'textarea');




	return $options;
}