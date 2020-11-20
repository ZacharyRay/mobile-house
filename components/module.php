<?php
  $this->props([
    'classes' => [ 'type' => 'String', 'default' => '' ],
    'title' => [ 'type' => 'String', 'default' => '' ],
    'price' => [ 'type' => 'Integer', 'default' => 0 ],
    'discount_price' => [ 'type' => 'Integer', 'default' => 0 ],
    'size' => [ 'type' => 'String', 'default' => '' ],
    'featured' => [ 'type' => 'Boolean', 'default' => false ]
  ])
?>

<div class="post <?php echo $this->classes; ?>">
  <a class="text-decoration-none" href="<?php echo $this->url; ?>">
    <div class="thumb position-relative h-100">
      <?php if($this->featured): ?>
        <span class="position-absolute bg-red-1 color-white fs-18 p-3">
          Tilbud
        </span>
      <?php endif; ?>
      <img class="w-100" src="<?php echo $this->thumbnail; ?>">
    </div>
    <h4 class="fs-22 mt-4">
      <?php echo $this->title; ?>
    </h4>
    <?php if($this->size): ?>
      <p class="mb-3">
        Størrelse (LxBxH) <?php echo $this->size; ?> cm
      </p>
    <?php endif; ?>
    <?php if((int) $this->price > 0): ?>
      <p class="mb-1">
        <?php if($this->discount_price > 0): ?>
        <span class="linethrough">
          <?php echo number_format((int) $this->price, 0, ',', '.'); ?>
        </span>
        <?php endif; ?>
        <span class="<?php echo (int) $this->discount_price > 0 ? 'color-red-1' : '';  ?>">
          <?php echo number_format((int) $this->discount_price > 0 ? $this->discount_price : $this->price, 0, ',', '.'); ?>,-
        </span>
        ekskl. moms
      </p>
      <p class="fs-12 color-grey-5">
        <?php echo number_format((int) $this->price * 1.25, 0, ',', '.'); ?>,- inkl. moms
      </p>
    <?php endif; ?>
  </a>
</div>
