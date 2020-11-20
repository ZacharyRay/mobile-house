<?php 

try {
  ob_start();
  get_header();

  $post_id = get_the_ID();
  $cat_ids = array();
  $categories = get_the_category( $post_id );

  if(!empty($categories) && !is_wp_error($categories)):
    foreach ($categories as $category):
      array_push($cat_ids, $category->term_id);
    endforeach;
  endif;

  $args = [ 
    'category__in'   => $cat_ids,
    'post_type'      => 'post',
    'post__not_in'    => [$post_id],
    'posts_per_page'  => '3'
  ];

  $related_posts = new WP_Query( $args );

  component('hero', [
    'label' => get_field('label'),
    'title' => get_the_title(),
    'lead' => get_field('lead'),
    'body' => get_field('body'),
    'link' => get_field('link'),
    'image' => get_the_post_thumbnail_url('', 'hero'),
  ]);

  component('builder', [
    'sidebar' => [
      'show' => get_field('sidebar_show'),
      'resource' => get_field('resource'),
      'department' => get_field('support_department') ?? false
    ],
    'components' => get_field('components')
  ]);

  if($related_posts->have_posts()):
    echo '<div class="related px-body component-has-no-bg"><h3 class="mb-5 fs-32">Relaterede artikler</h3><div class="row">';
    while($related_posts->have_posts()): $related_posts->the_post();
      echo '<div class="col-md-4">';
        $excerpt = get_the_excerpt() !== '' ? get_the_excerpt() : get_the_content();
        $excerpt = strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;
        $term = get_the_category()[0]->name;
        
        component('post', [
          'label' => $term,
          'title' => get_the_title(),
          'thumbnail' => get_the_post_thumbnail_url('', 'column'),
          'excerpt' => $excerpt,
          'body' => get_the_content(),
          'url' => get_the_permalink(),
          'show_arrow' => false,
          'date' => get_the_time('d-m-Y'),
        ]);
      echo '</div>';
    endwhile;
   wp_reset_postdata();
   echo '</div></div>';
  endif;
  ?>

  <?php

  get_footer();
  ob_flush();
}
catch (Exception $error) {
  ob_clean();
  throw $error;
}
