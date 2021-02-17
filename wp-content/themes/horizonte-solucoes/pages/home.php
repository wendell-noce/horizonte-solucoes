<?php
/**
 * Front-page template
 *
 * The template for displaying the website homepage (WP Front-page)
 *
 * Input: $fields
 *
 * @package Horizonte
 */
 //Utils::showme( $fields );
?>

<div id="home-page" class="page-content overflow-x-hidden">

	<?php
		// HERO
		Utils::get_template( 'components/hero', array(
			'title'        => $fields['hero']['title'],
			'subtitle'     => $fields['hero']['subtitle'],
			'cta'          => $fields['hero']['cta'],
			'image'        => $fields['hero']['image']['sizes']['SIZE_421_437'],
			'image_width'  => $fields['hero']['image']['sizes']['SIZE_421_437-width'],
			'image_height' => $fields['hero']['image']['sizes']['SIZE_421_437-height'],
			'image_alt'    => $fields['hero']['image']['alt']
		) );

		//Segmentos
		Utils::get_template( 'components/segmentos', array(
			'title'         => $fields['segmentos']['title'],
			'cards'         => $fields['segmentos']['cards'],
		));

		// PRODUTOS
		Utils::get_template( 'components/products-home', array(
			'title' => $fields['produtos']['title'],
			'cards' => $fields['produtos']['cards'],
		) );

		// CONCEPTS
		Utils::get_template( 'components/concepts', array(
			'title'       => $fields['concepts']['title'],
			'description' => $fields['concepts']['description'],
			'image'       => $fields['concepts']['image']
		) );

		// TESTIMONIALS
		Utils::get_template( 'components/testimonials', array(
			'title' => $fields['testimonials']['title'],
			'cards' => $fields['testimonials']['cards'],
		) );

		// MIDIAS
		Utils::get_template( 'components/clientes', array(
			'title' => $fields['clientes']['title'],
			'cards' => $fields['clientes']['cards'],
		) );

		Utils::get_template( 'components/parceiros', array(
			'title' => $fields['parceiros']['title'],
			'cards' => $fields['parceiros']['cards'],
		) );
	?>

</div>