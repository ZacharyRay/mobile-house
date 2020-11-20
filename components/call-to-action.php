<?php 
  if($this->type === 'download' && $this->cta_file): echo '<a class="text-decoration-none" target="_blank" href="' . $this->cta_file['url'] .'">';
  elseif($this->type === 'link' && $this->url): echo '<a class="text-decoration-none" href="' . $this->url .'">';
  elseif($this->type === 'inquiry'): echo '<a class="text-decoration-none inquiry-toggle" href="#">';
  endif;
?>
<div class="cta text-center position-relative <?php echo $this->classes; ?>">
  <h4 class="color-white fs-28">
    <?php echo $this->body; if($this->type === 'link' && $this->url || $this->type === 'inquiry'): svg('arrow-large', [ 'fill' => '#ffffff' ]); elseif($this->type === 'download' && $this->cta_file): svg('download'); endif; ?>
  </h4>
</div>
<?php 
  if($this->cta_file || $this->url || $this->type === 'inquiry'): echo '</a>'; endif;
?>