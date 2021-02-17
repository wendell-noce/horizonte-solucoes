<?php

/**
 * Category template
 *
 * Template for displaying a posts category page
 *
 * @package Horizonte
 */

get_header();

global $page_class;

Utils::get_template('pages/category', array( 'fields' => $page_class->data() ));

get_footer();
