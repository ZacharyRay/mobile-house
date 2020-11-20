<?php 
  $this->props([
    'shortcode' => [ 'type' => 'String', 'required' => true ]
  ]);
?>

<div class="<?php echo $this->classes ?>">
  <?php 
    echo do_shortcode($this->shortcode); 
  ?>
</div>