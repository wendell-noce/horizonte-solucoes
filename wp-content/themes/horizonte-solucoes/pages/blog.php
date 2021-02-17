<?php

/**
 * Blog Page
 *
 * Template for the blog landing page, that lists all articles
 *
 * @package Horizonte
 */

 //Utils::showme( $fields['posts'] );
?>

<div id="blog-page" class="page-content">
	<?php
	// // Get Page abnner
	Utils::get_template('components/page-banner', array(
		'title'      => "Blog",
		'url_banner' =>Utils::get_image_url_from_assets('bg-page-header.jpg')
	)); ?>

	<main id="main">
		<div class="container">
			<div class="row mt-3 mt-lg-10 pt-5">
				<div class="col-12 col-lg-8">

					<div class="posts-listing d-flex justify-content-between flex-wrap">
						<?php foreach( $fields['posts'] as $key => $post ): ?>
							<?php Utils::get_template( 'components/article-card', array(
								'title'    => $post['title'],
								'category' => $post['category'],
								'excerpt'  => $post['excerpt'],
								'thumb'    => $post['featured_img_url'],
								'post_link' => $post['post_link'],
								'date'     => $post['date']
							)); ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-12 col-lg-4">
					<?php Utils::get_template('components/sidebar'); ?>
				</div>
			</div>
		</div>
	</main>
	<?php
		// CTA
		Utils::get_template( 'components/cta-proposal', array(
			'title'      => $fields['cta']['title'],
			'btn_label'  => $fields['cta']['link']['title'],
			'btn_url'    => $fields['cta']['link']['url'],
			'btn_target' => $fields['cta']['link']['target'],
		));
	?>
</div>