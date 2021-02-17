<?php

/**
 * Theme setup
 *
 * Main configurations for the theme
 *
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Horizonte
 */

if (!function_exists('horizonte_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function horizonte_setup()
	{

		// Make theme available for translation.
		// Translations can be filed in the /languages/ directory.
		load_theme_textdomain('horizonte', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		// Let WordPress manage the document title.
		// By adding theme support, we declare that this theme does not use a hard-coded <title> tag, and expect WordPress to provide it for us.
		add_theme_support('title-tag');

		// Enable support for Post Thumbnails and add custom sizes
		require get_template_directory() . '/includes/image-sizes.php';

		// This theme uses wp_nav_menu() in the Header and Footer.
		register_nav_menus(array(
			'main-menu' => esc_html__('Menu Principal', 'admin'),
			'mobile-menu' => esc_html__('Menu Mobile', 'admin'),
			'social-menu' => esc_html__('Menu Social', 'admin'),
			'footer-menu' => esc_html__('Menu do Rodapé', 'admin')
		));

		// Switch default core markup for search form, gallery and image captions to output valid HTML5.
		add_theme_support('html5', array(
			'search-form',
			'gallery',
			'caption',
		));
	}
	add_action('after_setup_theme', 'horizonte_setup');

	// Remove the Comments option from the WP menu
	function remove_comments_from_menu()
	{
		remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'remove_comments_from_menu');
}

// Remove pages from the search
function exclude_pages_from_search()
{
	global $wp_post_types;
	$wp_post_types['page']->exclude_from_search = true;
}
add_action('init', 'exclude_pages_from_search', 99);

//Functions ACF Options Page
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' 	=> __('General Settings'),
		'menu_title'	=> __('Options'),
		'menu_slug' 	=> __('theme-options'),
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
