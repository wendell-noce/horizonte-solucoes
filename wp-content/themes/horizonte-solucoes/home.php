<?php

/**
 * Template name: Blog
 *
 * The template for displaying the blog landing page
 *
 * @package Horizonte
 */

get_header();
global $page_class;

Utils::get_template('pages/blog', array( 'fields' => $page_class->data() ) );

get_footer();
