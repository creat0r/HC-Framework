<?php

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Remove WordPress version number from header
function hcfw_remove_version() {
	return '';
}
add_filter('the_generator', 'hcfw_remove_version');

// Remove width and height attributes from img tags
// See http://www.paulund.co.uk/remove-width-and-height-attributes-from-images
add_filter( 'get_image_tag', 'remove_width_and_height_attribute', 10 );
add_filter( 'post_thumbnail_html', 'remove_width_and_height_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_and_height_attribute', 10 );
function remove_width_and_height_attribute( $html ) {
	return preg_replace( '/(height|width)="\d*"\s/', "", $html );
}


// Rearrange the admin menu
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	return array(
		'index.php', // Dashboard
		'edit.php?post_type=page', // Pages
		'edit.php?post_type=members', // Member Profiles
		'edit.php?post_type=news', // Organization News
		'edit.php', // Posts
		'separator1', // First separator
		'upload.php', // Media
		'link-manager.php', // Links
		'edit-comments.php', // Comments
		'separator2', // Second separator
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
		'separator-last', // Last separator
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');

// Relabel admin menu items
function edit_admin_menus() {
	global $menu;
	$menu[5][0] = 'Blog Posts'; // Change Posts to Blog Posts
}
add_action( 'admin_menu', 'edit_admin_menus' );

// Disable default link to images when adding through the Media editor
add_action('pre_option_image_default_link_type', 'always_link_images_to_none');
function always_link_images_to_none() {
	return 'none';
}

// Remove unnecessary default widgets
function remove_some_wp_widgets() {
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Widget_Calendar');
}
add_action('widgets_init', remove_some_wp_widgets, 1);

?>