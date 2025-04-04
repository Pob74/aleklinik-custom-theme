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
                        <h4 class="font-medium">Hästklinik</h4>
                        <p>Mån - fre: 08.00 - 20.00</p>
                        <p>Lör - sön: 09.00 - 15.00</p>
                    </div>
                    <div class="text-gray-700 mt-4">
                        <h4 class="font-medium">Smådjursklinik</h4>
                        <p>Mån - fre: 08.00 - 16.00</p>
                    </div>
                </div>
            </div>

            <!-- Booking -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Tidsbokning</h3>
                <div class="space-y-2 text-gray-700">
                    <p>Mån - fre: 08.00 - 17.00</p>
                    <div class="mt-4">
                        <p class="font-medium">Hästklinik</p>
                        <p class="hover:text-blue-600 transition-colors">0303-33 59 60</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-medium">Smådjursklinik</p>
                        <p class="hover:text-blue-600 transition-colors">0303-33 59 70</p>
                    </div>
                </div>
            </div>

            <!-- Find Us -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Hitta hit</h3>
                <div class="space-y-2 text-gray-700">
                    <p class="font-medium">Ale Djurklinik</p>
                    <p>Norra Kilandavägen 22</p>
                    <p>449 34 Nödinge</p>
                </div>
            </div>

            <!-- Contact -->
            <div class="space-y-4">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Kontakt</h3>
                <div class="space-y-2 text-gray-700">
                    <div>
                        <p class="font-medium">Telefontid hästveterinär</p>
                        <p>Mån - fre 8:30-9:00</p>
                        <p class="hover:text-blue-600 transition-colors">0303-33 59 60</p>
                    </div>
                    <div class="mt-4">
                        <p class="hover:text-blue-600 transition-colors">hast@aledjurklinik.se</p>
                    </div>
                    <div class="mt-4">
                        <p class="font-medium">Hästakut:</p>
                        <p class="hover:text-blue-600 transition-colors">0769-42 88 03</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="mt-12 pt-8 border-t border-gray-200">
            <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="text-gray-600">
                    © Ale Djurklinik <?php echo date('Y'); ?>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html> 