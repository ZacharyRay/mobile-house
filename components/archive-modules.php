<div class="px-body archive-modules" id="archive-modules">
  <?php 
    if($this->current_term['name'] && $this->current_term['name'] !== 'Filtrér efter kategori'):
      echo '<h2 class="mb-5">' . $this->current_term['name'] . '</h2><div class="d-flex align-items-end">';
    elseif($this->title):
      echo '<h2 class="mb-5">' . $this->title . '</h2><div class="d-flex align-items-end">';
    endif;
  ?>

    <div class="row mt-5 w-100">
      <?php 
        $post_type = 'module';
        $current = get_term($this->current_term['id'], 'module_category');
        $terms = get_terms('module_category', [
          'parent' => $current->parent !== 0 ? $current->parent : $current->term_id
        ]);
      ?>
      <?php if($terms && strpos($current->slug, 'plantegninger') !== 0 && !get_field('hide_filters', 'term_' . $current->term_id)): ?> 
        <div class="d-none d-lg-block col-md-3 tag-sidebar">
          <h4 class="mb-4">
            Kategori
          </h4>
          <?php foreach($terms as $term): ?>
            <a href="<?php echo get_term_link($term->term_id); ?>" class="list-item d-block <?php echo $term->term_id == $current->term_id ? 'active' : ''; ?>">
              <span>
                <?php if($term->term_id == $current->term_id): svg('check'); endif; ?>
              </span>
              <?php echo $term->name; ?>
            </a>
          <?php endforeach; ?> 
        </div>
      <?php endif; ?>

      <div class="<?php echo $terms && strpos($current->slug, 'plantegninger') !== 0 && !get_field('hide_filters', 'term_' . $current->term_id) ? 'col-lg-9' : 'col-lg-12'; ?>">
        <div class="row">
          <?php if($this->query && $this->query->have_posts()) : while ($this->query->have_posts()) : $this->query->the_post(); ?>
            <div class="col-12 post archive-module <?php echo $terms && strpos($current->slug, 'plantegninger') !== 0 && !get_field('hide_filters', 'term_' . $current->term_id) ? 'col-xl-6 col-xxl-6' : 'col-xl-4 col-xxl-4'; ?>">
              <?php 
              $price = 0;

              if(get_field('prices')['buy']) {
                $price = (int) get_field('prices')['buy'];
              }

              if(get_field('prices')['rent']) {
                $price = (int) get_field('prices')['rent'];
              }
              
              component('module', [
                'title' => get_the_title(),
                'size' => get_field('facts')['size'],
                'price' => $price,
                'discount_price' => (int) get_field('prices')['discount'],
                'url' => get_the_permalink(),
                'thumbnail' => get_the_post_thumbnail_url(),
                'featured' => get_field('is_featured') === 'yes'
              ]) ?>
            </div>
          <?php endwhile; wp_reset_postdata(); endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>