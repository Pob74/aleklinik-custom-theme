<?php
$sectionTitle = get_sub_field('title');
$sectionContent = get_sub_field('content');
$button_link = get_sub_field('button_link'); // This is a post object
$button_text = get_sub_field('button_text');

?>

<!-- Introduction Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-light mb-8"><?= esc_html($sectionTitle); ?></h2>
            <p class="text-xl text-gray-600 mb-12 tracking-wide"><?= esc_html($sectionContent); ?></p>

            <?php if (!empty($button_link)) : ?>
                <a href="<?= esc_url(get_permalink($button_link->ID)); ?>" class="inline-flex items-center group/btn">
                    <span class="relative inline-block px-8 py-3 bg-transparent border-2 border-gray-900 text-white rounded-full overflow-hidden transition-all duration-300 hover:px-10">
                        <span class="relative z-10 text-black group-hover/btn:text-white"><?= esc_html($button_text); ?></span>
                        <div class="absolute inset-0 bg-gray-900 transform -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-300"></div>
                    </span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
