<?php get_header(); ?>

<main class="min-h-screen bg-white  relative z-0 font-montserrat">
    <div class="w-full bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Title -->
            <h1 class="text-4xl font-bold text-gray-900 mb-12 text-center font-montserrat">Aktuellt</h1>

            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-3">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" class="flex flex-col bg-white rounded-lg shadow-sm overflow-hidden transition-shadow duration-300 hover:shadow-lg">
                        <!-- Featured Image -->
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" class="block aspect-[16/9] overflow-hidden">
                                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-300 hover:scale-105']); ?>
                            </a>
                        <?php endif; ?>

                        <div class="flex flex-col flex-grow p-6">
                            <!-- Post Date -->
                            <time datetime="<?php echo get_the_date('c'); ?>" class="text-sm text-gray-500 mb-3 flex items-center font-montserrat">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <?php echo get_the_date(); ?>
                            </time>

                            <!-- Post Title -->
                            <h2 class="text-xl font-bold text-gray-900 mb-4 hover:text-gray-700 transition-colors duration-200 font-montserrat">
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="text-gray-900 hover:text-gray-700">
                                    <?php the_title(); ?>
                                </a>
                            </h2>

                            <!-- Post Content -->
                            <div class="text-gray-600 mb-6 flex-grow font-montserrat">
                                <?php 
                                $content = get_the_content();
                                $content = wp_trim_words($content, 20, '...');
                                echo $content;
                                ?>
                            </div>

                            <!-- Read More Link -->
                            <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-gray-700 hover:text-gray-900 transition-colors duration-200 font-montserrat font-medium">
                                Läs mer
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endwhile; ?>

                <!-- Pagination -->
                <div class="col-span-full mt-12">
                    <div class="flex justify-center gap-2 font-montserrat">
                        <?php
                        echo paginate_links(array(
                            'prev_text' => '&larr; Föregående',
                            'next_text' => 'Nästa &rarr;',
                            'class' => 'px-4 py-2 bg-white text-gray-700 rounded-lg shadow-sm hover:bg-gray-50 transition-colors duration-200'
                        ));
                        ?>
                    </div>
                </div>

                <?php else : ?>
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-600 font-montserrat"><?php esc_html_e('Tyvärr, vi kunde inte hitta något innehåll.'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 