<?php 

$uuid = rand();

?>

<div class="testimonial position-relative pr-body <?php echo $this->classes; ?>" id="slides-wrapper-<?php echo $uuid; ?>">
  <?php echo $this->bg[1] ? '<div class="bg-bottom ' . $this->bg[1] . '"></div>' : ''; ?>
  <div class="content bg-red-1 color-white">
    <div class="pattern-top d-none d-lg-block">
      <?php 
        svg('pattern-tertiary', [
          'fill' => is_front_page() ? '#ffffff' : '#F7F3EF'
        ]) 
      ?>
    </div>
    <div class="pattern-top-red d-none d-lg-block">
      <?php 
        svg('pattern-tertiary', [
          'fill' => '#D54546'
        ]) 
      ?>
    </div>
    <?php svg('quote'); ?>
    <div class="slides mt-5 slides-<?php echo $uuid; ?>" id="<?php echo $uuid; ?>">
      <?php if($this->testimonials): foreach($this->testimonials as $testimonial): ?>
        <div class="slide">
          <div class="body">
            <p class="fs-32 color-white fw-light mb-5">
              <?php echo $testimonial['body']; ?>
            </p>
            <p class="fw-bold color-white mb-1">
              <?php echo $testimonial['name']; ?>
            </p>
            <span>
              <?php echo $testimonial['job_title']; ?>
            </span>
          </div>
        </div>
      <?php endforeach; endif;?>
    </div>
    <?php if($this->dots): ?>
      <div class="dots d-flex align-items-center">
        <?php if($this->testimonials): foreach($this->testimonials as $key => $testimonial): ?>
          <div class="dot cursor-pointer mr-3 <?php echo $key === 0 ? 'active' : ''; ?>" data-nav-for="slides-<?php echo $uuid; ?>" data-slide="<?php echo $key; ?>"></div>
        <?php endforeach; endif; ?>
      </div>
    <?php else: ?>
      <div class="dots"></div>
    <?php endif; ?>
    <div class="pattern-bottom">
      <?php 
        svg('pattern-tertiary', [
          'fill' => '#F7F3EF'
        ]) 
      ?>
    </div>
    <div class="pattern-bottom-red">
      <?php 
        svg('pattern-tertiary', [
          'fill' => '#D54546'
        ]) 
      ?>
    </div>
  </div>
</div>