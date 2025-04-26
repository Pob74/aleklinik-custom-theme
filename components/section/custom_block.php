<?php
$section_title = get_sub_field('section_title');
$section_description = get_sub_field('section_description');
$image = get_sub_field('image');
$image_position = get_sub_field('image_position') ?: 'left';
$content = get_sub_field('content');
$section_color = get_sub_field('background_color') ?: 'bg-gray-50';
$link = get_sub_field('link'); // ACF link field with url/title/target
$is_after_header = get_sub_field('is_after_header') ?: false; // New field to check if section is right after header

// Function to determine if background is dark and return appropriate text classes
if (!function_exists('get_text_classes_for_bg')) {
    function get_text_classes_for_bg($bg_color)
    {
        $dark_backgrounds = ['bg-gray-800', 'bg-gray-900', 'bg-slate-800', 'bg-slate-900', 'bg-black'];

        if (in_array($bg_color, $dark_backgrounds)) {
            return [
                'heading' => 'text-white',
                'paragraph' => 'text-gray-200',
                'button_border' => 'border-white',
                'button_text' => 'text-white',
                'button_hover_text' => 'text-black',
                'button_bg' => 'bg-white'
            ];
        } else {
            return [
                'heading' => 'text-slate-800',
                'paragraph' => 'text-gray-600',
                'button_border' => 'border-gray-900',
                'button_text' => 'text-black',
                'button_hover_text' => 'text-white',
                'button_bg' => 'bg-gray-900'
            ];
        }
    }
}
$text_classes = get_text_classes_for_bg($section_color);
$has_image_or_content = $image || $content;
?>

<section class="image-text-block <?= $is_after_header ? 'pt-40 pb-24' : 'py-24'; ?> <?php echo $section_color; ?>">
    <div class="max-w-7xl mx-auto px-4">

        <?php if (!$has_image_or_content): ?>
            <!-- Simple centered layout -->
            <div class="max-w-4xl mx-auto text-center">
                <?php if ($section_title): ?>
                    <h2 class="text-4xl font-light mb-8 <?= $text_classes['heading']; ?>"><?= esc_html($section_title); ?></h2>
                <?php endif; ?>

                <?php if ($section_description): ?>
                    <p class="text-lg mb-12 tracking-wide <?= $text_classes['paragraph']; ?>"><?= esc_html($section_description); ?></p>
                <?php endif; ?>

                <?php if (!empty($link['url'])): ?>
                    <div class="mt-6">
                        <a href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target'] ?: '_self'); ?>" class="inline-flex items-center group/btn">
                            <span class="relative inline-block px-8 py-3 bg-transparent border-2 <?= $text_classes['button_border']; ?> text-white rounded-full overflow-hidden transition-all duration-300 hover:px-10">
                                <span class="relative z-10 <?= $text_classes['button_text']; ?> group-hover/btn:<?= $text_classes['button_hover_text']; ?>">
                                    <?= esc_html($link['title'] ?: 'Learn more'); ?>
                                </span>
                                <div class="absolute inset-0 <?= $text_classes['button_bg']; ?> transform -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-300"></div>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        <?php else: ?>
            <!-- Full layout with image/content -->
            <?php if ($section_title || $section_description): ?>
                <div class="text-center max-w-4xl mx-auto mb-12 md:mb-16">
                    <?php if ($section_title): ?>
                        <h2 class="text-3xl md:text-4xl font-light mb-8 <?= $text_classes['heading']; ?>"><?= esc_html($section_title); ?></h2>
                    <?php endif; ?>
                    <?php if ($section_description): ?>
                        <div class="text-xl text-center mb-16 max-w-4xl mx-auto <?= $text_classes['paragraph']; ?>">
                            <?= wp_kses_post($section_description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 <?= $image ? 'md:grid-cols-2' : 'md:grid-cols-1'; ?> gap-12 md:gap-16 items-center">

                <?php if ($image): ?>
                    <div class="image-column <?= ($image_position == 'right' ? 'md:order-2' : 'md:order-1'); ?>">
                        <?php
                        $image_alt = trim($image['alt']);
                        $fallback_alt = $section_title ? esc_attr($section_title) : 'Section image';
                        $final_image_alt = !empty($image_alt) ? esc_attr($image_alt) : $fallback_alt;

                        echo wp_get_attachment_image(
                            $image['ID'],
                            'medium_large',
                            false,
                            [
                                'alt'   => $final_image_alt,
                                'class' => 'w-full h-auto rounded-lg shadow-lg object-cover'
                            ]
                        );
                        ?>
                    </div>
                <?php endif; ?>

                <div class="text-content <?= !$image ? 'md:col-span-1' : ''; ?> <?= ($image_position == 'right' ? 'md:order-1' : 'md:order-2'); ?>">
                    <div class="prose lg:prose-lg max-w-none mb-6 <?= strpos($section_color, 'gray-800') !== false || strpos($section_color, 'gray-900') !== false ? 'prose-invert' : 'prose-slate'; ?>">
                        <?= $content; ?>
                    </div>

                    <?php if (!empty($link['url'])): ?>
                        <div class="mt-6">
                            <a href="<?= esc_url($link['url']); ?>" target="<?= esc_attr($link['target'] ?: '_self'); ?>" class="inline-flex items-center group/btn">
                                <span class="relative inline-block px-8 py-3 bg-transparent border-2 <?= $text_classes['button_border']; ?> text-white rounded-full overflow-hidden transition-all duration-300 hover:px-10">
                                    <span class="relative z-10 <?= $text_classes['button_text']; ?> group-hover/btn:<?= $text_classes['button_hover_text']; ?>">
                                        <?= esc_html($link['title'] ?: 'Learn more'); ?>
                                    </span>
                                    <div class="absolute inset-0 <?= $text_classes['button_bg']; ?> transform -translate-x-full group-hover/btn:translate-x-0 transition-transform duration-300"></div>
                                </span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        <?php endif; ?>
    </div>
</section>