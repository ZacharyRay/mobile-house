<?php  

$primary = $this->items[0];
$secondary = $this->items[1];
$tertiary = $this->items[2];

?>

<div class="featured posts px-body position-relative <?php echo $this->classes; ?>">
  <div class="d-flex justify-content-between align-items-center mb-5 pb-3">
    <h2 class="m-0">
      <?php echo $this->title; ?>
    </h2>
    <a class="fs-14 color-red-1" href="<?php echo $this->link['url']; ?>">
      <?php echo $this->link['text']; ?>
    </a>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="post primary">
        <a class="text-decoration-none" href="<?php echo get_permalink($primary->ID); ?>">
          <div class="position-relative">
            <div class="thumb position-relative">
              <div class="bg position-absolute w-100 h-100" style="background: url('<?php echo get_the_post_thumbnail_url($primary->ID, 'hero'); ?>') center center / cover no-repeat;"></div>
              <?php svg('pattern-secondary', [
                'fill' => '#F7F3EF',
                'opacity' => '1'
              ]) ?>
            </div>
            <div class="btn bg-grey-1 d-flex align-items-center justify-content-center position-absolute">
              <?php svg('arrow-large', [ 'fill' => '#ABA9AD' ]); ?>
            </div>
          </div>
          <label class="mt-3 mb-0">
            <?php echo get_field('lead', $primary->ID); ?>
          </label>
          <h4 class="fs-22">
            <?php echo $primary->post_title; ?>
          </h4>
          <p>
            <?php echo get_field('body', $primary->ID); ?>
          </p>
        </a>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="post secondary">
        <a class="text-decoration-none" href="<?php echo get_permalink($secondary->ID); ?>">
          <div class="position-relative">
            <div class="thumb position-relative">
              <div class="bg position-absolute w-100 h-100" style="background: url('<?php echo get_the_post_thumbnail_url($secondary->ID, 'hero'); ?>') center center / cover no-repeat;"></div>
            </div>
            <div class="btn bg-grey-1 d-flex align-items-center justify-content-center position-absolute">
              <?php svg('arrow-large', [ 'fill' => '#ABA9AD' ]); ?>
            </div>
          </div>
          <label class="mt-3 mb-0">
            <?php echo get_field('lead', $secondary->ID); ?>
          </label>
          <h4 class="fs-22">
            <?php echo $secondary->post_title; ?>
          </h4>
          <p>
            <?php echo get_field('body', $secondary->ID); ?>
          </p>
        </a>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="post tertiary">
        <a class="text-decoration-none" href="<?php echo get_permalink($tertiary->ID); ?>">
          <div class="position-relative">
            <div class="thumb position-relative">
              <div class="bg position-absolute w-100 h-100" style="background: url('<?php echo get_the_post_thumbnail_url($tertiary->ID, 'hero'); ?>') center center / cover no-repeat;"></div>
            </div>
            <div class="btn bg-grey-1 d-flex align-items-center justify-content-center position-absolute">
              <?php svg('arrow-large', [ 'fill' => '#ABA9AD' ]); ?>
            </div>
          </div>
          <label class="mt-3 mb-0">
            <?php echo get_field('lead', $tertiary->ID); ?>
          </label>
          <h4 class="fs-22">
            <?php echo $tertiary->post_title; ?>
          </h4>
          <p>
            <?php echo get_field('body', $tertiary->ID); ?>
          </p>
        </a>
      </div>
    </div>
  </div>
</div>