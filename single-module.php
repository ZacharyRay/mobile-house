<?php  

try {
  ob_start();

  if($_POST['type'] === 'inquiry'): 
    create_inquiry($_POST);
  else:
    component('inquiry-modal', [
      'id' => get_the_ID()
    ]);
  endif;
  
  get_header();

  $price = [
    'key' => get_field('prices')['rent'] ? 'Lejepris pr. md.' : 'Salgspris',
    'value' => 0
  ];

  if(get_field('prices')['buy']) {
    $price['value'] = number_format( round((int) get_field('prices')['buy']) , 0 , ',' , '.' ) . ',- ekskl. moms (' . number_format( round((int) get_field('prices')['buy'] * 1.25) , 0 , ',' , '.' ) . ',- inkl. moms)';
  }

  if(get_field('prices')['rent']) {
    $price['value'] = number_format( round((int) get_field('prices')['rent']) , 0 , ',' , '.' ) . ',- ekskl. moms (' . number_format( round((int) get_field('prices')['rent'] * 1.25) , 0 , ',' , '.' ) . ',- inkl. moms)';
  }

  $end = $post->post_title;

  component('builder', [
    'sidebar' => [
      'show' => true,
      'inquiry' => get_the_ID(),
      'department' => get_field('support_department'),
      'title' => 'Spørg mig om dette modul'
    ],
    'components' => get_field('components'),
    'custom_components' => [
      [
        'index' => 0,
        'data' => [
          'acf_fc_layout' => 'image',
          'image' => get_field('floor_plan'),
          'classes' => 'pt-0'
        ]
      ],
      [
        'index' => 1,
        'data' => [
          'acf_fc_layout' => 'shortcode',
          'shortcode' => '<a href=" ' . wp_get_referer() . '
          " class="breadcrumb_last">Produktoversigt</a> <div> &nbsp; / &nbsp; </div> <div> ' . $end . ' </div>',
          'classes' => 'px-body breadcrumb'
        ]
      ],
      [
        'index' => 2,
        'data' => [
          'acf_fc_layout' => 'editor',
          'body' => '<h1 class="fs-40 fw-demi mb-4">Om ' . get_the_title() . '</h1>' . get_field('description')
        ]
      ],
      [
        'index' => 3,
        'data' => [
          'acf_fc_layout' => 'bullet_points',
          'title' => 'Inventar',
          'items' => get_field('inventory') ? get_field('inventory') : []
        ]
      ],
      [
        'index' => 4,
        'data' => [
          'acf_fc_layout' => 'tables',
          'column_size' => '6',
          'items' => [
            [
              'title' => 'Fakta',
              'items' => [
                [
                  'key' => 'Ref. nr.',
                  'value' => get_field('facts')['ref_nr']
                ],
                [
                  'key' => 'Vægt',
                  'value' => get_field('facts')['weight'] ? number_format((int) get_field('facts')['weight'], 0, ',', '.') . ' kg' : ''
                ],
                [
                  'key' => 'Størrelse (LxBxH)',
                  'value' => get_field('facts')['size'] ? get_field('facts')['size'] . ' cm' : ''
                ],
                [
                  'key' => 'Vand',
                  'value' => get_field('facts')['water'] 
                ],
                [
                  'key' => 'Afløb',
                  'value' => get_field('facts')['drain'] 
                ],
                [
                  'key' => 'El',
                  'value' => get_field('facts')['power'] 
                ],
              ]
            ],
            [
              'title' => 'Priser',
              'items' => [
                $price,
                [
                  'key' => 'Tilbudspris',
                  'value' => get_field('prices')['discount'] ? number_format( round((int) get_field('prices')['discount']) , 0 , ',' , '.' ) . ',- ekskl. moms (' . number_format( round((int) get_field('prices')['discount'] * 1.25) , 0 , ',' , '.' ) . ',- inkl. moms)' : 0
                ],
                [
                  'key' => 'Brandforsikring pr. md. (obligatorisk)',
                  'value' => get_field('prices')['fire_insurance'] ? get_field('prices')['fire_insurance'] . ',-' : ''
                ],
                [
                  'key' => 'All risk pr. md.',
                  'value' => get_field('prices')['all_risk'] ? get_field('prices')['all_risk'] . ',-' : ''
                ]
                ],
                'hide' => !get_field('prices')['fire_insurance'] && !get_field('prices')['all_risk'] && !get_field('prices')['buy'] && !get_field('prices')['rent'] && !get_field('prices')['discount']
            ]
          ]
        ]
      ],
      [
        'index' => 5,
        'data' => [
          'acf_fc_layout' => 'slider',
          'dots' => true,
          'images' => get_field('gallery') ?? []
        ]
      ],
      [
        'data' => [
          'acf_fc_layout' => 'call_to_action',
          'type' => 'inquiry',
          'body' => 'Afgiv forespørgsel',
          'bg' => 'bg-red-1'
        ]
      ]
    ]
  ]);

  get_footer();
  ob_flush();
}
catch (Exception $error) {
  ob_clean();
  throw $error;
}