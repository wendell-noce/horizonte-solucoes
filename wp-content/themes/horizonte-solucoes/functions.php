<?php
/**
 * Functions
 *
 * Setup functions and theme definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Horizonte
 */

// Define environment as localhost, if not defined already
if(!defined('ENV')) { define('ENV', 'local'); }

// Class utils and static helper functions
require get_template_directory() . '/includes/classes/Utils.class.php';

// Theme base setup
require get_template_directory() . '/includes/theme-setup.php';

// Custom post types and taxonomies
require get_template_directory() . '/includes/template-manager.php';

// Enqueue styles and scripts
require get_template_directory() . '/includes/enqueues.php';

// Functions which enhance the theme by hooking into WordPress
require get_template_directory() . '/includes/template-functions.php';

// Enqueue styles for the admin panel
require get_template_directory() . '/includes/admin-customization.php';

// Autoloads theme template classes
require get_template_directory() . '/includes/theme-classes.php';

// Set the AMP template directory
require get_template_directory() . '/includes/amp-template.php';
