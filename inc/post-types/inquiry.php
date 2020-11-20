<?php

function inquiry_post_type() {

	$labels = array(
		'name'                  => _x( 'Inquiries', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Inquiry', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Inquiries', 'text_domain' ),
		'name_admin_bar'        => __( 'Inquiries', 'text_domain' ),
		'archives'              => __( 'Inquiry Archives', 'text_domain' ),
		'attributes'            => __( 'Inquiry Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Inquiry:', 'text_domain' ),
		'all_items'             => __( 'All Inquiries', 'text_domain' ),
		'add_new_item'          => __( 'Add New Inquiry', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Inquiry', 'text_domain' ),
		'edit_item'             => __( 'Edit Inquiry', 'text_domain' ),
		'update_item'           => __( 'Update Inquiry', 'text_domain' ),
		'view_item'             => __( 'View Inquiry', 'text_domain' ),
		'view_items'            => __( 'View Inquiry', 'text_domain' ),
		'search_items'          => __( 'Search Inquiry', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Inquiry', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Inquiry', 'text_domain' ),
		'items_list'            => __( 'Inquiries list', 'text_domain' ),
		'items_list_navigation' => __( 'Inquiries list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Inquiries list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Inquiry', 'text_domain' ),
		'description'           => __( 'Inquiry Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-admin-comments',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
	);
	register_post_type( 'inquiry', $args );

}
add_action( 'init', 'inquiry_post_type', 0 );