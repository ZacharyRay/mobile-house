<div class="selling-points px-body <?php echo $this->classes; ?>">
  <div class="row">
    <?php foreach($this->items as $selling_point): ?>
      <div class="col-lg-4 col-6 d-flex justify-content-center">
        <div class="selling-point">
          <div class="icon mx-auto d-flex align-items-center justify-content-center">
            <h3 class="fs-40 color-grey-4">
              <?php echo $selling_point['number'] ?>
            </h3>
            <img src="<?php echo $selling_point['icon']['url']; ?>">
          </div>
          <p class="color-black-1">
            <?php echo $selling_point['text'] ?>
          </p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>