<?php
    
function display_blocks($block_id)
{
    echo '<!-- Debug: display_blocks called with ID: ' . $block_id . ' -->';
    
    if (have_rows('block_builder', $block_id)) {
        echo '<!-- Debug: Found block_builder rows -->';
        while (have_rows('block_builder', $block_id)) {
            the_row();
            $layout = get_row_layout();
            echo '<!-- Debug: block_builder layout = ' . $layout . ' -->';
            get_template_part(sprintf('components/block_builder/%s', $layout));
        }
    } else {
        echo '<!-- Debug: No block_builder rows found -->';
    }
    
    if (have_rows('section', $block_id)) {
        echo '<!-- Debug: Found section rows -->';
        while (have_rows('section', $block_id)) {
            the_row();
            $layout = get_row_layout();
            echo '<!-- Debug: section layout = ' . $layout . ' -->';
            echo '<!-- Debug: Looking for template: components/section/' . $layout . '.php -->';
            get_template_part(sprintf('components/section/%s', $layout));
        }
    } else {
        echo '<!-- Debug: No section rows found -->';
    }
}
?>