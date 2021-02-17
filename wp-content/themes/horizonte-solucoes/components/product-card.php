<?php

/**
 * Article Card
 *
 * Displays post image, category, title and excerpt.
 * Must be used inside wordpress loop.
 *
 * @package Horizonte
 *
 * @param string $classes - Container additional classes
 * @param string $thumbnail_size - post thumbnail size
 *
 */

?>
<article class="_product-card animated fadeInDown mx-auto">
	<a href="<?= $post_link; ?>" aria-label="<?= $title; ?>" title="<?= $title; ?>" class="stretched-link"></a>

	<div class="thumbnail position-relative">
		<img src="<?= $thumb; ?>" alt="<?= $title; ?>">

		<div class="overlay position-absolute  w-100 h-100 d-none d-lg-block"></div>
	</div>

	<div class="content py-3 px-2">
		<?php if( isset( $category ) && $category != "") : ?>
			<p class="text-red mb-1">
				<?= $category; ?>
			</p>
		<?php endif; ?>

		<h3 class="h4 title text-primary mt-2">
			<?= $title; ?>
		</h3>

		<?php if( isset( $desc ) && $desc != "" ): ?>
			<p> <?= $desc; ?> </p>
		<?php endif; ?>
	</div>
</article>