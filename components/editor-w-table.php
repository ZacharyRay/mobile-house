<div class="editor-w-table px-body <?php echo $this->classes; ?>">
  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-md-3 pr-lg-0">
        <?php component('table', [
          'title' => $this->table['title'],
          'items' => $this->table['items']
        ]); ?>
      </div>
      <div class="col-md-8 ml-auto">
        <?php component('editor', [
          'nested' => true,
          'body' => $this->body
        ]); ?>
      </div>
    </div>
  </div>
</div>