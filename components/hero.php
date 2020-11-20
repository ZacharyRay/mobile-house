<div class="hero position-relative">
  <div class="content">
    <div class="body bg-white">
      <div>
        <label class="ls-1 mb-0 uppercase">
          <?php echo $this->label; ?>
        </label>
        <h1 class="<?php echo $this->is_home ? 'fs-60' : 'fs-48'; ?>">
          <?php echo $this->title; ?>
        </h1>
        <?php if($this->lead): ?>
        <h4 class="color-red-1 pb-2 mt-4 mb-4 fw-light">
          <?php echo $this->lead; ?>
        </h4>
        <?php endif; ?>
        <p class="mt-4 <?php echo $this->is_home ? 'fs-21' : ''; ?>">
          <?php echo $this->body; ?>
        </p>
        <?php if($this->link['text'] && $this->link['url']): ?>
          <a class="color-red-1 d-block mt-5 fs-14" href="<?php echo $this->link['url']; ?>">
            <span class="mr-2">
              <?php echo $this->link['text']; ?>
            </span>
            <?php svg('arrow-large'); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="bg" style="background-image: url(<?php echo $this->image && $this->image !== '' ? $this->image : get_asset('/images/buildings.jpg'); ?>);">
    <img class="w-100 d-none d-lg-block hero-img" src="<?php echo $this->image && $this->image !== '' ? $this->image : get_asset('/images/buildings.jpg'); ?>">
  </div>
  <?php svg('pattern'); ?>
</div>
