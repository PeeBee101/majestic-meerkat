<?php
// check if the flexible content field has rows of data
if( have_rows('page_builder') ) {
     // loop through the rows of data
    while ( have_rows('page_builder') ) {
        the_row();
        if (get_row_layout() == 'service_block') {
            get_template_part('blocks/service-block');
        }
    }

} else {
    // no layouts found
}
?>