<div class="posts px-body <?php echo $this->classes; ?>">
  <div class="mb-5 pb-3 header">
    <?php 
      echo $this->label ? '<label class="mb-0">' . $this->label . '</label>' : '';
      echo $this->title ? '<h2 class="mb-4">' . $this->title . '</h2>' : '';
      echo $this->lead ? '<p>' . $this->lead . '</p>' : ''; 
    ?>
  </div>
  <div class="row">
    <?php 
      
      foreach($this->items as $p): 
      $thum = get_asset('/images/buildings.jpg');
      $thumb = get_the_post_thumbnail($p->ID) && get_post_type($p->ID) !== 'module' ? get_the_post_thumbnail_url($p->ID, 'column') : $thumb;
      $thumb = get_the_post_thumbnail($p->ID) && get_post_type($p->ID) === 'module' ? get_the_post_thumbnail_url($p->ID) : $thumb;
    ?>
      <div class="col-12 col-lg-6 col-xl-<?php echo $this->column_size; ?> col-xxl-<?php echo $this->column_size; ?>">
        <?php 
          if($p->post_type === 'module'):

            $price = 0;

            if(get_field('prices', $p->ID)['buy']) {
              $price = (int) get_field('prices', $p->ID)['buy'];
            }

            if(get_field('prices', $p->ID)['rent']) {
              $price = (int) get_field('prices', $p->ID)['rent'];
            }
            
            component('module', [
              'classes' => 'module',
              'title' => $p->post_title,
              'thumbnail' => $thumb,
              'price' => $price,
              'discount_price' => (int) get_field('prices', $p->ID)['discount'],
              'body' => $p->post_content,
              'url' => get_permalink($p->ID)
            ]); 
          else:
            $excerpt = $p->post_excerpt !== '' ? $p->post_excerpt : $p->post_content;
            $excerpt = strlen($excerpt) > 150 ? substr($excerpt, 0, 150) . '...' : $excerpt;

            component('post', [
              'title' => $p->post_title,
              'thumbnail' => $thumb,
              'excerpt' => $excerpt,
              'body' => $p->post_content,
              'label' => get_field('lead', $p->ID),
              'url' => get_permalink($p->ID)
            ]);
          endif;
        ?>
      </div>
    <?php endforeach; ?>
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