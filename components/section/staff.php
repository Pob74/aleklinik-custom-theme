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
                        <!-- Top Section with Image and Title -->
                        <div class="border-b border-gray-200">
                            <div class="flex-col lg:flex lg:flex-row  lg:items-center p-6">
                                <!-- Image -->
                                <div class="w-32 h-32 flex-shrink-0 mr-6">
                                    <?php if ($image): ?>
                                        <a href="#"
                                            class="staff-image-modal-trigger"
                                            data-image="<?php echo is_array($image) ? esc_url($image['url']) : esc_url($image); ?>"
                                            data-name="<?php echo esc_attr($name); ?>">
                                            <div class="w-full h-full overflow-hidden rounded-md relative group">
                                                <img
                                                    src="<?php echo is_array($image) ? esc_url($image['url']) : esc_url($image); ?>"
                                                    alt="<?php echo is_array($image) && isset($image['alt']) ? esc_attr($image['alt']) : esc_html($name); ?>"
                                                    class="w-full h-full object-cover object-left transition-transform duration-300 group-hover:scale-105">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-20 transition-all duration-300 flex items-center justify-center">
                                                    <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <!-- Name and Title -->
                                <div>
                                    <?php if ($name): ?>
                                        <h3 class="text-2xl font-bold text-gray-900">
                                            <?php echo esc_html($name); ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if ($title): ?>
                                        <div class="text-lg text-blue-600 mt-1">
                                            <?php echo esc_html($title); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Bottom Section with Text -->
                        <div class="p-6">
                            <?php if ($about): ?>
                                <div class="prose max-w-none text-gray-600">
                                    <?php echo wp_kses_post($about); ?>
                                </div>
                            <?php endif; ?>
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

<!-- Staff Image Modal -->
<div id="staff-image-modal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-80"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative z-10 max-w-4xl w-full bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 id="modal-title" class="text-xl font-semibold text-gray-900"></h3>
                <button id="close-modal" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="p-4 flex justify-center">
                <img id="modal-image" src="" alt="" class="max-h-[70vh] max-w-full object-contain">
            </div>
            <!-- No footer needed -->

        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('staff-image-modal');
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const closeButton = document.getElementById('close-modal');
        const triggers = document.querySelectorAll('.staff-image-modal-trigger');

        // Open modal when clicking on a staff image
        triggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const imageUrl = this.getAttribute('data-image');
                const name = this.getAttribute('data-name');

                modalImage.src = imageUrl;
                modalTitle.textContent = name;
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling
            });
        });

        // Close modal when clicking the close button
        closeButton.addEventListener('click', closeModal);

        // Close modal when clicking outside the modal content
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });

        // Close modal when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = ''; // Restore scrolling
        }
    });
</script>