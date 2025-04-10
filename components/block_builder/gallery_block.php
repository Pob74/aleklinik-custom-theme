<?php

$section_title = get_sub_field('section_title');
$section_description = get_sub_field('section_description');
$gallery_images = get_sub_field('gallery_images'); // Repeater field
$columns = get_sub_field('columns') ?: '3'; // Default to 3 columns
$section_color = get_sub_field('background_color') ?: 'bg-gray-50'; // Default to gray

// Dynamic Grid Classes based on 'columns' selection
$grid_cols_class = 'grid-cols-2'; // Default mobile columns (adjust if needed)
switch ($columns) {
    case '2':
        $grid_cols_class .= ' md:grid-cols-2';
        break;
    case '4':
        $grid_cols_class .= ' md:grid-cols-4';
        break;
    case '3':
    default:
        $grid_cols_class .= ' md:grid-cols-3';
        break;
}

// Generate a unique ID for this specific gallery instance
$gallery_id = 'gallery-' . uniqid();

?>
<section class="gallery-section py-16 md:py-24 <?php echo esc_attr($section_color); ?>">
    <div class="max-w-7xl mx-auto px-4">

        <?php // Optional Section Header ?>
        <?php if ($section_title || $section_description): ?>
            <div class="text-center max-w-3xl mx-auto mb-12 md:mb-16">
                <?php if ($section_title): ?>
                    <h2 class="text-3xl md:text-4xl font-light text-slate-800 mb-8"><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>
                <?php if ($section_description): ?>
                    <div class="text-xl text-gray-600 text-center mb-16 max-w-4xl mx-auto">
                        <?php echo wp_kses_post($section_description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php // Gallery Grid - Only output if images exist ?>
        <?php if ($gallery_images): ?>
            <div class="grid <?php echo esc_attr($grid_cols_class); ?> gap-4 md:gap-6 lg:gap-8">
                <?php foreach ($gallery_images as $gallery_item): ?>
                    <?php
                    $image = $gallery_item['image']; // Get the image array from the repeater row
                    if ($image): // Check if image data exists

                        // Get the URL for the full-size image for the lightbox link
                        $full_image_url = wp_get_attachment_image_url($image['ID'], 'full');

                        // Skip this item if we can't get the full image URL
                        if (!$full_image_url) {
                            continue;
                        }

                        // Alt text logic: Use image's alt > section title > fallback
                        $image_alt = trim($image['alt']);
                        $fallback_alt = $section_title ? esc_attr($section_title) . ' gallery image' : 'Gallery image';
                        $final_image_alt = !empty($image_alt) ? esc_attr($image_alt) : $fallback_alt;
                    ?>
                        <div class="gallery-item">
                            <a href="<?php echo esc_url($full_image_url); ?>"
                               class="lightbox"
                               data-gallery="<?php echo esc_attr($gallery_id); ?>">
                                <?php
                                // Display the medium_large image as the thumbnail
                                echo wp_get_attachment_image(
                                    $image['ID'],
                                    'medium_large', // Thumbnail size
                                    false,          // No icon
                                    [
                                        'alt'   => $final_image_alt, // Use the calculated alt text
                                        'class' => 'w-full h-auto object-cover rounded-lg shadow-md aspect-square transition-opacity duration-300 hover:opacity-80'
                                        // Added hover effect, adjust classes as needed
                                    ]
                                );
                                ?>
                            </a>
                        </div>
                    <?php endif; // End check for $image ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <?php // Optional: Message if no images ?>
            <!-- <p class="text-center text-gray-500 italic">No images added to this gallery yet.</p> -->
        <?php endif; // End check for $gallery_images ?>

    </div>
</section>