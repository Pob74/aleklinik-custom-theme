<?php
$title = get_sub_field('section_title');
$description = get_sub_field('section_description');
$horse_clinic = get_sub_field('horse_clinic');
$small_animal_clinic = get_sub_field('small_animal_clinic');

?>

<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-6">
        <!-- Section title -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4"><?= esc_html($title); ?></h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto"><?= esc_html($description); ?></p>
        </div>

        <!-- Horse Clinic Section -->
        <div class="flex flex-col md:flex-row items-center mb-20 gap-8 md:gap-12">
            <!-- Image Column -->
            <div class="w-full md:w-1/2 rounded-xl overflow-hidden shadow-lg">
                <img src="<?= esc_url($horse_clinic['image']['url']); ?>"
                    alt="<?= esc_attr($horse_clinic['label']); ?>"
                    class="w-full h-96 object-cover">
            </div>

            <!-- Content Column -->
            <div class="w-full md:w-1/2">
                <span class="inline-block bg-gray-700 text-white px-4 py-1 rounded-full text-sm font-medium mb-4"><?= esc_html($horse_clinic['label']); ?></span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4"><?= esc_html($horse_clinic['title']); ?></h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    <?= esc_html($horse_clinic['description']); ?>
                </p>
                <?php if (!empty($horse_clinic['features'])) : ?>
                    <ul class="mb-8 space-y-2">
                        <?php foreach ($horse_clinic['features'] as $feature) : ?>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span><?= esc_html($feature['feature']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <a href="<?= esc_url($horse_clinic['button_url']); ?>" class="inline-flex items-center px-6 py-3 bg-gray-700 text-white font-medium rounded-lg transition-colors hover:bg-gray-800">
                    <?= esc_html($horse_clinic['button_text']); ?>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Small Animal Clinic Section (Reversed Layout) -->
        <div class="flex flex-col md:flex-row-reverse items-center gap-8 md:gap-12">
            <!-- Image Column -->
            <div class="w-full md:w-1/2 rounded-xl overflow-hidden shadow-lg">
                <img src="<?= esc_url($small_animal_clinic['image']['url']); ?>"
                    alt="<?= esc_attr($small_animal_clinic['label']); ?>"
                    class="w-full h-96 object-cover">
            </div>

            <!-- Content Column -->
            <div class="w-full md:w-1/2">
                <span class="inline-block bg-gray-700 text-white px-4 py-1 rounded-full text-sm font-medium mb-4"><?= esc_html($small_animal_clinic['label']); ?></span>
                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4"><?= esc_html($small_animal_clinic['title']); ?></h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    <?= esc_html($small_animal_clinic['description']); ?>
                </p>
                <?php if(!empty($small_animal_clinic['features'])) : ?>
                <ul class="mb-8 space-y-2">
                    <?php foreach($small_animal_clinic['features'] as $feature) : ?>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span><?= esc_html($feature['feature']); ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <a href="<?= esc_url($small_animal_clinic['button_url']); ?>" class="inline-flex items-center px-6 py-3 bg-gray-700 text-white font-medium rounded-lg transition-colors hover:bg-gray-800">
                    <?= esc_html($small_animal_clinic['button_text']); ?>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>