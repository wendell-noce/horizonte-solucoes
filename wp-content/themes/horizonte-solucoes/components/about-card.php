<?php
/**
 * Aboutcard
 *
 * Add the component description here...
 *
 * @package Horizonte
 */
?>

<div class="_about-card text-center">
	<div class="ico">
		<img src="<?= $url_image; ?>" alt="<?= $alt_image; ?>" width="80">
	</div>
	<?php Utils::get_template( 'components/title-with-border', array(
		'title' => $title,
		'title_class' => 'h3'
	)); ?>
	<div class="content px-6">
	<?= $description; ?>
	</div>
</div>