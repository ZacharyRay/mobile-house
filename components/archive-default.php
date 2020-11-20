<div class="px-body archive-default">
  <?php 
    $post_type = $this->post_type ?? get_post_type();
    $thumb_size = $post_type === 'document' ? 'document' : 'column';

    if($this->current_term['name'] && $this->current_term['name'] !== 'Filtrér efter kategori'):
      echo '<h2 class="mb-5">' . $this->current_term['name'] . '</h2>';
    elseif($this->title):
      echo '<h2 class="mb-5">' . $this->title . '</h2>';
    endif;
    if($this->terms):
  ?>
  <div class="select-wrapper">
    <div class="current">
      <span><?php echo $this->current_term['name'] ?? 'Filtrér efter kategori'; ?></span>
      <?php svg('arrow-mini'); ?>
    </div>
    <div class="list w-100">
      <?php if($this->current_term['id']): ?>
        <a href="<?php echo get_post_type_archive_link( $post_type ) ?>" class="list-item d-block">
          Vis alle
        </a>
      <?php endif; foreach($this->terms as $term): ?>
        <a href="<?php echo get_term_link($term->term_id); ?>" class="list-item d-block <?php echo $term->term_id == get_queried_object()->term_id ? 'active' : ''; ?>">
          <?php echo $term->name; ?>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <?php endif; ?>
  <div class="row mt-5">
    <?php if($this->query && $this->query->have_posts()) : while ($this->query->have_posts()) : $this->query->the_post(); ?>
      <div class="col-12 col-lg-6 col-xl-4 col-xxl-3 post">
        <?php component('post', [
          'title' => get_the_title(),
          'label' => $post_type === 'case' ? get_field('lead') : '',
          'excerpt' => has_excerpt() ? get_the_excerpt() : '',
          'url' => $post_type === 'document' ? get_field('file')['url'] : get_the_permalink(),
          'thumbnail' => get_the_post_thumbnail_url('', $thumb_size),
          'show_arrow' => $post_type !== 'document',
          'show_pattern' => false,
          'type' => $post_type
        ]) ?>
      </div>
    <?php endwhile; wp_reset_postdata(); endif; ?>
  </div>
</div>