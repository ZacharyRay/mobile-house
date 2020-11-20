<?php 
  if($this->components || $this->custom_components):

    $components = $this->components ?? [];

    if($this->custom_components) {
      foreach($this->custom_components as $component) {
        $components[] = $component['data'];
        if(isset($component['index'])) {
          move_to_index($components, count($components) - 1, $component['index']);
        }
      }
    }
    
    $prev_has_bg = false;
    $idx = count($components) - 1;
?>

    <div class="builder <?php echo $this->sidebar['show'] ? 'has-sidebar' : ''; ?>">
      <div class="content">
        <?php 
          foreach($components as $key => $component) {
            $layout = str_replace('_', '-', $component['acf_fc_layout']);
            $bg = (array) $component['bg'];
            $classes = explode(' ', $component['classes']);
            $classes[] = 'component';
            $classes[] = $prev_has_bg ? 'prev-has-bg' : '';
            $classes[] = $idx == $key ? 'is-last' : '';
            $classes[] = $key == '0' ? 'is-first' : '';
            $classes[] = $component['bg'] ? $bg[0] : '';
            $classes[] = $component['bg'] ? 'component-has-bg' : 'component-has-no-bg';

            if($component['acf_fc_layout'] === 'tiles' && !$component['toggle_padding_bottom']) {
              $classes .= ' pb-0';
            }

            component($layout, array_merge($component, [ 'classes' => implode(' ', $classes), 'bg' => $component['bg'] ? $bg : false ]));
            $prev_has_bg = $component['bg'] ? true : false;
          }
        ?>
      </div>
      <?php if($this->sidebar['show']): component('sidebar', $this->sidebar); endif; ?>
    </div>

<?php  
  endif;
?>