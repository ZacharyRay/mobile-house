<?php

/**
 * Include files
 */
$files = array_merge(glob(__DIR__ . '/bootstrap/**/*.php'), glob(__DIR__ . '/bootstrap/*.php'), glob(__DIR__ . '/inc/**/*.php'), glob(__DIR__ . '/inc/*.php'));

foreach ($files as $file) {
  if ($file != __FILE__) {
    require $file;
  }
}

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
    'page_title' 	=> 'Settings',
    'menu_title'	=> 'Settings',
    'menu_slug' 	=> 'case-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'parent'      => 'edit.php?post_type=case'
  ));
  
  acf_add_options_page(array(
    'page_title' 	=> 'Settings',
    'menu_title'	=> 'Settings',
    'menu_slug' 	=> 'module-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'parent'      => 'edit.php?post_type=module'
  ));
  
  acf_add_options_page(array(
    'page_title' 	=> 'Settings',
    'menu_title'	=> 'Settings',
    'menu_slug' 	=> 'employee-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'parent'      => 'edit.php?post_type=employee'
  ));
  
  acf_add_options_page(array(
    'page_title' 	=> 'Settings',
    'menu_title'	=> 'Settings',
    'menu_slug' 	=> 'document-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
    'parent'      => 'edit.php?post_type=document'
  ));
  
  acf_add_options_page(array(
    'page_title' 	=> 'Theme Settings',
    'menu_title'	=> 'Theme Settings',
    'menu_slug' 	=> 'theme-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false,
	));
}

function mailtrap($phpmailer) {
  $phpmailer->isSMTP();
  $phpmailer->Host = 'smtp.mailtrap.io';
  $phpmailer->SMTPAuth = true;
  $phpmailer->Port = 2525;
  $phpmailer->Username = 'c7067f36f3dbee';
  $phpmailer->Password = 'e6dbb4624b5b8b';
}

add_action('phpmailer_init', 'mailtrap');