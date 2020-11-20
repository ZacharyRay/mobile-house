<?php
  $this->props([
    'body' => [ 'type' => 'String', 'default' => '' ],
  ]);

  $args = [
    'post_type' => 'employee',
    'orderby' => 'rand',
    'posts_per_page' => 1
  ];

  if($this->department && get_term( $this->department, 'employee_department' )->count > 0) {
    $args['tax_query'] = [
      [
        'taxonomy' => 'employee_department',
        'field' => 'term_id',
        'terms' => [$this->department],
      ]
    ];
  }

  $employee = get_posts($args)[0];

  $employee->phone = get_field('phone', $employee->ID);
  $employee->mail = get_field('mail', $employee->ID);
  $employee->department = get_the_terms( $employee->ID, 'employee_department' )[0]->name;
?>

<div class="cta cta--contact container-fluid px-body <?php echo $this->classes; ?>">
  <div class="row align-items-center">
    <div class="col-xl-6 mb-5 mb-xl-0">
      <label class="color-white">
        Har du et projekt i tankerne?
      </label>
      <h2 class="color-white mb-0">
        Kontakt os
      </h2>
    </div>
    <div class="col-xl-6 d-block d-lg-flex align-items-center">
      <div class="thumb position-relative">
        <img src="<?php echo get_the_post_thumbnail_url($employee->ID); ?>" class="w-100">
        <?php svg('pattern-tertiary', [
          'fill' => '#D54546',
          'opacity' => '1'
        ]); ?>
      </div>
      <div class="ml-0 ml-lg-5 mt-5 mt-lg-0">
          <h3 class="color-white">
            <?php echo $employee->post_title; ?>
          </h3>
          <p class="color-white mb-4">
            <?php echo $employee->department; ?>
          </p>
          <p class="color-white mb-0">
            Tlf: <?php echo $employee->phone; ?>
          </p>
          <p class="color-white">
            Mail: <?php echo $employee->mail; ?>
          </p>
      </div>
    </div>
  </div>
</div>