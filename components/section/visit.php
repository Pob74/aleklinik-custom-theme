<?php


$horse_clinic = get_sub_field('horse_clinic_info');
$small_animal_clinic = get_sub_field('small_animal_clinic_info');
$notice = get_sub_field('notice');




// Check if we have the repeater
if ($horse_clinic && have_rows('horse_section', $horse_clinic)) {
    echo '<!-- Debug: We have horse sections -->';
    while (have_rows('horse_section', $horse_clinic)) {
        the_row();
        echo '<!-- Debug: Current row -->';
        var_dump(get_sub_field('title'));
        var_dump(get_sub_field('description'));
    }
} else {
    echo '<!-- Debug: No horse sections found -->';
}

?>

<!-- Visit Information Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Horse Clinic -->
            <?php if ($horse_clinic): ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-3xl font-light text-gray-900 mb-8"><?= esc_html($horse_clinic['title']); ?></h2>
                
                <div class="space-y-6">
                    <?php if ($horse_clinic['horse_section']): ?>
                        <?php foreach ($horse_clinic['horse_section'] as $section): ?>
                            <div class="space-y-2">
                                <h3 class="text-xl font-semibold text-gray-900"><?= esc_html($section['title']); ?></h3>
                                <p class="text-gray-600"><?= esc_html($section['content']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <p class="text-gray-600 italic mt-4"><?= esc_html($notice); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Small Animal Clinic -->
            <?php if ($small_animal_clinic): ?>
            <div class="bg-white rounded-2xl p-8 shadow-lg">
                <h2 class="text-3xl font-light text-gray-900 mb-8"><?= esc_html($small_animal_clinic['title']); ?></h2>

                <div class="space-y-6">
                    <?php if ($small_animal_clinic['small_animal_section']): ?>
                        <?php foreach ($small_animal_clinic['small_animal_section'] as $section): ?>
                            <div class="space-y-2">
                                <h3 class="text-xl font-semibold text-gray-900"><?= esc_html($section['title']); ?></h3>
                                <p class="text-gray-600"><?= esc_html($section['content']); ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>