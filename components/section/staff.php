<?php
// Debug output
echo '<!-- Debug: Starting staff template -->';

// Check if we have staff members in the repeater
if (have_rows('staff')): ?>
    <div class="bg-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="space-y-8">
                <?php while (have_rows('staff')): the_row();
                    // Get the sub-fields from the repeater
                    $name = get_sub_field('name');
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $about = get_sub_field('about');
                ?>
                    <div class="bg-white overflow-hidden rounded-lg shadow-lg">
                        <div class="md:flex">
                            <!-- Image Column -->
                            <div class="md:w-1/3">
                                <?php if ($image): ?>
                                    <div class="h-full">
                                        <img 
                                            src="<?php echo is_array($image) ? esc_url($image['url']) : esc_url($image); ?>" 
                                            alt="<?php echo is_array($image) && isset($image['alt']) ? esc_attr($image['alt']) : ''; ?>" 
                                            class="w-full h-full object-cover"
                                        >
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Content Column -->
                            <div class="md:w-2/3 p-8">
                                <?php if ($name): ?>
                                    <h3 class="text-2xl font-bold text-gray-900 mb-2">
                                        <?php echo esc_html($name); ?>
                                    </h3>
                                <?php endif; ?>

                                <?php if ($title): ?>
                                    <div class="text-lg text-blue-600 mb-4">
                                        <?php echo esc_html($title); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($about): ?>
                                    <div class="prose max-w-none text-gray-600">
                                        <?php echo wp_kses_post($about); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <!-- Debug output if no staff members found -->
    <?php echo '<!-- Debug: No staff members found in repeater -->'; ?>
<?php endif; ?>
