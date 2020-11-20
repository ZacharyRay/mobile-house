<?php
  $this->props([
    'classes' => [ 'type' => 'String', 'default' => '' ],
    'label' => [ 'type' => 'String', 'default' => '' ],
    'title' => [ 'type' => 'String', 'default' => '' ],
    'excerpt' => [ 'type' => 'String', 'default' => '' ],
    'date' => [ 'type' => 'String', 'default' => '' ],
    'show_arrow' => [ 'type' => 'Boolean', 'default' => true ],
    'show_pattern' => [ 'type' => 'Boolean', 'default' => true ],
    'type' => [ 'type' => 'String', 'default' => 'post' ]
  ]);
?>

<div class="post <?php echo $this->classes; ?>">
  <a class="text-decoration-none" href="<?php echo $this->url; ?>">
    <?php if($this->type === 'document'): ?>
      <div class="position-relative mb-3">
        <img src="<?php echo $this->thumbnail; ?>" class="w-100">
      </div>
    <?php else: ?>
      <div class="position-relative">
        <div class="thumb position-relative mb-3 posth">
          <div class="w-100 h-100 position-absolute bg" style="background: url(<?php echo $this->thumbnail; ?>) center center / cover no-repeat;"></div>
          <?php if($this->show_pattern): svg('pattern-tertiary', [
            'fill' => '#F7F3EF'
          ]); endif; ?>
        </div>
        <?php if($this->show_arrow): ?>
          <div class="btn bg-grey-1 d-flex align-items-center justify-content-center position-absolute">
            <?php svg('arrow-large', [ 'fill' => '#ABA9AD' ]); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
    <?php if($this->label): ?>
      <label class="mb-2 d-block">
        <?php echo $this->label; ?>
      </label>
    <?php endif; ?>
    <h4 class="fs-22">
      <?php echo $this->title; ?>
    </h4>
    <p>
      <?php echo $this->excerpt; ?>
    </p>
    <?php if($this->date): ?>
      <label class="mt-4 d-block color-black-1">
        <?php echo $this->date; ?>
      </label>
    <?php endif; ?>
  </a>
</div>
