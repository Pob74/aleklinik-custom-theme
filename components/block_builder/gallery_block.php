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

        <?php // Optional Section Header 
        ?>
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

        <?php // Gallery Grid - Only output if images exist 
        ?>
        <?php
        $total_images = count($gallery_images);
        $max_visible = 4;
        ?>
        <div class="grid <?php echo esc_attr($grid_cols_class); ?> gap-4 md:gap-6 lg:gap-8">
            <?php foreach ($gallery_images as $index => $gallery_item): ?>
                <?php
                if ($index >= $max_visible) break;
                $image = $gallery_item['image'];
                if ($image):
                    $full_image_url = wp_get_attachment_image_url($image['ID'], 'full');
                    if (!$full_image_url) continue;
                    $image_alt = trim($image['alt']);
                    $fallback_alt = $section_title ? esc_attr($section_title) . ' gallery image' : 'Gallery image';
                    $final_image_alt = !empty($image_alt) ? esc_attr($image_alt) : $fallback_alt;
                ?>
                    <div class="gallery-item relative">
                        <a href="<?php echo esc_url($full_image_url); ?>"
                            class="lightbox"
                            data-gallery="<?php echo esc_attr($gallery_id); ?>">
                            <?php
                            echo wp_get_attachment_image(
                                $image['ID'],
                                'medium_large',
                                false,
                                [
                                    'alt'   => $final_image_alt,
                                    'class' => 'w-full h-auto object-cover rounded-lg shadow-md aspect-square transition-opacity duration-300 hover:opacity-80'
                                ]
                            );
                            ?>
                            <?php if ($index === $max_visible - 1 && $total_images > $max_visible): ?>
                                <span class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20 rounded-lg text-white text-2xl font-bold pointer-events-none">
                                    +<?php echo $total_images - $max_visible; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <!-- Hidden links for lightbox functionality so all images are accessible -->
        <div style="display:none;">
            <?php foreach ($gallery_images as $index => $gallery_item): ?>
                <?php if ($index < $max_visible) continue; ?>
                <?php $image = $gallery_item['image'];
                if ($image):
                    $full_image_url = wp_get_attachment_image_url($image['ID'], 'full');
                    if (!$full_image_url) continue;
                    $image_alt = trim($image['alt']);
                    $fallback_alt = $section_title ? esc_attr($section_title) . ' gallery image' : 'Gallery image';
                    $final_image_alt = !empty($image_alt) ? esc_attr($image_alt) : $fallback_alt;
                ?>
                    <a href="<?php echo esc_url($full_image_url); ?>"
                        class="lightbox"
                        data-gallery="<?php echo esc_attr($gallery_id); ?>"
                        tabindex="-1"
                        aria-hidden="true"
                        style="display:none;">
                        <?php echo wp_get_attachment_image(
                            $image['ID'],
                            'medium_large',
                            false,
                            [
                                'alt'   => $final_image_alt
                            ]
                        ); ?>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>


    </div>
</section>