<?php

class Klinik_Nav_Walker extends Walker_Nav_Menu {
    /**
     * Starts the list before the elements are added.
     */
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        // Add data-visible attribute for tablet toggle
        $output .= "\n$indent<ul class=\"sub-menu bg-white rounded-md shadow-lg py-2 mt-1 lg:group-hover:block\" data-visible=\"false\">\n";
    }

    /**
     * Ends the list of after the elements are added.
     */
    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start the element output.
     */
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        // Add standard menu item classes
        if ($args->walker->has_children) {
            $classes[] = 'menu-item-has-children';
        }
        
        // Check if item is current or parent is current
        $is_active = in_array('current-menu-item', $classes) || in_array('current-menu-parent', $classes);
        
        // Add depth-specific classes
        if ($depth === 0) {
            $classes[] = 'main-menu-item relative group';
        } else {
            $classes[] = 'sub-menu-item';
        }
        
        // Filter the CSS classes applied to a menu item's <li>
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        
        // Build the output
        $output .= $indent . '<li' . $class_names . '>';
        
        // Link attributes
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';
        
        // Add link classes based on depth
        if ($depth === 0) {
            $atts['class'] = 'inline-flex items-center px-4 py-2 text-lg font-medium transition duration-150 ease-in-out';
            $atts['class'] .= $is_active ? ' text-gray-700' : ' text-gray-900 hover:text-gray-700';
        } else {
            $atts['class'] = 'block px-4 py-2 text-sm transition duration-150 ease-in-out w-full';
            $atts['class'] .= $is_active ? ' text-gray-700 bg-gray-50' : ' text-gray-700 hover:bg-gray-100 hover:text-gray-900';
        }
        
        // Filter the HTML attributes applied to a menu item's <a>
        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
        
        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        
        // This filter is documented in wp-includes/post-template.php
        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);
        
        $item_output = $args->before;
        
        // Create a wrapper div for link and button if has children
        if ($args->walker->has_children && $depth === 0) {
            $item_output .= '<div class="flex items-center">';
        }
        
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        
        // Add dropdown toggle button for items with children
        if ($args->walker->has_children && $depth === 0) {
            // Add tablet/mobile toggle button
            $item_output .= '<button class="submenu-toggle ml-2 p-2 focus:outline-none hidden md:block lg:hidden">
                <svg class="h-4 w-4 transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>';
            
            // Add desktop dropdown arrow (visible only on desktop)
            $item_output .= '<svg class="hidden lg:block ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>';
            
            $item_output .= '</div>';
        }
        
        $item_output .= $args->after;
        
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args, $id);
    }
}