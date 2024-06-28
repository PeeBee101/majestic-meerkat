<?php
/**
 * Bamboo Nine Show Author Bio 
 * Note: This requires ACF to be installed and activated.
 * Please ensure that the acf.json file has been imported into the site.
 * Last Updated: 2013-06-12 - Amended "echo" with "return" to resolve render issues for the Block Editor when using shortcodes
 */
if ( function_exists( 'acf' ) ) {
	function show_author_bio() {
		
		$bio_out = '';
		// Define prefixed user ID
		$author_id = get_the_author_meta( 'ID' );
		$user_acf_id = 'user_' . $author_id;

		// Get the author name
		$author_name = get_the_author();

		// Author Image
		$author_image_id = get_field( 'author_image', $user_acf_id );
		$size = 'medium';

		if ( $author_image_id ) :
			$bio_out .= '<div class="bio-image">';

			// Get the image source, width and height for the default image size
			$image = wp_get_attachment_image_src( $author_image_id, $size );

			// Get the srcset attribute value for the image attachment
			$srcset = wp_get_attachment_image_srcset( $author_image_id );

			// Get the sizes attribute value for the image attachment
			$img_sizes = wp_get_attachment_image_sizes( $author_image_id, $size );

			// Get the alt text of the image attachment
			$img_alt_text = get_post_meta( $author_image_id, '_wp_attachment_image_alt', true );

			// Output the image tag with the src, srcset and sizes attributes
			$bio_out .= '<img src="' . esc_url( $image[0] ) . '" width="' . esc_attr( $image[1] ) . '" height="' . esc_attr( $image[2] ) . '" srcset="' . esc_attr( $srcset ) . '" sizes="' . esc_attr( $img_sizes ) . '" alt="' . $img_alt_text . '">';

			$bio_out .= '</div>';
		endif;    

		// Author Bio information - conditionally display either the short or the detailed bio, depending on if it is the 'author.php' template.
		// Get the author name of the current post
		if ( is_author() ) {
			// Get the Author Tag wrapper - e.g. H1, H2, div, span etc.
			$tag = get_field( 'author_title_tag', $user_acf_id );
            $show_archive_heading = get_field( 'author_archive_heading', $user_acf_id );

			$bio_out .= '<div class="author-detailed-bio">'; 
            
            if ($show_archive_heading == "yes" ) {
                $bio_out .= '<' . $tag . ' class="author-title">' . $author_name . '</' . $tag . '>';
            }
            
			$bio_out .= get_field( 'detailed_bio', $user_acf_id );
			$bio_out .= '</div>';
		} else {
			// Get the author URL of the current post
			$author_url = get_author_posts_url( $author_id );

			// Output the author name with a link to the author page
			$author_link = '<a class="author-link" href="' . esc_url( $author_url ) . '">' . esc_html( $author_name ) . '</a>';

			$bio_out .= '<div class="author-short-bio">';
			$bio_out .= $author_link;
			$bio_out .= get_field( 'short_bio', $user_acf_id );
			$bio_out .= '</div>';
		}

		// Social Icons and Links
		if ( have_rows( 'social_links', $user_acf_id ) ) :
			$social_display = get_field( 'social_display', $user_acf_id );

			$bio_out .= '<div class="social-links">';

			while ( have_rows( 'social_links', $user_acf_id ) ) :
				the_row();
				$bio_link = get_sub_field( 'link_url' );

				if ( $bio_link ) {
					$bio_out .= '<a href="' . $bio_link . '" target="_blank">';
					if ( $social_display != 'url' ) {
						$bio_out .= '<div class="bio-icon dashicons dashicons-' . get_sub_field( 'social_platform' ) . '"></div>';
					}
					if ( $social_display != 'icon' ) {
						$bio_out .= '<div class="bio-link">' . $bio_link . '</div>';
					}
					$bio_out .= '</a>';
				}
			endwhile;

			$bio_out .= '</div>';
		endif;

        // Check page type and add additonal class style
		if ( is_admin() ){
			$author_post_type = 'admin';
		} else {
			if ( is_author() ) { 
				$author_post_type = 'archive'; 
			} else if ( is_singular() ) {  
				$author_post_type = 'single'; 
			}
		}        

		$bio_out = '<div class="author-bio author-' . $author_post_type .  '">' . $bio_out . '</div>';

        $status = get_field( 'publish_status', $user_acf_id );

        // Check if the Status is Live, Preview or should be disabled
        if ( $status == 'live' ){
            return  $bio_out;
        } else {
            if ( $status === 'preview' && ( is_user_logged_in() && current_user_can( 'manage_options' ) ) ){
                $preview_out  = '<div class="show-author-preview">';
                $preview_out .= $bio_out;
                $preview_out .= '<div class="show-author-admin-msg">Admin Only Preview Mode</div>';
                $preview_out .= '</div>';
                return $preview_out;
            }
        }

	}

	add_shortcode( 'show_author_bio', 'show_author_bio' );
	
} else {
	// The user is logged in and is an administrator
	if ( is_user_logged_in() && current_user_can( 'manage_options' ) ) {
		function display_acf_error( $content ) {
			if ( ! is_admin() && ( is_single() || is_author() ) ) {
				$error_msg = '<div style="border:red 5px solid; padding: 20px; margin: 20px 0; font-size: 40px; text-align: center;">Please make sure Advanced Custom Fields (ACF) is installed and activated.</div>' . $content;

				echo $error_msg;
			}
		}
		add_filter( 'the_content', 'display_acf_error', 10, 1 );
	}
}
?>