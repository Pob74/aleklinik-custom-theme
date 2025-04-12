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
    
</head>
<body <?php body_class(); ?>>
<?php do_action('wp_body_open'); ?>

<header id="header" class="sticky top-0 w-full z-50 px-6 py-4 transition-all duration-300 ease-in-out bg-white/95 backdrop-blur-md border-b border-gray-100/80 ">
    <div class="container mx-auto">
        <nav class="flex items-center justify-between relative">
            <!-- Logo -->
            <?php
            // Check if a custom logo is set and the function exists
            if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
                // Output the custom logo with its link
                // Note: the_custom_logo() outputs the <a> and <img> tag itself.
                // We add the 'z-50' class using a filter if needed, or adjust CSS.
                // For now, let's rely on CSS targeting '.custom-logo-link'.
                the_custom_logo();
            } else {
                // Fallback: Display the site title as a link if no logo is set
                // We add the 'z-50' class here to match your original structure.
                echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" class="site-title-link z-50">' . get_bloginfo( 'name' ) . '</a>';
            }
            ?>


            <!-- Mobile menu button -->
            <button id="mobile-menu-button" aria-label="Meny" class="lg:hidden z-50 p-2 rounded-lg hover:bg-gray-100 transition-colors fixed right-6 top-6">
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
                    'menu_class' => 'flex items-center justify-end gap-3 md:gap-4 xl:gap-12',
                    'fallback_cb' => false,
                    'walker' => new Klinik_Nav_Walker()
                ));
                ?>
            </div>
        </nav>
    </div>

</header>
