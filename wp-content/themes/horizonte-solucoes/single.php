<?php

/**
 * Post template
 *
 * The template for displaying posts of type article (default WordPress posts)
 *
 * @package Horizonte
 */

get_header();

global $page_class;

Utils::get_template('pages/article',  array('fields' => $page_class->data() ));

get_footer();
