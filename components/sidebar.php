<?php
  $this->props([
    'department' => [ 'type' => 'Integer', 'default' => 0 ],
  ]);

  $args = [
    'post_type' => 'employee',
    'orderby' => 'rand',
    'posts_per_page' => 1
  ];

  if($this->department && $this->department !== 0 && get_term( $this->department, 'employee_department' )->count > 0) {
    $args['tax_query'][] = [
      'taxonomy' => 'employee_department',
      'field' => 'term_id',
      'terms' => [$this->department],
      'operator' => 'IN'
    ];
  }

  $employee = get_posts($args)[0];
  $employee->phone = get_field('phone', $employee->ID);
  $employee->position = get_field('job_title', $employee->ID);
  $employee->mail = get_field('mail', $employee->ID);
?>

<div class="sidebar text-center">
  <div class="body">
    <?php if($this->resource['file'] && $this->resource['text']): ?>
      <a target="_blank" href="<?php echo $this->resource['file']['url']; ?>" class="cta fs-18 color-white bg-red-1 w-100 text-center d-flex justify-content-between align-items-center">
        <?php echo $this->resource['text']; svg('download'); ?>
      </a>
    <?php elseif($this->inquiry): ?>
      <a href="#" class="cta d-none d-xl-flex inquiry-toggle fs-18 color-white bg-red-1 w-100 text-center justify-content-between align-items-center">
        Send forespørgsel <?php svg('arrow-large', ['fill' => '#FFFFFF']); ?>
      </a>
    <?php endif; ?>
    <div class="contact">
      <div class="position-relative thumb mb-4 mx-auto px-3">
        <img src="<?php echo get_the_post_thumbnail_url($employee->ID); ?>" class="w-100">
        <?php svg('pattern-tertiary', [
          'fill' => '#E8E4E0',
          'opacity' => '1'
        ]); ?>
      </div>
      <h3 class="pt-2">
        <?php echo $employee->post_title; ?>
      </h3>
      <p class="mt-2 mb-4">
        <?php echo $employee->position; ?>
      </p>
      <a class="d-block" href="">
        Tlf: 70 20 35 66
      </a>
      <a class="d-block" href="mailto:info@mobilhouse.dk">
        Mail: info@mobilhouse.dk
      </a>
    </div>
  </div>
</div>