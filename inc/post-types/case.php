<?php

function case_post_type() {

	$labels = array(
		'name'                  => _x( 'Cases', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Case', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Cases', 'text_domain' ),
		'name_admin_bar'        => __( 'Cases', 'text_domain' ),
		'archives'              => __( 'Case Archives', 'text_domain' ),
		'attributes'            => __( 'Case Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Case:', 'text_domain' ),
		'all_items'             => __( 'All Cases', 'text_domain' ),
		'add_new_item'          => __( 'Add New Case', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Case', 'text_domain' ),
		'edit_item'             => __( 'Edit Case', 'text_domain' ),
		'update_item'           => __( 'Update Case', 'text_domain' ),
		'view_item'             => __( 'View Case', 'text_domain' ),
		'view_items'            => __( 'View Case', 'text_domain' ),
		'search_items'          => __( 'Search Case', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Case', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Case', 'text_domain' ),
		'items_list'            => __( 'Cases list', 'text_domain' ),
		'items_list_navigation' => __( 'Cases list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Cases list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Case', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-archive',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'case', $args );

	$tax_labels = array(
    'name' => _x( 'Categories', 'taxonomy general name' ),
    'singular_name' => _x( 'Category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Categories' ),
    'all_items' => __( 'All Categories' ),
    'parent_item' => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item' => __( 'Edit Category' ), 
    'update_item' => __( 'Update Category' ),
    'add_new_item' => __( 'Add New Category' ),
    'new_item_name' => __( 'New Category Name' ),
    'menu_name' => __( 'Categories' ),
  );
 
  register_taxonomy('case_category', array('case'), array(
    'hierarchical' => true,
    'labels' => $tax_labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'case-kategori' ),
  ));

}
add_action( 'init', 'case_post_type', 0 );