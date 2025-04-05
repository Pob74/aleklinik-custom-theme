<?php get_header(); ?>

<div class="w-full bg-gray-50 py-8 md:py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <?php if (!get_field('hide_sidebar')): ?>
      <!-- Enhanced Sidebar -->
      <aside class="lg:w-1/3 xl:w-1/4 order-2 lg:order-1">
        <div class="sticky top-[140px] space-y-6">
          <!-- Horse Clinic Links -->
          <?php
          $args_horse = array(
            'post_type' => array('Hästklinik'),
            'post_parent' => '109',
            'posts_per_page' => 100,
            'order' => 'ASC',
            'orderby' => 'menu_order title'
          );
          $query_horse = new WP_Query($args_horse);
          if ($query_horse->have_posts()):
          ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
              <h2 class="text-xl font-bold text-gray-800 p-5 bg-gradient-to-r from-blue-50 to-white border-b border-gray-200">
                <span class="inline-block border-l-4 border-blue-500 pl-3">Hästklinik</span>
              </h2>
              <nav class="divide-y divide-gray-100">
                <?php
                while ($query_horse->have_posts()) : $query_horse->the_post();
                  $title = get_the_title();
                  $link = esc_url(get_permalink());
                  $is_current = get_the_ID() === get_queried_object_id();
                ?>
                  <a href="<?php echo $link ?>" 
                     class="flex items-center px-5 py-3.5 transition-colors duration-200 <?php echo $is_current ? 'bg-blue-50 text-blue-700 font-medium border-l-4 border-blue-500' : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600 border-l-4 border-transparent'; ?>">
                    <?php if ($is_current): ?>
                      <svg class="w-4 h-4 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    <?php endif; ?>
                    <span class="<?php echo $is_current ? 'ml-0' : 'ml-2'; ?>"><?php echo $title ?></span>
                  </a>
                <?php endwhile; ?>
              </nav>
            </div>
          <?php 
          endif;
          wp_reset_postdata();
          ?>

          <!-- Tips and Advice -->
          <?php
          $args_tips = array(
            'post_type' => array('Hästklinik'),
            'post_parent' => '239',
            'posts_per_page' => 100,
            'order' => 'ASC',
            'orderby' => 'menu_order title'
          );
          $query_tips = new WP_Query($args_tips);
          if ($query_tips->have_posts()):
          ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
              <h2 class="text-xl font-bold text-gray-800 p-5 bg-gradient-to-r from-green-50 to-white border-b border-gray-200">
                <span class="inline-block border-l-4 border-green-500 pl-3">Tips och råd</span>
              </h2>
              <nav class="divide-y divide-gray-100">
                <?php
                while ($query_tips->have_posts()) : $query_tips->the_post();
                  $title = get_the_title();
                  $link = esc_url(get_permalink());
                  $is_current = get_the_ID() === get_queried_object_id();
                ?>
                  <a href="<?php echo $link ?>" 
                     class="flex items-center px-5 py-3.5 transition-colors duration-200 <?php echo $is_current ? 'bg-green-50 text-green-700 font-medium border-l-4 border-green-500' : 'text-gray-700 hover:bg-gray-50 hover:text-green-600 border-l-4 border-transparent'; ?>">
                    <?php if ($is_current): ?>
                      <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                      </svg>
                    <?php endif; ?>
                    <span class="<?php echo $is_current ? 'ml-0' : 'ml-2'; ?>"><?php echo $title ?></span>
                  </a>
                <?php endwhile; ?>
              </nav>
            </div>
          <?php 
          endif;
          wp_reset_postdata();
          ?>

          <!-- Contact Information Box -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 p-5">
            <h3 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2 border-gray-200">Kontakta oss</h3>
            <div class="space-y-3 text-gray-700">
              <p class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>0123-456789</span>
              </p>
              <p class="flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span>info@hastklinik.se</span>
              </p>
              <a href="/kontakt" class="mt-3 inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                <span>Kontakta oss</span>
                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </aside>
      <?php endif; ?>

      <!-- Enhanced Main Content -->
      <div class="lg:w-2/3 xl:w-3/4 order-1 lg:order-2">
        <article class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php if (has_post_thumbnail()): ?>
              <div class="aspect-[16/9] overflow-hidden relative">
                <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-700 hover:scale-105']); ?>
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                <h1 class="absolute bottom-0 left-0 right-0 text-3xl md:text-4xl font-bold text-white p-6 md:p-8"><?php the_title(); ?></h1>
              </div>
            <?php else: ?>
              <div class="p-6 md:p-8 pb-0">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900"><?php the_title(); ?></h1>
              </div>
            <?php endif; ?>

            <div class="p-6 md:p-8">
              <?php if (!has_post_thumbnail()): ?>
                <div class="border-b border-gray-200 mb-6 pb-2"></div>
              <?php endif; ?>
              
              <?php if (!empty(get_the_content())): ?>
                <div class="prose prose-lg max-w-none">
                  <div class="prose-headings:text-gray-900 prose-headings:font-bold prose-p:text-gray-700 prose-p:leading-relaxed prose-p:mb-6 prose-a:text-blue-600 hover:prose-a:text-blue-800 prose-a:font-medium prose-a:transition-colors prose-a:duration-200 prose-strong:text-gray-900 prose-strong:font-semibold prose-ul:list-disc prose-ol:list-decimal prose-li:text-gray-700 prose-li:my-2 prose-blockquote:border-l-4 prose-blockquote:border-blue-300 prose-blockquote:pl-4 prose-blockquote:italic prose-blockquote:text-gray-700 prose-img:rounded-lg prose-img:shadow-lg">
                    <?php the_content(); ?>
                  </div>
                </div>
              <?php endif; ?>

              <?php
              // If this is a parent page (Tjänster), display child pages
              $current_id = get_the_ID();
              $args_services = array(
                'post_type' => 'hstklinik',
                'post_parent' => $current_id,
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order title'
              );
              $services_query = new WP_Query($args_services);
              
              if ($services_query->have_posts()): ?>
                <div class="mt-12">
                  <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b border-gray-200">Relaterade tjänster</h2>
                  <div class="grid sm:grid-cols-2 gap-6">
                    <?php while ($services_query->have_posts()): $services_query->the_post(); ?>
                      <a href="<?php echo esc_url(get_permalink()); ?>" 
                         class="group flex flex-col h-full bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 transition-all duration-300 hover:shadow-md hover:border-blue-200">
                        <?php if (has_post_thumbnail()): ?>
                          <div class="aspect-[16/9] overflow-hidden">
                            <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-105']); ?>
                          </div>
                        <?php endif; ?>
                        <div class="p-5 flex-grow flex flex-col">
                          <h3 class="text-xl font-semibold text-gray-900 group-hover:text-blue-700 transition-colors duration-200 mb-2">
                            <?php the_title(); ?>
                          </h3>
                          <?php if (has_excerpt()): ?>
                            <p class="text-gray-600 text-sm flex-grow">
                              <?php echo get_the_excerpt(); ?>
                            </p>
                          <?php endif; ?>
                          <div class="mt-4 pt-3 border-t border-gray-100 text-blue-600 font-medium flex items-center group-hover:text-blue-800">
                            <span>Läs mer</span>
                            <svg class="w-4 h-4 ml-1 transition-transform duration-200 group-hover:translate-x-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                          </div>
                        </div>
                      </a>
                    <?php endwhile; ?>
                  </div>
                </div>
              <?php 
              endif;
              wp_reset_postdata();
              ?>
            </div>
          <?php endwhile; endif; ?>
        </article>

        <!-- Breadcrumbs Navigation -->
        <div class="mt-6 text-sm text-gray-600">
          <div class="flex items-center space-x-2">
            <a href="<?php echo home_url(); ?>" class="hover:text-blue-600 transition-colors duration-200">Hem</a>
            <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <a href="/hastklinik" class="hover:text-blue-600 transition-colors duration-200">Hästklinik</a>
            <svg class="w-3 h-3 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-gray-800 font-medium"><?php the_title(); ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>