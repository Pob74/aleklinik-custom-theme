<?php
$title = get_sub_field('section_title');

$section_intro = get_sub_field('about_introduction');
$facility = get_sub_field('facilities_section');
$team = get_sub_field('team_section');

?>

<section class="relative">


    <!-- Main Content -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">

        <!-- Section title -->
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-4xl font-bold text-gray-900"><?= esc_html($title); ?></h2>
        </div>
            
            <!-- Introduction -->
            <div class="max-w-7xl mb-20 mx-auto prose prose-xl text-gray-600">
                <?= wp_kses_post($section_intro); ?>
            </div>

            <!-- Facilities Section -->
              <?php if ($facility):
                $facility_image = $facility['facilities_image'];
                $facility_title = $facility['facilities_title'];
                $facility_description = $facility['facilities_description'];
                
                ?>
            <div class="grid md:grid-cols-2 gap-16 items-center mb-24">
               
                <div class="relative aspect-[4/3] rounded-2xl overflow-hidden shadow-xl">
                    <?php if ($facility_image): ?>
                    <?php echo wp_get_attachment_image($facility_image['ID'], 'medium_large', false, array('class' => 'w-full h-full object-cover')); ?>
                    <?php endif; ?>
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6"><?= esc_html($facility['facilities_title']); ?></h2>
                    <div class="prose prose-lg text-gray-600">
                        <?= wp_kses_post($facility['facilities_description']); ?>
                    </div>
                </div> 
            </div>
            <?php endif; ?>
               

            <!-- Team Section -->
            <?php if ($team):
              $team_title = $team['team_title']; 
              $team_description = $team['team_description'];
              $team_part = $team['team'];
              $career = $team['career'];
              

            ?>
            <div class="bg-gray-50 rounded-3xl p-8 md:p-12 mb-24">
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4"><?= esc_html($team_title);?> </h2>
                    <p class="prose prose-lg text-gray-600"><?= esc_html($team_description);?></p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Team Stats -->
                     <?php if ($team_part):
                     $team_title = $team_part['title'];
                     $team_items = $team_part['item'];
                     ?>

                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6"><?= esc_html($team_title);?></h3>
                        <?php if ($team_items): ?>
                        <ul class="space-y-4 prose prose-lg text-gray-600">
                            <?php foreach ($team_items as $item):
                           
                            ?>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-blue-500 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="ml-3"><?= esc_html($item['content']);?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>

                    <!-- Career Section -->
                    <?php if ($career):
                    $career_title = $career['title'];
                    $career_small_content = $career['small_content'];
                    $career_item = $career['item'];
                    
                    
                    ?>
                    <div class="bg-white rounded-xl p-8 shadow-sm">
                        <h3 class="text-2xl font-semibold text-gray-900 mb-6"><?= esc_html($career_title);?></h3>
                        <?php if ($career_item): ?>
                        <ul class="prose prose-lg text-gray-600">
                            <?php foreach ($career_item as $item): ?>
                            <li><?= esc_html($item['content']);?></li>
                            <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <p class="prose prose-sm text-gray-500"><?= esc_html($career_small_content);?></p>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact CTA -->
            <div class="text-center">
                <a href="/kontakt" class="inline-flex items-center justify-center px-8 py-4 border border-transparent text-lg font-medium rounded-full text-white bg-gray-600 hover:bg-gray-700 transition-colors duration-200">
                    Kontakta oss
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>