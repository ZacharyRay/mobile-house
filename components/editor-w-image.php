<div class="editor-w-image px-body <?php echo $this->classes; ?>">
  <div class="container-fluid p-0">
    <div class="row align-items-center">
      <div class="pr-lg-0 col-xl-6 <?php echo $this->layout === 'reverse' ? 'order-1' : '' ?>">
        <?php component('editor', [
          'nested' => true,
          'body' => $this->body,
          'link' => [
            'text' => $this->link_text,
            'url' => $this->url
          ]
        ]); ?>
      </div>
      <div class="col-xl-5 img-dotted-wrap <?php echo $this->layout === 'reverse' ? 'mr-auto' : 'ml-auto' ?>">
        <?php if($this->image_type === 'single_dotted'): ?>
          <div class="img dotted position-relative" style="background: url(<?php echo $this->image['url']; ?>) center center / cover no-repeat;">
            <?php if($this->url): ?>
              <a href="<?php echo $this->url; ?>" class="btn position-absolute bg-red-1 d-flex align-items-center justify-content-center">
                <?php svg('arrow-large', [ 'fill' => '#ffffff' ]); ?>  
              </a>
            <?php endif; ?>
          </div>
        <?php 
          elseif($this->image_type === 'collage'):  
            component('image', [
              'image_type' => 'collage',
              'collage' => $this->collage,
              'nested' => true
            ]);
          elseif($this->image_type === 'icon'): ?>
          <div class="icon">
            <img class="position-absolute" src="<?php echo $this->image['url']; ?>">
          </div>
        <?php else: ?>
          <div class="img position-relative" style="background: url(<?php echo $this->image['url']; ?>) center center / cover no-repeat;"></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>