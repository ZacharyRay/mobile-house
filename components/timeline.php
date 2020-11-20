<?php  

$bg = get_field('bg') && get_field('bg') !== '' ? get_field('bg') : 'bg-grey-1';
$bg = $this->bg ? $this->bg : $bg;

?>

<div class="timeline px-body <?php echo $this->classes; ?>">
  <h2>
    <?php echo $this->title; ?>
  </h2>
  <?php foreach($this->items as $event): ?>
    <div class="event">
      <span class="tile d-flex justify-content-center align-items-center <?php echo $bg; ?>"></span>
      <h4>
        <?php echo $event['title']; ?>
      </h4>
      <p>
        <?php echo $event['body']; ?>
      </p>
    </div>
  <?php endforeach; ?>
</div>