<?php

/**
 * Return asset from 'resources'
 */
function get_asset($asset) {
  return get_template_directory_uri() . '/resources' . $asset;
}

/**
 * Dump and die
 */
function dd($data) {
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
  die;
}

/**
 * Move item to index
 */
function move_to_index(&$array, $a, $b) {
  $p1 = array_splice($array, $a, 1);
  $p2 = array_splice($array, 0, $b);
  $array = array_merge($p2,$p1,$array);
}

/**
 * Get menu by location
 */
function get_menu_by_location( $location ) {
  if( empty($location) ) return false;

  $locations = get_nav_menu_locations();
  if( ! isset( $locations[$location] ) ) return false;

  $menu_obj = get_term( $locations[$location], 'nav_menu' );

  return $menu_obj;
}