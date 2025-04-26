<?php

/**
 * Opening Hours and Booking Block
 */
?>

<?php if (get_sub_field('booking_and_openinghours')): ?>
  <div class="info-banner w-full">
    <div class="flex flex-col lg:flex-row">
      <!-- Booking Section -->
      <div class="w-full lg:w-1/2 bg-[#2A333D] text-white">
        <div class="p-8">
          <h3 class="text-2xl font-bold mb-6 text-center">Tidsbokning</h3>
          <div class="flex flex-wrap justify-center sm:justify-start lg:justify-center">
            <!-- Horse Clinic Booking -->
            <div class="w-1/2 md:w-1/2 xl:w-1/4 px-3">
              <h4 class="text-xl mb-4">Hästklinik</h4>

              <?php
              if (have_rows('boking_horse', 'option')):
                while (have_rows('boking_horse', 'option')): the_row();
                  $telefonummer = get_sub_field('phone-number_horse');
              ?>
                  <p class="text-lg font-medium mb-3"><?php echo esc_html($telefonummer); ?></p>
                  <?php
                  if (have_rows('phone-hours', 'option')):
                    while (have_rows('phone-hours', 'option')): the_row();
                      $dag = get_sub_field('day');
                      $tid = get_sub_field('time');
                  ?>
                      <div class="flex justify-between items-center mb-2">
                        <p class="text-sm"><?php echo esc_html($dag); ?></p>
                        <p class="text-sm"><?php echo esc_html($tid); ?></p>
                      </div>
              <?php
                    endwhile;
                  endif;
                endwhile;
              endif;
              ?>
            </div>

            <!-- Small Animal Clinic Booking -->
            <div class="w-1/2 md:w-1/2 xl:w-1/4 px-3">
              <h4 class="text-xl mb-4">Smådjursklinik</h4>

              <?php
              if (have_rows('boking_small-animals', 'option')):
                while (have_rows('boking_small-animals', 'option')): the_row();
                  $telefonummer = get_sub_field('phone-number_small-animals');
              ?>
                  <p class="text-lg font-medium mb-3"><?php echo esc_html($telefonummer); ?></p>
                  <?php
                  if (have_rows('phone-hours', 'option')):
                    while (have_rows('phone-hours', 'option')): the_row();
                      $dag = get_sub_field('day');
                      $tid = get_sub_field('time');
                  ?>
                      <div class="flex justify-between items-center mb-2">
                        <p class="text-sm"><?php echo esc_html($dag); ?></p>
                        <p class="text-sm"><?php echo esc_html($tid); ?></p>
                      </div>
              <?php
                    endwhile;
                  endif;
                endwhile;
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Opening Hours Section -->
      <div class="w-full lg:w-1/2 bg-gray-100 text-gray-900">
        <div class="p-8">
          <h3 class="text-2xl font-bold mb-6 text-center">Öppettider</h3>
          <div class="flex flex-wrap justify-center sm:justify-start lg:justify-center">
            <!-- Horse Clinic Hours -->
            <div class="w-1/2 md:w-1/2 xl:w-1/4 px-3">
              <h4 class="text-xl mb-4">Hästklinik</h4>

              <?php
              if (have_rows('opening_hours_horse', 'option')):
                while (have_rows('opening_hours_horse', 'option')): the_row();
                  $dag = get_sub_field('day');
                  $tid = get_sub_field('time');
              ?>
                  <div class="flex justify-between items-center mb-2">
                    <p class="text-sm"><?php echo esc_html($dag); ?></p>
                    <p class="text-sm"><?php echo esc_html($tid); ?></p>
                  </div>
              <?php
                endwhile;
              endif;
              ?>
            </div>

            <!-- Small Animal Clinic Hours -->
            <div class="w-1/2 md:w-1/2 xl:w-1/4 px-3">
              <h4 class="text-xl mb-4">Smådjursklinik</h4>

              <?php
              if (have_rows('opening_hours_small-animals', 'option')):
                while (have_rows('opening_hours_small-animals', 'option')): the_row();
                  $dag = get_sub_field('day');
                  $tid = get_sub_field('time');
              ?>
                  <div class="flex justify-between items-center mb-2">
                    <p class="text-sm"><?php echo esc_html($dag); ?></p>
                    <p class="text-sm"><?php echo esc_html($tid); ?></p>
                  </div>
              <?php
                endwhile;
              endif;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>