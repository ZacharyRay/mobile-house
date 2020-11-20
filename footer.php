<footer class="align-items-end position-relative z-2">
  <?php svg('to-top'); ?>
  <div class="bg-white author d-flex justify-content-center align-items-end position-relative">
    <div class="fw-light fs-12">
      © 2019 <span class="fw-bold ml-2">Mobilhouse A/S</span>
    </div>
  </div>
  <div class="content bg-grey-2 w-100 position-relative">
    <div class="container ml-0">
      <img class="logo" src="<?php echo get_asset('/images/logo-positive.svg') ?>">
      <div class="row">
        <div class="col-md-3">
          <label>
            Kontakt os
          </label>
          <p>
            <?php the_field('general_mail', 'option'); ?>
          </p>
          <p class="mb-4">
            <?php the_field('general_phone', 'option'); ?>
          </p>
          <p>
            Mandag – torsdag: <?php echo get_field('open_hours', 'option')['monday_thursday']; ?>
          </p>
          <p>
            Fredag: <?php echo get_field('open_hours', 'option')['friday']; ?>
          </p>
        </div>
        <div class="col-md-3 mt-5 mt-lg-0">
          <label>
            Adresser
          </label>
          <?php foreach(get_field('addresses', 'option') as $key => $branch): ?>
            <div class="address <?php echo $key + 1 !== count(get_field('addresses', 'option')) ? 'mb-4' : ''; ?>">
              <p>
                <?php echo $branch['address']['street_name'] . ' ' . $branch['address']['street_number']; ?>
              </p>
              <p>
                <?php echo $branch['address']['post_code'] . ' ' . $branch['address']['city']; ?>
              </p>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="col-md-3 mt-5 mt-lg-0">
          <label>
            <?php echo get_menu_by_location('footer-primary')->name; ?>
          </label>
          <?php wp_nav_menu(array('theme_location' => 'footer-primary')); ?>
        </div>
        <div class="col-md-3 mt-5 mt-lg-0">
          <label>
            <?php echo get_menu_by_location('footer-secondary')->name; ?>
          </label>
          <?php wp_nav_menu(array('theme_location' => 'footer-secondary')); ?>
        </div>
      </div>
    </div>
    <div class="legal d-flex align-items-center justify-content-between">
      <a href="<?php echo get_privacy_policy_url(); ?>" class="fs-12 color-grey-6">
        Privatlivspolitik
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>