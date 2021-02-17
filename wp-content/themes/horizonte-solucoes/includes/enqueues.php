<?php

/**
 * Enqueues
 *
 * Enqueue scripts and styles
 *
 * For more info: https://developer.wordpress.org/reference/functions/wp_enqueue_script/, https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 * @package Horizonte
 */


function horizonte_enqueues()
{
	global $site_pages;
	global $page_class;

	// Replace jQuery for a newer version
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/libs/jquery.slim.min.js', array(), null, true);

	// Remove unnecessary scripts
	wp_deregister_script('wp-embed');

	// Scripts and Styles
	// The file version is based on the its last modified time, making sure the browser get the new file only when it has changed
	global $template_name;

	// Set $template_name for custom templates.
	if (is_page_template()) {
		$template_name = str_replace(['template-', '.php'], ['', ''], get_page_template_slug());
	}

	if (isset($template_name)) {
		// Theme scripts & styles
		$css_path = "/assets/css/dist/{$template_name}.dist.css";
		$js_path = "/assets/js/dist/{$template_name}.dist.js";
		wp_enqueue_style('horizonte-style', get_template_directory_uri() . $css_path, array(), filemtime(get_template_directory($css_path)));
		wp_enqueue_script('horizonte-scripts', get_template_directory_uri() . $js_path . "#defer", array('jquery'), filemtime(get_template_directory($js_path)), true);

		if (isset($site_pages[$template_name])) {
			$page_class = $site_pages[$template_name];
		}
	} else {
		echo 'Template not set';
	}
}
add_action('wp_enqueue_scripts', 'horizonte_enqueues');
