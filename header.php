<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>

<header id="header" class="sticky top-0 w-full z-50 px-6 py-4 bg-gray-100 opacity-70 transition-all duration-300 ease-in-out" style="transform: translateY(0);">
    <nav class="container mx-auto flex items-center justify-between">
        <!-- Logo -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="z-50">
            <div class="w-32 h-16">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo-sm.png" alt="Logo" class="w-full h-full object-contain">
            </div>
        </a>

        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="lg:hidden z-50">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Navigation Menu -->
        <div id="nav-menu" class="fixed lg:static inset-0 bg-gray-100 lg:bg-transparent transform lg:transform-none transition-transform duration-300 ease-in-out translate-x-full lg:translate-x-0">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
                'container' => false,
                'menu_class' => 'flex flex-col lg:flex-row items-center justify-center gap-12 h-full lg:h-auto p-8 lg:p-0',
                'fallback_cb' => false,
                'add_li_class' => 'text-lg hover:text-gray-600'
            ));
            ?>
        </div>
    </nav>
</header>
