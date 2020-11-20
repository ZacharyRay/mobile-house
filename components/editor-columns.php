<div class="editor-columns px-body <?php echo $this->classes; ?>">
  <div class="container-fluid p-0">
    <div class="row">
      <?php foreach($this->items as $column): ?>
        <div class="col-md-6 mb-5 mb-lg-0">
          <?php component('editor', [
            'nested' => true,
            'body' => $column['body'],
            'link' => $column['link']
          ]); ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>