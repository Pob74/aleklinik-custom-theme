<?php get_header(); ?>

<section class="w-full bg-gray-50 py-8 md:py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row gap-8">
      <?php if (!get_field('hide_sidebar')): ?>
      <!-- Enhanced Sidebar -->
      <aside class="lg:w-1/3 xl:w-1/4 order-2 lg:order-1">
        <div class="sticky top-[140px] space-y-6">
          <!-- Small Animals Clinic Links -->
          <?php
          // Get the Tjänster post
          $tjanster = get_post(111);
          
          // Get child services
          $args_animal = array(
            'post_type' => array('smdjursklinik'),
            'post_parent' => '111',
            'posts_per_page' => 100,
            'order' => 'ASC',
            'orderby' => 'menu_order title'
          );
          $query_animal = new WP_Query($args_animal);
          
          if ($tjanster || $query_animal->have_posts()):
          ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
              <button class="w-full text-left text-xl font-bold text-gray-800 p-5 bg-gradient-to-r from-blue-50 to-white border-b border-gray-200 flex items-center justify-between sidebar-toggle" data-target="smadjur-menu">
                <span class="inline-block border-l-4 border-blue-500 pl-3">Smådjursklinik</span>
                <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <nav id="smadjur-menu" class="divide-y divide-gray-100 hidden">
                <?php
                // First display Tjänster
                if ($tjanster) {
                  $is_current = $tjanster->ID === get_queried_object_id();
                ?>
                  <a href="<?php echo esc_url(get_permalink($tjanster->ID)); ?>" 
                     class="flex items-center px-5 py-3.5 transition-all duration-200 relative before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 <?php 
                     echo $is_current 
                       ? 'bg-blue-50 text-blue-700 font-medium before:bg-blue-500' 
                       : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600 before:bg-transparent hover:before:bg-blue-200'; 
                     ?>">
                    <div class="w-4 flex-shrink-0 mr-2">
                      <?php if ($is_current): ?>
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                      <?php endif; ?>
                    </div>
                    <span><?php echo get_the_title($tjanster->ID); ?></span>
                  </a>
                <?php
                }
                
                // Then display child pages
                while ($query_animal->have_posts()) : $query_animal->the_post();
                  $title = get_the_title();
                  $link = esc_url(get_permalink());
                  $is_current = get_the_ID() === get_queried_object_id();
                ?>
                  <a href="<?php echo $link ?>" 
                     class="flex items-center px-5 py-3.5 transition-all duration-200 relative before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 <?php 
                     echo $is_current 
                       ? 'bg-blue-50 text-blue-700 font-medium before:bg-blue-500' 
                       : 'text-gray-700 hover:bg-gray-50 hover:text-blue-600 before:bg-transparent hover:before:bg-blue-200'; 
                     ?>">
                    <div class="w-4 flex-shrink-0 mr-2">
                      <?php if ($is_current): ?>
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                      <?php endif; ?>
                    </div>
                    <span><?php echo $title ?></span>
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
            'post_type' => array('smdjursklinik'),
            'post_parent' => '260', // Changed from 241 to 260 for smådjursklinik
            'posts_per_page' => 100,
            'order' => 'ASC',
            'orderby' => 'menu_order title'
          );
          $query_tips = new WP_Query($args_tips);
          if ($query_tips->have_posts()):
          ?>
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
              <button class="w-full text-left text-xl font-bold text-gray-800 p-5 bg-gradient-to-r from-green-50 to-white border-b border-gray-200 flex items-center justify-between sidebar-toggle" data-target="tips-menu-smadjur">
                <span class="inline-block border-l-4 border-green-500 pl-3">Tips och råd</span>
                <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
              </button>
              <nav id="tips-menu-smadjur" class="divide-y divide-gray-100 hidden">
                <?php
                while ($query_tips->have_posts()) : $query_tips->the_post();
                  $title = get_the_title();
                  $link = esc_url(get_permalink());
                  $is_current = get_the_ID() === get_queried_object_id();
                ?>
                  <a href="<?php echo $link ?>"
                    class="flex items-center px-5 py-3.5 transition-all duration-200 relative before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 <?php
                                                                                                                                                          echo $is_current
                                                                                                                                                            ? 'bg-green-50 text-green-700 font-medium before:bg-green-500'
                                                                                                                                                            : 'text-gray-700 hover:bg-gray-50 hover:text-green-600 before:bg-transparent hover:before:bg-green-200';
                                                                                                                                                          ?>">
                    <div class="w-4 flex-shrink-0 mr-2">
                      <?php if ($is_current): ?>
                        <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                      <?php endif; ?>
                    </div>
                    <span><?php echo $title ?></span>
                  </a>
                <?php endwhile; ?>
              </nav>
            </div>
          <?php
          endif;
          wp_reset_postdata();
          ?>

          <!-- Personal section -->
          <?php
          $personal_page = get_post(269);
          if ($personal_page) : 
              $is_current = 269 === get_queried_object_id();
          ?>
              <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100 transition-all duration-300 hover:shadow-lg">
                  <button class="w-full text-left text-xl font-bold text-gray-800 p-5 bg-gradient-to-r from-purple-50 to-white border-b border-gray-200 flex items-center justify-between sidebar-toggle" data-target="personal-menu">
                      <span class="inline-block border-l-4 border-purple-500 pl-3">Personal</span>
                      <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                      </svg>
                  </button>
                  <nav id="personal-menu" class="divide-y divide-gray-100 hidden">
                      <a href="<?php echo get_permalink($personal_page); ?>" 
                          class="flex items-center px-5 py-3.5 transition-all duration-200 relative before:absolute before:left-0 before:top-0 before:bottom-0 before:w-1 <?php 
                          echo $is_current 
                              ? 'bg-purple-50 text-purple-700 font-medium before:bg-purple-500' 
                              : 'text-gray-700 hover:bg-gray-50 hover:text-purple-600 before:bg-transparent hover:before:bg-purple-200'; 
                          ?>">
                          <div class="w-4 flex-shrink-0 mr-2">
                              <?php if ($is_current): ?>
                                  <svg class="w-4 h-4 text-purple-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                  </svg>
                              <?php endif; ?>
                          </div>
                          <span><?php echo get_the_title($personal_page); ?></span>
                      </a>
                  </nav>
              </div>
          <?php endif; ?>

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
                <span>info@smadjursklinik.se</span>
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
            <?php if (get_the_ID() == 111): ?>
              <!-- Only show title for Tjänster -->
              <div class="p-6 md:p-8">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900"><?php the_title(); ?></h1>
              </div>

              <?php
              // Get child services for Tjänster
              $args_services = array(
                'post_type' => 'smdjursklinik',
                'post_parent' => get_the_ID(),
                'posts_per_page' => -1,
                'order' => 'ASC',
                'orderby' => 'menu_order title'
              );
              $services_query = new WP_Query($args_services);
              
              if ($services_query->have_posts()): ?>
                <div class="px-6 md:px-8 pb-8">
                  <div class="grid sm:grid-cols-2 gap-6">
                    <?php while ($services_query->have_posts()): $services_query->the_post(); ?>
                      <a href="<?php echo esc_url(get_permalink()); ?>" 
                         class="group flex flex-col h-full bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 transition-all duration-300 hover:shadow-md hover:border-blue-200">
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
            <?php else: ?>
              <!-- Show full content for other posts -->
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
                    <?php the_content(); ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endwhile; endif; ?>
        </article>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?> 