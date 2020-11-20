<?php 

get_header();

$post_type = get_post_type();
$taxonomy =  get_object_taxonomies( $post_type )[0];
$term_id = $taxonomy && property_exists(get_queried_object(), 'term_id') ? get_queried_object()->term_id : false;
$term = $term_id ? get_term($term_id) : false;
$term_name = $term ? $term->name : 'Filtrér efter kategori';

$args = [
  'post_type' => $post_type,
  'posts_per_page' => -1,
  'post_status' => 'publish',
  'tax_query' => $term_id && $taxonomy ? array(
    array(
      'taxonomy' => $taxonomy,
      'field' => 'term_id',
      'terms' => $term_id,
    )
   ) : []
];

$terms = get_terms([ 
  'taxonomy' => $taxonomy,
  'hide_empty' => false
]);

if(($term_id && $taxonomy && get_field('show_hero', $taxonomy . '_' . $term_id)) || ($taxonomy && get_field($post_type . '_show_hero', 'option'))):
  component('hero', [
    'title' => $term_name !== 'Filtrér efter kategori' ? $term_name : get_field($post_type . '_title', 'option'),
    'lead' => $taxonomy && $term_id ? get_field('lead', $taxonomy . '_' . $term_id) : get_field($post_type . '_lead', 'option'),
    'body' => $term_id ? term_description($term_id) : get_field($post_type . '_body', 'option'),
    'image' => get_field($post_type . '_image', 'option')['sizes']['hero']
  ]);
endif;

if($post_type === 'module'):

  $args['meta_key'] = 'is_featured';
	$args['orderby'] ='meta_value';
  $args['order'] = 'DESC';
  
  component('archive-modules', [
    'title' => get_field($post_type . '_title', 'option'),
    'query' => new WP_Query($args),
    'terms' => $terms,
    'current_term' => [
      'id' => $term_id,
      'name' => $term_name
    ]
  ]);
else:
  component('archive-default', [
    'title' => get_field($post_type . '_title', 'option'),
    'query' => new WP_Query($args),
    'terms' => $terms,
    'current_term' => [
      'id' => $term_id,
      'name' => $term_name
    ]
  ]);
endif;

get_footer();