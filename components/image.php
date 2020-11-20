<?php

  $this->props([
    'image_type' => [ 'type' => 'String', 'default' => 'image' ],
    'image' => [ 'type' => 'Array', 'required' => $this->image_type === 'image' ],
    'collage' => [ 'type' => 'Array', 'required' => $this->image_type === 'collage' ],
    'nested' => [ 'type' => 'Boolean', 'default' => false ]
  ])
?>

<div class="<?php echo $this->classes; ?>">
  <?php if($this->image_type === 'collage'): ?>
    <div class="collage <?php echo !$this->nested ? 'px-body' : ''; ?>">
      <?php 
        svg('dots', [
          'fill' => '#D54546'
        ]);
        svg('dots', [
          'fill' => '#ABA9AD',
          'opacity' => '.5'
        ]); 
        
        foreach($this->collage as $key => $image): 
      ?>
        <img src="<?php echo $image['sizes']['square']; ?>" alt="">
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="image">
      <img class="w-100" src="<?php echo $this->image['url']; ?>">
    </div>
  <?php endif; ?>
</div>