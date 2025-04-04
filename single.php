<?php get_header(); ?>

<main class="py-12 lg:py-20">
    <div class="container mx-auto px-6">
        <?php while (have_posts()) : the_post(); ?>
            <article class="max-w-4xl mx-auto">
                <!-- Post Header -->
                <header class="mb-12">
                    <!-- Title -->
                    <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Meta -->
                    <div class="flex items-center text-gray-600 text-sm">
                        <time datetime="<?php echo get_the_date('c'); ?>">
                            <?php echo get_the_date(); ?>
                        </time>
                        <span class="mx-2">•</span>
                        <span><?php echo get_the_author(); ?></span>
                    </div>
                </header>

                <!-- Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="mb-12 rounded-2xl overflow-hidden">
                        <?php the_post_thumbnail('large', array('class' => 'w-full h-auto')); ?>
                    </div>
                <?php endif; ?>

                <!-- Content -->
                <div class="prose prose-lg max-w-none">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php if (has_tag()) : ?>
                    <div class="mt-12 pt-6 border-t border-gray-200">
                        <h3 class="text-sm font-semibold text-gray-600 uppercase mb-4">Taggar</h3>
                        <div class="flex flex-wrap gap-2">
                            <?php
                            $tags = get_the_tags();
                            foreach ($tags as $tag) : ?>
                                <span class="inline-block bg-gray-100 text-gray-700 text-sm px-3 py-1 rounded-full">
                                    <?php echo esc_html($tag->name); ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Navigation -->
                <nav class="mt-12 pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between gap-4">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>

                        <?php if ($prev_post) : ?>
                            <a href="<?php echo get_permalink($prev_post); ?>" class="group flex items-center text-gray-600 hover:text-blue-600">
                                <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="text-sm">Föregående inlägg</span>
                            </a>
                        <?php endif; ?>

                        <?php if ($next_post) : ?>
                            <a href="<?php echo get_permalink($next_post); ?>" class="group flex items-center text-gray-600 hover:text-blue-600">
                                <span class="text-sm">Nästa inlägg</span>
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </nav>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
