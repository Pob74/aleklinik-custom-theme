<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    
    <title><?php
        if (is_front_page()) {
            bloginfo('name'); echo ' - '; bloginfo('description');
        } elseif (is_singular('hstklinik')) {
            echo 'Hästklinik - '; wp_title('', true, 'right'); echo ' | '; bloginfo('name');
        } elseif (is_singular('smdjursklinik')) {
            echo 'Smådjursklinik - '; wp_title('', true, 'right'); echo ' | '; bloginfo('name');
        } else {
            wp_title('', true, 'right'); echo ' | '; bloginfo('name');
        }
    ?></title>

    <?php if (is_singular() && has_excerpt()) : ?>
        <meta name="description" content="<?php echo esc_attr(get_the_excerpt()); ?>">
    <?php else : ?>
        <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php endif; ?>

    <?php wp_head(); ?>
    <style>
        /* Mobile menu styling */
        #nav-menu { background-color: #1f2937; } /* bg-gray-900 equivalent */
        /* Removed forced white color to fix visibility issue */
        #nav-menu svg { color: white !important; }
        #nav-menu .menu-item { margin-bottom: 1.5rem; }
        #nav-menu .sub-menu { margin-top: 0.75rem; margin-left: 1.5rem; }
        #nav-menu .sub-menu .menu-item { margin-bottom: 0.75rem; }
        #nav-menu ul, #nav-menu li { color: white !important; }
    </style>
</head>
<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>

<header id="header" class="sticky top-0 w-full z-50 px-6 py-4 transition-all duration-300 ease-in-out bg-white/95 backdrop-blur-md border-b border-gray-100/80 ">
    <div class="container mx-auto">
        <nav class="flex items-center justify-between relative">
            <!-- Logo -->
            <a href="<?php echo esc_url(home_url('/')); ?>" class="z-50">
                <div class="w-32 h-16">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-sm.png" alt="Logo" class="w-full h-full object-contain">
                </div>
            </a>

            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="lg:hidden z-50 p-2 rounded-lg hover:bg-gray-100 transition-colors fixed right-6 top-6">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Desktop Navigation Menu -->
            <div class="hidden lg:block">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary_menu',
                    'container' => false,
                    'menu_class' => 'flex items-center justify-end gap-12',
                    'fallback_cb' => false,
                    'walker' => new Klinik_Nav_Walker()
                ));
                ?>
            </div>
        </nav>
    </div>

</header>
