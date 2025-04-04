<?php
    
function display_blocks($block_id)
{
    if (have_rows('block_builder', $block_id)) {
        while (have_rows('block_builder', $block_id)) {
            the_row();
            get_template_part(sprintf('components/block_builder/%s', get_row_layout()));
        }
    }
}
?>