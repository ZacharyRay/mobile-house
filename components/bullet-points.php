<?php  
  $this->props([
    'title' => [ 'type' => 'String', 'default' => '' ],
    'columns' => [ 'type' => 'String', 'default' => false ],
    'items' => [ 'type' => 'Array', 'required' => true ]
  ]);

  $chunks = array_chunk($this->items, $this->columns ? ceil(count($this->items) / (int) $this->columns) : 6);
  $column_size = $this->columns ? 12 / (int) $this->columns : count($chunks);
?>

<?php if(count($this->items) > 0): ?>
<div class="bullet-points px-body <?php echo $this->classes; ?>">
  <h4>
    <?php echo $this->title; ?>
  </h4>
  <div class="row">
    <?php foreach($chunks as $bullets): ?>
      <div class="col-xl-4 col-xxl-3 mb-5">
        <ul class="pl-3">
          <?php foreach($bullets as $bullet): if($bullet['bullet_point'] !== ''): ?>
            <li class="color-grey-6">
              <?php echo $bullet['bullet_point']; ?>
            </li>
          <?php endif; endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>