<?php 

try {
  ob_start();
  get_header();

  $custom_components = [];

  if(!get_field('sidebar_show')) {
    $custom_components[] = [
      'data' => [
        'acf_fc_layout' => 'call_to_action_contact',
        'department' => get_field('support_department') ?? false,
        'bg' => 'bg-red-1'
      ]
    ];
  }

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
    'components' => get_field('components'),
    'custom_components' => $custom_components
  ]);

  get_footer();
  ob_flush();
}
catch (Exception $error) {
  ob_clean();
  throw $error;
}
