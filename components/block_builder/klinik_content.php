<?php 
$sectionTitle = get_sub_field('section_title');
$sectionDescription = get_sub_field('section_description');
$features = get_sub_field('feature'); // Ensure 'adventure' is the correct field name
?>

<!-- Features Section -->
<section id="features" class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-light text-gray-900 text-center mb-6"><?= esc_html($sectionTitle); ?></h2>
        <p class="text-xl text-gray-600 text-center mb-16 max-w-4xl mx-auto"><?= esc_html($sectionDescription); ?></p>
        <div class="grid md:grid-cols-2 gap-12 mt-16">
            <?php if ($features): ?>
                <?php foreach ($features as $feature): ?>
                    <div class="group bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                        <div class="relative h-80 overflow-hidden rounded-t-xl">
                            <?php 
                            $image = $feature['feature_image']['id'];
                            ?>
                            <?php if (!empty($image)) : ?>
                                <?php echo wp_get_attachment_image($image, 'medium_large', false, array('class' => 'w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-105')); ?>
                            <?php endif; ?>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-light text-gray-900 mb-4"><?= esc_html($feature['feature_title']); ?></h3>
                            <p class="text-gray-600 mb-6"><?= esc_html($feature['feature_description']); ?></p>
                            <?php 
                            $feature_link = $feature['feature_link']; 
                            if ($feature_link): 
                                $feature_url = is_a($feature_link, 'WP_Post') ? get_permalink($feature_link) : $feature_link;
                                $aria_label = $feature['feature_title'] . " läs mer om " . $feature['feature_title'];
                                
                            ?>
                                <a href="<?= esc_url($feature_url); ?>" aria-label="<?= esc_attr($aria_label); ?>" class="inline-flex items-center text-gray-900 hover:text-gray-600 transition-colors duration-200">
                                    Läs mer om tjänsten
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-500 text-center">Inga tjänster tillgängliga för tillfället.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
