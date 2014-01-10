<?php

// Lawyer Bios
add_action('init', 'profiles');
	function profiles() {
	$labels = array(
	    'name' => _x('Profiles', 'post type general name'),
    	'singular_name' => _x('Profile', 'post type singular name'),
    	'add_new' => _x('Add New', 'Profile'),
    	'add_new_item' => __('Add New Profile'),
    	'edit_item' => __('Edit Profile'),
    	'new_item' => __('New Profile'),
    	'all_items' => __('All Profiles'),
    	'view_item' => __('View Profiles'),
    	'search_items' => __('Search Profiles'),
    	'not_found' =>  __('No Profiles found. Why not add some?'),
    	'not_found_in_trash' => __('No Profiles found in trash'), 
    	'parent_item_colon' => '',
    	'menu_name' => 'Profiles'
	);

	$args = array(
    	'labels' => $labels,
    	'public' => true,
    	'publicly_queryable' => true,
    	'show_ui' => true, 
    	'show_in_menu' => true, 
    	'query_var' => true,
    	'rewrite' => true,
    	'capability_type' => 'post',
    	'has_archive' => true,
		'rewrite' => array('slug' => 'profiles'),
    	'hierarchical' => false,
    	'menu_position' => null,
    	'supports' => array('title', 'custom-fields', 'editor', 'revisions', 'author', 'excerpt', 'thumbnail','excerpt', 'page-attributes'),
		'can_export' => true
  	);
	register_post_type('profiles',$args);
}


?>