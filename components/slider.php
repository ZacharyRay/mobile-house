<?php 

$this->props([
  'images' => [ 'type' => 'Array', 'required' => true ]
]);

$uuid = rand();

if($this->images):
?>

<div class="slider-wrapper position-relative pl-body <?php echo $this->classes; ?>" id="slides-wrapper-<?php echo $uuid; ?>">
  <?php echo $this->bg[1] ? '<div class="bg-bottom ' . $this->bg[1] . '"></div>' : ''; ?>
  <div class="slider">
    <div class="slides-wrapper position-relative">
      <div class="slides slides-<?php echo $uuid; ?>" id="<?php echo $uuid; ?>">
        <?php foreach($this->images as $slide): ?>
          <div class="slide">
            <img class="w-100" src="<?php echo $slide['sizes']['hero']; ?>">
          </div>
        <?php endforeach; ?>
      </div>
      <div class="slider-next position-absolute bg-grey-1 d-flex align-items-center justify-content-center cursor-pointer" data-nav-for="slides-<?php echo $uuid; ?>">
        <?php svg('arrow-small', [
          'fill' => '#9E938A'
        ]) ?>
      </div>
    </div>
  </div>
  <div class="d-flex align-items-center mt-4">
    <?php if($this->dots): ?>
      <div class="dots d-flex align-items-center mr-5">
        <?php if($this->images): foreach($this->images as $key => $slide): ?>
          <div class="dot cursor-pointer mr-3 <?php echo $key === 0 ? 'active' : ''; ?>" data-nav-for="slides-<?php echo $uuid; ?>" data-slide="<?php echo $key; ?>"></div>
        <?php endforeach; endif; ?>
      </div>
    <?php endif; ?>
    <div class="w-100">
      <div class="slides-caption" data-nav-for="slides-<?php echo $uuid; ?>">
        <?php if($this->images): foreach($this->images as $key => $slide): ?>
          <div class="fs-14 italic color-grey-6">
            <?php echo $slide['caption']; ?>
          </div>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>