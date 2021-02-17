<?php
/**
 * Front-page template
 *
 * The template for displaying the website homepage (WP Front-page)
 *
 * @package Horizonte
 */
get_header();

global $page_class;

Utils::get_template( 'pages/home', array( 'fields' => $page_class->data() ) );

get_footer();
