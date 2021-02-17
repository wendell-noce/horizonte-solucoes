<?php
/**
 * Card Segment
 *
 * Card of segments list
 *
 * @package Horizonte
 */
?>

<div class="_card-segment position-relative mb-xl-8 mb-4 transition mx-auto">
	<a href="<?= $url; ?>">
		<img src="<?= $image_url; ?>" alt="<?= $image_alt; ?>" width="<?= $image_w; ?>" height="<?= $image_h; ?>" class="image transition">
		<span class="title text-center text-lightgray d-block transition py-3 mt-3 mt-xl-0">
			<?= $title; ?>
		</span>
	</a>
</div>