<?php

/**
 * Blog Page
 *
 * Template for the blog landing page, that lists all articles
 *
 * @package Horizonte
 */
?>

<div id="article-page" class="page-content">
	<main id="main">
		<div class="container">
			<?php while (have_posts()) : the_post(); ?>
				<div class="row">
					<div class="col-12 col-lg-8">
						<article <?php post_class('article-wrapper'); ?> id="post-<?php the_ID(); ?>">
							<?php
								// Title, Date and Featured Image
								Utils::get_template('components/article-header');

								// Content
								Utils::get_template('components/article-content');
							?>
						</article>
					</div>

					<div class="col-12 col-lg-4">
						<?php
							// Sidebar with Search and Categories List
							Utils::get_template('components/sidebar');
						?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<?php
			// // Related articles
			// Utils::get_template('components/related-articles', [
			// 	'related_articles' => $related_articles,
			// 	'popular_posts' => $popular_posts
			// ]);
		?>
	</main>
</div>