<?php
  $this->props([
    'complete' => [ 'type' => 'Boolean', 'default' => false ],
  ]);
?>

<div class="position-fixed presentation-modal w-100 align-items-center justify-content-center <?php echo $this->complete ? 'd-flex' : 'd-none'; ?>">
    <?php if($this->complete): ?>
      <div class="bg-white complete modal-body w-100 d-flex align-items-center justify-content-center text-center">
        <div class="position-absolute inquiry-close presentation-toggle cursor-pointer"></div>
        <div>
          <?php svg('hand'); ?>
          <h3 class="fs-32 mb-3 mt-5">Tak for din forespørgsel!</h3>
          <p class="mb-4 pb-2">Vi har modtaget din forespørgsel, og en af vores sælgere kontakter dig hurtigst muligt. Du er velkommen til at afgive flere forespørgsler.</p>
          <div class="cursor-pointer inquiry-toggle color-red-1 fs-14 d-flex justify-content-center align-items-center">
            <span class="mr-2">
              Luk denne besked
            </span>
            <?php svg('arrow-large'); ?>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="bg-white modal-body w-100">
        <div class="position-absolute inquiry-close presentation-toggle cursor-pointer"></div>
        <h3 class="fs-32 mb-3">Afgiv forespørgsel</h3>
        <p class="mb-4 pb-2">Når du har afgivet en forespørgsel på en fremvisning, kontakter vi dig så hurtigt som muligt.</p>
        <form action="" method="POST" class="w-100">
          <input name="full_name" class="d-block w-100 mb-3" type="text" placeholder="Dit navn">
          <input name="mail" class="d-block w-100 mb-3" type="text" placeholder="Din mailadresse">
          <input name="phone" class="d-block w-100 mb-3" type="text" placeholder="Dit telefonnummer">
          <textarea name="message" class="d-block w-100 mb-4" rows="8" placeholder="Din besked..."></textarea>
          <div class="d-flex justify-content-end">
            <input type="hidden" name="type" value="presentation">
            <button type="submit" class="submit color-red-1 fs-14 p-0">
              <span class="mr-2">
                Afgiv forespørgsel
              </span>
              <?php svg('arrow-large') ?>
            </button>
          </div>
        </form>
      </div>
    <?php endif; ?>
  </div>
</div>