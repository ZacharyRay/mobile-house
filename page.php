<?php  

try {
  ob_start();
  get_header();

  component('hero', [
    'label' => get_field('label'),
    'title' => get_the_title(),
    'lead' => get_field('lead'),
    'body' => get_field('body'),
    'link' => get_field('link'),
    'image' => get_the_post_thumbnail_url('', 'hero'),
    'is_home' => is_front_page()
  ]);

  component('builder', [
    'sidebar' => [
      'show' => get_field('sidebar_show'),
      'resource' => get_field('resource'),
      'department' => get_field('support_department') ?? false
    ],
    'components' => get_field('components')
  ]);

  get_footer();
  ob_flush();
}
catch (Exception $error) {
  ob_clean();
  throw $error;
}
