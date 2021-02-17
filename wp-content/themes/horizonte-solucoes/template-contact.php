<?php
/**
 * Template name: Contato
 *
 * @package Ete
 */
 get_header();

 global $page_class;

 Utils::get_template( 'pages/contact', array( 'fields' => $page_class->data() ) );

 get_footer();
?>