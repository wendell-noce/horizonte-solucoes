<?php
/**
 * AMP templates
 * 
 * Set AMP plugin to get template files from our theme
 * 
 * For more info: https://amp-wp.org/documentation/how-the-plugin-works/classic-templates/
 * 
 * @package Horizonte
 */

// Set the AMP templates directory
function amp_set_theme_template( $file, $type, $post ) {
	if ( 'single' === $type && 'post' === $post->post_type ) {
		$file = get_template_directory() . '/amp/single.php';
	}
	return $file;
}
add_filter( 'amp_post_template_file', 'amp_set_theme_template', 10, 3 );