<?php
// check if the flexible content field has rows of data
if( have_rows('header_pagebuilder') ) {
    // loop through the rows of data
    while ( have_rows('header_pagebuilder') ) {
        the_row();
        if (get_row_layout() == 'homepage_header') {
            get_template_part('blocks/homepage-header');
        }
    }

} else {
    // no layouts found
}
?>