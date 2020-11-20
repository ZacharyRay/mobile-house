<?php
  $this->props([
    'title' => [ 'type' => 'String', 'default' => '' ],
    'items' => [ 'type' => 'Array', 'required' => true ],
    'hide' => [ 'type' => 'Boolean', 'default' => false ]
  ]);
?>

<?php if(!$this->hide): ?>
<div class="table">
  <h4 class="mb-4">
    <?php echo $this->title; ?>
  </h4>
  <ul class="list-style-none p-0 m-0">
    <?php foreach($this->items as $item): if($item['value']): ?>
      <li class="d-flex justify-content-between w-100">
        <span class="fs-14 mr-3">
          <?php echo $item['key']; ?>
        </span>
        <span class="fs-14 color-grey-6">
          <?php echo $item['value']; ?>
        </span>
      </li>
    <?php endif; endforeach; ?>
  </ul>
</div>
<?php endif; ?>