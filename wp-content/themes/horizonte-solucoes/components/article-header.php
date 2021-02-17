<?php

/**
 * Article Header
 *
 * Displays post category, title and date.
 *
 * @package Horizonte
 */
?>

<header class="_article-header mb-8">
	<?php Utils::get_template('components/post-categories', ['classes' => 'mb-4']); ?>

	<h1 class="title h2 mb-3">
		<?php the_title(); ?>
	</h1>

	<div class="date mb-3"><?php the_date() ?></div>

	<div class="mt-8 mx-n4 mx-sm-0">
		<?php the_post_thumbnail(); ?>
	</div>
</header>