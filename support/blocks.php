<?php
    
function display_blocks($block_id)
{
    if (have_rows('block_builder', $block_id)) {
        while (have_rows('block_builder', $block_id)) {
            the_row();
            $layout = get_row_layout();
            get_template_part(sprintf('components/block_builder/%s', $layout));
        }
    }
    
    if (have_rows('section', $block_id)) {
        while (have_rows('section', $block_id)) {
            the_row();
            $layout = get_row_layout();
            get_template_part(sprintf('components/section/%s', $layout));
        }
    }
}
?>