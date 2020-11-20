<div class="tiles <?php echo $this->classes; ?>">
  <?php foreach($this->tiles as $tile): ?>
    <div class="row tile position-relative">
      <div class="icon position-absolute d-none d-xl-block">
        <img class="position-absolute" src="<?php echo $tile['icon']['url']; ?>">
      </div>
      <div class="col-xl-6 image" style="background: url(<?php echo $tile['image']['url']; ?>) center center / cover no-repeat;">
        <div class="icon position-absolute d-block d-xl-none">
          <img class="position-absolute" src="<?php echo $tile['icon']['url']; ?>">
        </div>
      </div>
      <div class="col-xl-6 body bg-grey-2 d-block d-lg-flex align-items-center justify-content-center">
        <div>
          <?php echo $tile['body']; ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>