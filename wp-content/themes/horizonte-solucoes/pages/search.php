<?php

/**
 * Blog Page
 *
 * Template for the blog landing page, that lists all articles
 *
 * @package Horizonte
 */
?>

<div id="blog-page" class="page-content">

	<main id="main">

		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-8">

					<?php
					Utils::get_template('components/blog-page-header', [
						'classes' => 'mb-8 pb-8 pb-lg-0',
						'title' => 'Blog',
						'description' => 'Resultados da busca para: <strong>' . get_search_query() . '</strong>'
					]);

					Utils::get_template('components/posts-listing', [
						'column_classes' => 'col-lg-6 mb-8'
					]);
					?>
				</div>

				<div class="col-12 col-lg-4">
					<?php Utils::get_template('components/sidebar'); ?>
				</div>
			</div>
		</div>
	</main>

</div>