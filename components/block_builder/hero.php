<?php
$pre_title = get_sub_field('section_pre-title');
$title = get_sub_field('section_title');
$image = get_sub_field('section_image');
$show_latest_post = get_sub_field('show_latest_post');


// Get latest post if option is enabled
$latest_post = null;
if ($show_latest_post) {
    $latest_post = get_posts(array(
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));
}
?>

<div class="relative h-[70vh] w-full overflow-hidden">
    <!-- Placeholder background image -->
    <div class="absolute inset-0 bg-gray-400">
        <?php if ($image) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="w-full h-full object-cover">
        <?php endif; ?>
    </div>

    <!-- Dark overlay for better text visibility -->
    <div class="absolute inset-0 bg-black/40"></div>

    <!-- Content container -->
    <div class="relative h-full container mx-auto px-6">
        <div class="flex flex-col justify-center h-full max-w-5xl">
            <!-- Pre-heading -->
            <p class="text-white/90 text-xl md:text-2xl mb-4 font-light tracking-wide">
                <?php echo esc_html($pre_title); ?>
            </p>

            <!-- Main heading -->
            <h1 class="text-white text-4xl md:text-5xl lg:text-6xl font-bold leading-[1.2] md:leading-[1.2]">
                <?php echo esc_html($title); ?>
            </h1>
        </div>

        <?php if ($show_latest_post && !empty($latest_post)) : ?>
            <!-- Enhanced Latest post link - Gray theme -->
            <div class="absolute bottom-8 right-6 bg-white rounded-lg shadow-lg overflow-hidden border border-gray-700 w-72">
                <a href="<?php echo get_permalink($latest_post[0]->ID); ?>" class="block">
                    <div class="bg-gray-700 px-4 py-2 flex items-center justify-between">
                        <span class="text-white font-bold">AKTUELLT</span>
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <div class="p-4">
                        <span class="block text-gray-800 font-bold"><?php echo esc_html($latest_post[0]->post_title); ?></span>
                        <div class="mt-2 flex items-center text-gray-700 font-medium">
                            <span>Läs mer</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>