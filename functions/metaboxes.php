<?php
function hcfw_metaboxes( $meta_boxes ) {
	$prefix = '_hcfw_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'contactinfo_metabox',
		'title' => 'Contact Information',
		'pages' => array('profiles'), // post type
		'context' => 'side',
		'priority' => 'low',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => 'Direct Phone',
				'desc' => 'Phone number',
				'id' => $prefix . 'tel',
				'type' => 'text'
			),

			array(
				'name' => 'Mobile Phone',
				'desc' => 'Mobile phone number',
				'id' => $prefix . 'mobile',
				'type' => 'text'
			),

			array(
				'name' => 'Email',
				'desc' => 'Email address',
				'id' => $prefix . 'email',
				'type' => 'text'
			),

			array(
				'name' => 'Twitter',
				'desc' => 'Just the Twitter name<br />(not the full url)',
				'id' => $prefix . 'twitter',
				'type' => 'text'
			),
			
			array(
				'name' => 'LinkedIn Url',
				'desc' => 'Enter your LinkedIn url (including \'http://\').',
				'id' => $prefix . 'linkedin',
				'type' => 'text'
			),

		),
	);

	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'hcfw_metaboxes' );

?>