<div class="editor <?php echo $this->classes; echo $this->nested ? ' ' : ' px-body' ?>">
  <div>
    <?php echo $this->body; ?>
  </div>
  <?php if($this->link['url'] && $this->link['text']): ?>
    <div class="d-flex align-items-center mt-5">
      <a href="<?php echo $this->link['url']; ?>" class="color-red-1 d-flex align-items-center text-decoration-none">
        <span class="mr-2">
          <?php echo $this->link['text']; ?>
        </span>
        <?php svg('arrow-large', [
          'fill' => '#D54546'
        ]) ?>
      </a>
    </div>
  <?php endif; ?>
</div>