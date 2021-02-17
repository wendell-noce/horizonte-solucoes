<?php
/**
 * Header template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package Horizonte
 */

global $template_name;
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
		// Google Tag Manager [Head]
		// if( defined('ENV') && ENV == 'production' ) {
		// 	Utils::get_template( 'includes/third-party/gtm-head', array(
		// 		'gtm_id' => 'GTM-5B6LPBC'
		// 	) );
		// }
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Color for the Android Chrome title bar -->
	<meta name="theme-color" content="#ffffff">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
		// Preconnects, Preloads and Prefetches
		Utils::get_template( 'includes/prelinks' );

		// Favicons
		Utils::get_template( 'includes/favicons', array( 'path' => get_template_directory_uri() . '/assets/img/favicons' ) );

		wp_head();
	?>
</head>

<body <?php body_class(); ?> data-template="<?= $template_name ?>">

<?php
	// Google Tag Manager [Body]
	// if( defined('ENV') && ENV == 'production' ) {
	// 	Utils::get_template( 'includes/third-party/gtm-body', array(
	// 		'gtm_id' => 'GTM-5B6LPBC'
	// 	) );
	// }
?>

<div id="page">
	<?php
		// TOP BAR
		Utils::get_template( 'components/top-bar');

		// HEADER
		Utils::get_template( 'components/header');

		// FLOATING CTA
		Utils::get_template( 'components/floating-cta' );
	?>

	<div id="content">