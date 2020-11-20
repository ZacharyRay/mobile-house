<?php

/** 
 * Template Name: Contact
*/

get_header();

if(!empty($_POST) && $_POST['type'] !== 'presentation'): 
  $sent = create_mail($_POST);
endif;

$bookkeeping = get_field('bookkeeping_department');
$sales = get_field('sales_department');
$employees = get_posts([
  'post_type' => 'employee',
  'posts_per_page' => -1
]);

$departments = get_terms([
  'taxonomy' => 'employee_department',
  'include' => get_field('departments')
]);

component('hero', [
  'label' => get_field('label'),
  'title' => get_the_title(),
  'lead' => get_field('lead'),
  'body' => get_field('body'),
  'link' => get_field('link'),
  'image' => get_the_post_thumbnail_url('', 'hero')
]);

?>

<div class="contact px-body container-fluid">
  <div>
    <h2 class="mb-5">
      Kontakt os
    </h2>
    <?php if($sent): ?>
      <p>
        Tak for din besked. Vi vender tilbage hurtigst muligt.
      </p>
    <?php else: ?>
    <form action="<?php the_permalink(); ?>" method="POST" class="w-100">
      <input name="full_name" class="d-block w-100 mb-3" type="text" placeholder="Dit navn">
      <input name="mail" class="d-block w-100 mb-3" type="text" placeholder="Din mailadresse">
      <input name="phone" class="d-block w-100 mb-3" type="text" placeholder="Dit telefonnummer">
      <textarea name="message" class="d-block w-100 mb-4" rows="8" placeholder="Din besked..."></textarea>
      <div class="d-flex justify-content-end">
        <button type="submit" class="submit color-red-1 fs-14 p-0">
          <span class="mr-2">
            Send besked
          </span>
          <?php svg('arrow-large') ?>
        </button>
      </div>
    </form>
    <?php endif; ?>
  </div>
  <div class="employees">
    <h2>
      Medarbejdere
    </h2>
    <p class="mt-3">
      Her kan du finde din kontaktperson hos Mobilhouse
    </p>
    <div class="select-wrapper js-filter mt-2 mb-5">
      <div class="current">
        <span>Filtrér efter kategori</span>
        <?php svg('arrow-mini'); ?>
      </div>
      <div class="list w-100">
        <div class="list-item d-block" data-id="all">
          Filtrér efter kategori
        </div>
        <?php if($departments): foreach($departments as $department): ?>
          <div class="list-item d-block" data-id="<?php echo $department->term_id; ?>">
            <?php echo $department->name; ?>
          </div>
        <?php endforeach; endif; ?>
      </div>
    </div>
    <div class="row pt-3">
      <?php 
        if($employees):
          foreach($employees as $employee): 
          
            $employee_departments = get_the_terms($employee->ID, 'employee_department');
            $ids = [];

            foreach($employee_departments as $department) {
              $ids[] = $department->term_id;
            }
          ?>
            <div class="col-xl-2 col-lg-3 col-md-6 employee flex-column justify-content-between mb-5" data-departments="<?php echo implode(',', $ids); ?>">
              <div>
                <div class="thumb position-relative">
                  <img class="w-100" src="<?php echo get_the_post_thumbnail_url($employee->ID); ?>">
                  <?php svg('pattern-tertiary', [
                    'fill' => '#F7F3EF'
                  ]) ?>
                </div>
                <h5 class="mt-4 mb-0">
                  <?php echo $employee->post_title; ?>
                </h5>
                <p class="mb-3">
                  <?php echo get_field('job_title', $employee->ID); ?>
                </p>
              </div>
              <div>
                <?php if(get_field('phone', $employee->ID)): ?>
                  <div class="d-flex align-items-center contact-info">
                    <p class="color-red-1 fs-14 mb-0">
                      <?php the_field('phone', $employee->ID); ?>
                    </p>
                  </div>
                <?php endif; ?>
                <?php if(get_field('mail', $employee->ID)): ?>
                <div class="d-flex align-items-center contact-info">
                  <p class="color-red-1 fs-14 mb-0">
                    <?php the_field('mail', $employee->ID); ?>
                  </p>
                </div>
                <?php endif; ?>
              </div>
            </div>
          <?php 
          endforeach; 
        endif; 
      ?>
    </div>
  </div>
  <?php if( have_rows('addresses', 'option') ): ?>
    <div class="map-wrapper">
      <div class="row m-0">
        <div class="map col-xl-7" data-zoom="16">
        <?php foreach ( get_field('addresses', 'option') as $location ) :
          ?>
          <div class="marker" data-lat="<?php echo esc_attr($location['address']['lat']); ?>" data-lng="<?php echo esc_attr($location['address']['lng']); ?>"></div>
            <h3><?php echo esc_html( $title ); ?></h3>
            <p><em><?php echo esc_html( $location['address']['address'] ); ?></em></p>
            <p><?php echo esc_html( $description ); ?></p>

        <?php endforeach; ?>
        </div>
        <div class="col-xl-5 bg-white body d-flex justify-content-center">
          <div>
            <h2 class="fs-32">
              Mobilhouse A/S
            </h2>
            <p>
              CVR NR: <?php the_field('cvr', 'option'); ?>
            </p>
            <h4 class="mt-4">
              Adresser
            </h4>
            <?php foreach(get_field('addresses', 'option') as $key => $branch): ?>
              <div class="address <?php echo $key + 1 !== count(get_field('addresses', 'option')) ? 'mb-4' : ''; ?>">
                <p class="m-0">
                  <?php echo $branch['address']['street_name'] . ' ' . $branch['address']['street_number']; ?>
                </p>
                <p class="m-0">
                  <?php echo $branch['address']['post_code'] . ' ' . $branch['address']['city']; ?>
                </p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
  <div class="details container ml-0 p-0">
    <div class="row">
      <div class="col-md-6 mb-5 mb-xl-0 col-xl-3">
        <h4 class="mb-3">
          Salg og udlejning
        </h4>
        <p class="mb-1 fs-14 fw-bold">
          Kontakt
        </p>
        <p class="mb-4 fs-14">
          Tlf. <?php echo get_field('phone', 'employee_department_' . $sales->term_id) ?: get_field('general_phone', 'option'); ?>
        </p>
        <p class="mb-1 fs-14 fw-bold">
          Åbningstider
        </p>
        <p class="mb-1 fs-14">
          Mandag - torsdag: <?php echo get_field('open_hours', 'employee_department_' . $sales->term_id)['monday_thursday'] ?: get_field('open_hours', 'option')['monday_thursday']; ?>
        </p>
        <p class="mb-1 fs-14">
          fredag: <?php echo get_field('open_hours', 'employee_department_' . $sales->term_id)['friday'] ?: get_field('open_hours', 'option')['friday']; ?>
        </p>
      </div>
      <div class="col-md-6 mb-5 mb-xl-0 col-xl-3">
        <h4 class="mb-3">
          Bogholderi
        </h4>
        <p class="mb-1 fs-14 fw-bold">
          Kontakt
        </p>
        <p class="mb-4 fs-14">
          Tlf. <?php echo get_field('phone', 'employee_department_' . $bookkeeping->term_id) ?: get_field('general_phone', 'option'); ?>
        </p>
        <p class="mb-1 fs-14 fw-bold">
          Åbningstider
        </p>
        <p class="mb-1 fs-14">
          Mandag - torsdag: <?php echo get_field('open_hours', 'employee_department_' . $bookkeeping->term_id)['monday_thursday'] ?: get_field('open_hours', 'option')['monday_thursday']; ?>
        </p>
        <p class="mb-1 fs-14">
          fredag: <?php echo get_field('open_hours', 'employee_department_' . $bookkeeping->term_id)['friday'] ?: get_field('open_hours', 'option')['friday']; ?>
        </p>
      </div>
      <div class="col-md-6 mb-5 mb-xl-0 col-xl-3">
        <h4 class="mb-3">
          Fakturering mm.
        </h4>
        <p class="mb-1 fs-14">
          EAN NR: <?php the_field('invoicing_ean', 'option'); ?>   
        </p>
        <p class="mb-1 fs-14">
          <?php the_field('invoicing_mail', 'option'); ?>   
        </p>
      </div>
      <div class="col-md-6 mb-5 mb-xl-0 col-xl-3">
        <h4 class="mb-3">
          Bank
        </h4>
        <p class="mb-1 fs-14">
          <?php the_field('bank_name', 'option'); ?>   
        </p>
        <p class="mb-1 fs-14">
          Reg. nr.: <?php the_field('reg_number', 'option'); ?>   
        </p>
        <p class="mb-4 fs-14">
          Konto nr.: <?php the_field('account_number', 'option'); ?>   
        </p>
        <p class="mb-1 fs-14">
          DKK:IBAN: <?php the_field('dkk_iban', 'option'); ?>   
        </p>
        <p class="mb-1 fs-14">
          BIC/SWIFT: <?php the_field('bic_swift', 'option'); ?>   
        </p>
        <a href="#" onClick="window.open('https://pbs-erhverv.dk/LS/?id=0&pbs=6f33f49fd2d0b3174c2f7c98cce6f52b&dbnr=&cvr=&knmin=&knmax=','LSTilmeld','resizable=no,toolbar=no,scrollbars=no,menubar=no,location=no,status=yes,width=375,height=500');return false;">LeverandørService online tilmelding</a>
      </div>
    </div>            
  </div>
</div>

<?php

get_footer();