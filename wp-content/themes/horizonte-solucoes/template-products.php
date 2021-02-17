<?php
/**
 * Template name: Produtos
 *
 * The template for displaying the Products
 *
 * @package Horizonte
 */

get_header();

global $page_class;

Utils::get_template( 'pages/products-list', array( 'fields' => $page_class->data() ) );

get_footer();
?>