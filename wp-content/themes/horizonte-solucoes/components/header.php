<?php
/**
 * Header
 *
 * The website main header, including logo, and navigation
 *
 * @param boolean $is_background_dark If should use dark background, and white text & logo
 *
 * @package Horizonte
 */
?>

<header class="_header w-100 py-2 py-lg-3" role="banner">

	<?php
		// Mobile menu
		Utils::get_template( 'components/mobile-menu' );

		// Dedsktop menu
		Utils::get_template( 'components/desktop-menu' );
	?>

</header>