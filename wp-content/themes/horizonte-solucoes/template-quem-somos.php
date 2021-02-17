<?php
/**
 * Template name: Quem somos
 *
 * The template for displaying the "Quem Somos" page
 *
 * @package Horizonte
 */

 get_header();

 global $page_class;

 Utils::get_template( 'pages/quem-somos', array( 'fields' => $page_class->data() ) );

 get_footer();