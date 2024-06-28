<?php
// check if the flexible content field has rows of data
if( have_rows('header_pagebuilder') ) {
     // loop through the rows of data
    while ( have_rows('header_pagebuilder') ) {
        the_row();
        if (get_row_layout() == 'Image And Text Header') {
            get_template_part('blocks/image-and-text-header');
        }
    }

} else {
    // no layouts found
}
?>