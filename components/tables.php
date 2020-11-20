<?php
  $this->props([
    'items' => [ 'type' => 'Array', 'required' => true ],
    'hide' => [ 'type' => 'Boolean', 'default' => false ]
  ]);
?>

<?php if(!$this->hide): ?>
<div class="tables px-body <?php echo $this->classes; ?>">
  <div class="row">
    <?php foreach($this->items as $table): ?>
        <div class="col-xl-<?php echo $this->column_size; ?>">
          <?php component('table', $table); ?>
        </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>