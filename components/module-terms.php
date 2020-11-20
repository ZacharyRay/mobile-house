<?php
  $this->props([
    'title' => [ 'type' => 'String', 'default' => '' ],
    'lead' => [ 'type' => 'String', 'default' => '' ],
    'terms' => [ 'type' => 'Array', 'required' => true ]
  ]);
?>


<div class="module-terms px-body <?php echo $this->classes; ?>">
  <div class="mb-5 pb-3 header">
    <h2 class="mb-4"><?php echo $this->title; ?></h2>
    <h4 class="mb-4"><?php echo $this->lead; ?></h4>
  </div>
  <div class="row">
    <?php 
      foreach($this->terms as $t):
    ?>
      <div class="col-12 col-lg-6 col-xl-<?php echo $this->column_size; ?> col-xxl-<?php echo $this->column_size; ?>">
          <?php 
            component('post', [
              'title' => $t['term']->name,
              'thumbnail' => get_field('thumbnail', 'term_' . $t['term']->term_id)['url'] ?? get_field('module_image', 'option')['url'],
              'url' => get_term_link($t['term']->term_id)
            ]); 
          ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>