<?php
// check if the flexible content field has rows of data
if( have_rows('page_builder') ) {
     // loop through the rows of data
    while ( have_rows('page_builder') ) {
        the_row();
        if (get_row_layout() == 'Image And Text') {
            get_template_part('blocks/image-and-text');
        }
    }

} else {
    // no layouts found
}
?>