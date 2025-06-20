<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package AleKlinik_Custom_Theme
 */

get_header();
?>

<main>
    <section class="bg-white py-20">
        <div class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto text-center xl:py-16">
                <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6">404</h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-8">Sidan kunde inte hittas</h2>
                <p class="text-lg text-gray-600 mb-10">Tyvärr kunde vi inte hitta sidan du letar efter. Den kan ha flyttats, tagits bort eller så har du skrivit in fel adress.</p>

                <div class="flex flex-col md:flex-row justify-center gap-4 md:gap-6">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-medium py-3 px-6 rounded-md transition duration-300">
                        Gå till startsidan
                    </a>
                    <a href="<?php echo esc_url(home_url('/kontakt/')); ?>" class="inline-block bg-white border border-gray-700 hover:bg-gray-100 text-gray-700 font-medium py-3 px-6 rounded-md transition duration-300">
                        Kontakta oss
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
