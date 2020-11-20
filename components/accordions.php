<div class="accordions px-body <?php echo $this->classes; ?>">
  <h2 class="mb-4">
    <?php echo $this->title; ?>
  </h2>
  <p class="mb-5 pb-3">
    <?php echo $this->lead; ?>
  </p>
  <div>
    <?php foreach($this->items as $accordion): ?>
      <div class="accordion">
        <div class="d-flex cursor-pointer align-items-center justify-content-between toggle py-3">
          <h4 class="fs-22 m-0">
            <?php echo $accordion['title']; ?>
          </h4>
          <img src="<?php echo get_asset('/images/accordion-arrow.svg'); ?>">
        </div>
        <p class="body pb-3 pr-5 m-0">
          <?php echo $accordion['body']; ?>
        </p>
      </div>
    <?php endforeach; ?>
  </div>
</div>
