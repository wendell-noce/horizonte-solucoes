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
<article class="_article-card mb-5 animated fadeInDown">
	<a href="<?= $post_link; ?>" aria-label="<?= $title; ?>" title="<?= $title; ?>" class="stretched-link"></a>

	<div class="thumbnail">
		<img src="<?= $thumb; ?>" alt="<?= $title; ?>">
	</div>

	<div class="content p-6">
		<p class="text-green">
			<?= $category; ?>
		</p>

		<h2 class="title h4 mb-4 text-white mt-2">
			<?= $title; ?>
		</h2>

		<div class="excerpt mb-4 text-white">
			<?= $excerpt; ?>
		</div>

	</div>
</article>