<?php

get_header();

component('hero', [
  'title' => get_the_title( get_option('page_for_posts', true) ),
  'lead' => get_field('lead', get_option('page_for_posts', true)),
  'body' => get_field('body', get_option('page_for_posts', true)),
  'image' => get_the_post_thumbnail_url(get_option('page_for_posts', true), 'hero')
]);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
  'post_type' => 'post',
  'posts_per_page' => 20,
  'post_status' => 'publish'
];

$terms = get_terms([ 
  'taxonomy' => 'category',
  'hide_empty' => false
]);

$query = new WP_Query($args);

component('archive-default', [
  'title' => get_the_title( get_option('page_for_posts', true) ),
  'query' => $query,
  'terms' => $terms
]);

get_footer();
