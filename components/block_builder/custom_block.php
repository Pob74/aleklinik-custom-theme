<?php



    $section_title = get_sub_field('section_title');
    $section_description = get_sub_field('section_description');
    $image = get_sub_field('image'); 
    $image_position = get_sub_field('image_position') ?: 'left'; 
    $content = get_sub_field('content'); 
    $section_color = get_sub_field('background_color') ?: 'bg-gray-50';


    // Determine grid classes based on image presence
    $grid_cols_class = $image ? 'md:grid-cols-2' : 'md:grid-cols-1'; // 2 cols if image, 1 col if no image
    $text_col_span_class = $image ? '' : 'md:col-span-1'; // Text spans 1 if no image (already in 1-col grid)

?>
<section class="image-text-block py-16 md:py-24 <?php echo $section_color; ?> "> 
    <div class="max-w-7xl mx-auto px-4">

        <?php // Optional Section Header ?>
        <?php if ($section_title || $section_description): ?>
            <div class="text-center max-w-4xl mx-auto mb-12 md:mb-16">
                <?php if ($section_title): ?>
                    <h2 class="text-3xl md:text-4xl font-light text-slate-800 mb-8"><?= esc_html($section_title); ?></h2>
                <?php endif; ?>
                <?php if ($section_description): ?>
                    <div class="text-xl text-gray-600 text-center mb-16 max-w-4xl mx-auto">
                        <?= wp_kses_post($section_description); // Use wpautop for textarea, or just echo if WYSIWYG ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php // Main Content Grid ?>
        <div class="grid grid-cols-1 <?= $grid_cols_class; ?> gap-12 md:gap-16 items-center">

            <?php // Image Column (Only output if image exists) ?>
            <?php if ($image): ?>
                <div class="image-column <?= ($image_position == 'right' ? 'md:order-2' : 'md:order-1'); ?>">
                     <?php
                        // Alt text logic: Use image's alt > section title > fallback
                        $image_alt = trim($image['alt']);
                        $fallback_alt = $section_title ? esc_attr($section_title) : 'Section image';
                        $final_image_alt = !empty($image_alt) ? esc_attr($image_alt) : $fallback_alt;

                        echo wp_get_attachment_image(
                            $image['ID'],
                            'medium_large', // Use 'large' or your custom size like 'content-area-image'
                            false,
                            [
                                'alt'   => $final_image_alt,
                                'class' => 'w-full h-auto rounded-lg shadow-lg object-cover' // Adjust classes as needed
                                // Consider adding width/height if using fixed aspect ratio size for CLS prevention
                            ]
                        );
                     ?>
                </div>
            <?php endif; ?>

            <?php // Text Content Column ?>
            <div class="text-content <?= $text_col_span_class; ?> <?= ($image_position == 'right' ? 'md:order-1' : 'md:order-2'); ?>">
                <?php // Apply Tailwind Typography for nice WYSIWYG styling ?>
                <div class="prose prose-slate lg:prose-lg max-w-none">
                    <?= $content;  ?>
                </div>
            </div>

        </div>
    </div>
</section>
