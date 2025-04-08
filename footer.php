<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="bg-gray-100 pt-16 pb-8">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Opening Hours -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Öppettider</h3>
                <div class="space-y-2">
                    <div class="text-gray-700">
                        <h4 class="font-semibold">Hästklinik</h4>
                        <?php if(have_rows('opening_hours_horse', 'option')): ?>
                            <?php while(have_rows('opening_hours_horse', 'option')): the_row(); ?>
                                <p><?php echo get_sub_field('day'); ?>: <?php echo get_sub_field('time'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="text-gray-700 mt-4">
                        <h4 class="font-semibold">Smådjursklinik</h4>
                        <?php if(have_rows('opening_hours_small-animals', 'option')): ?>
                            <?php while(have_rows('opening_hours_small-animals', 'option')): the_row(); ?>
                                <p><?php echo get_sub_field('day'); ?>: <?php echo get_sub_field('time'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Booking -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Tidsbokning</h3>
                <div class="space-y-4 text-gray-700">
                    <?php 
                    $horse_booking = get_field('boking_horse', 'option');
                    if($horse_booking): ?>
                        <div>
                            <p class="font-semibold">Hästklinik</p>
                            <?php 
                            if(!empty($horse_booking['phone-hours'])): 
                                foreach($horse_booking['phone-hours'] as $hours): ?>
                                    <p><?php echo $hours['day']; ?> <?php echo $hours['time']; ?></p>
                                <?php endforeach; 
                            endif; ?>
                            <p class="hover:text-blue-600 transition-colors"><?php echo $horse_booking['phone-number_horse']; ?></p>
                        </div>
                    <?php endif; ?>

                    <?php 
                    $small_animals_booking = get_field('boking_small-animals', 'option');
                    if($small_animals_booking): ?>
                        <div>
                            <p class="font-semibold">Smådjursklinik</p>
                            <?php 
                            if(!empty($small_animals_booking['phone-hours'])): 
                                foreach($small_animals_booking['phone-hours'] as $hours): ?>
                                    <p><?php echo $hours['day']; ?> <?php echo $hours['time']; ?></p>
                                <?php endforeach; 
                            endif; ?>
                            <p class="hover:text-blue-600 transition-colors"><?php echo $small_animals_booking['phone-number_small-animals']; ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Find Us -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Hitta hit</h3>
                <div class="space-y-2 text-gray-700">
                    <?php 
                    $address_info = get_field('hitta_hit', 'option');
                    
                    if($address_info): ?>
                        <p class="font-medium"><?php echo $address_info['clinic_name']; ?></p>
                        <p><?php echo $address_info['clinic_address']; ?></p>
                        <p><?php echo $address_info['clinic_postnumber_and_city']; ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Contact -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4"><?php echo get_field('contact_title', 'option') ?: 'Kontakt'; ?></h3>
                <div class="space-y-2 text-gray-700">
                    <?php 
                    $contact_info = get_field('kontakt', 'option');
                    
                    if($contact_info): ?>
                    <div>
                        <p class="font-medium"><?php echo  $contact_info['telefontid_hastveterinar_text'] ?: 'Debug info'; ?></p>
                        <p><?php echo $contact_info['days_and_time'] ?: 'Debug info'; ?></p>
                        <p class="hover:text-blue-600 transition-colors"><?php echo $contact_info['telefon'] ?: 'Debug info'; ?></p>
                    </div>
                    <div class="mt-4">
                        <p class="hover:text-blue-600 transition-colors"><?php echo $contact_info['epost'] ?: 'Debug info'; ?></p>
                    </div>
                    <div class="mt-4">
                        <p class="font-medium"><?php echo get_field('emergency_title', 'option') ?: 'Hästakut:'; ?></p>
                        <p class="hover:text-blue-600 transition-colors"><?php echo $contact_info['hastakut'] ?: 'Debug info'; ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <?php 
                $clinic_name = get_field('hitta_hit', 'option');
                if($clinic_name): ?>
                <div class="text-gray-600">
                    © <?php echo $clinic_name['clinic_name']; ?> <?php echo date('Y'); ?>
                </div>
                <?php endif; ?>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Följ oss</span>
                    <?php if (get_field('facebook_url', 'option')): ?>
                    <a href="<?php echo esc_url(get_field('facebook_url', 'option'));  ?>"  class="text-gray-600 hover:text-blue-600 transition-colors" target="_blank" rel="noopener noreferrer">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Mobile Navigation Menu -->
<div id="nav-menu" class="fixed lg:hidden inset-0 bg-gray-900 transform transition-transform duration-300 ease-in-out translate-x-full z-[55] overflow-auto">
    

    <div class="container mx-auto px-6 pt-24 h-full overflow-y-auto">
        <div class="mobile-menu-content">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'container' => false,
                'menu_class' => 'mobile-menu-list flex flex-col items-start gap-3 lg:gap-6 text-xl text-white font-semibold',
                'fallback_cb' => false,
                'walker' => new Klinik_Nav_Walker()
            ));
            ?>
            <!-- Fallback menu in case WordPress menu doesn't load -->
            <div class="fallback-menu">
                <ul class="flex flex-col items-start gap-3 lg:gap-6 text-xl text-white font-semibold">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Hem</a></li>
                    <li><a href="<?php echo esc_url(home_url('/om-oss')); ?>">Om oss</a></li>
                    <li><a href="<?php echo esc_url(home_url('/kontakt')); ?>">Kontakt</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Mobile menu overlay -->
<div id="mobile-menu-overlay" class="fixed inset-0 bg-black/80 z-[50] lg:hidden opacity-0 pointer-events-none transition-opacity duration-300"></div>

<?php wp_footer(); ?>
</body>
</html> 