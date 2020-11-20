<?php

function employee_post_type() {

	$labels = array(
		'name'                  => _x( 'Employees', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Employee', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Employees', 'text_domain' ),
		'name_admin_bar'        => __( 'Employees', 'text_domain' ),
		'archives'              => __( 'Employee Archives', 'text_domain' ),
		'attributes'            => __( 'Employee Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Employee:', 'text_domain' ),
		'all_items'             => __( 'All Employees', 'text_domain' ),
		'add_new_item'          => __( 'Add New Employee', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Employee', 'text_domain' ),
		'edit_item'             => __( 'Edit Employee', 'text_domain' ),
		'update_item'           => __( 'Update Employee', 'text_domain' ),
		'view_item'             => __( 'View Employee', 'text_domain' ),
		'view_items'            => __( 'View Employee', 'text_domain' ),
		'search_items'          => __( 'Search Employee', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Employee', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Employee', 'text_domain' ),
		'items_list'            => __( 'Employees list', 'text_domain' ),
		'items_list_navigation' => __( 'Employees list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Employees list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Employee', 'text_domain' ),
		'description'           => __( 'Employee Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_icon'             => 'dashicons-groups',
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'employee', $args );

	$department_labels = array(
    'name' => _x( 'Departments', 'taxonomy general name' ),
    'singular_name' => _x( 'Department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Departments' ),
    'all_items' => __( 'All Departments' ),
    'parent_item' => __( 'Parent Department' ),
    'parent_item_colon' => __( 'Parent Department:' ),
    'edit_item' => __( 'Edit Department' ), 
    'update_item' => __( 'Update Department' ),
    'add_new_item' => __( 'Add New Department' ),
    'new_item_name' => __( 'New Department Name' ),
    'menu_name' => __( 'Departments' ),
  );
 
  register_taxonomy('employee_department', array('employee'), array(
    'hierarchical' => true,
    'labels' => $department_labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'afdeling' ),
  ));

}
add_action( 'init', 'employee_post_type', 0 );