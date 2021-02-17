<?php

/**
 * Products Page
 *
 * Template for the blog landing page, that lists all articles
 *
 * @package Horizonte
 */
?>

<div id="product-page" class="page-content">
	<?php
	// Get Page abnner
	Utils::get_template('components/page-banner', array(
		'title'      => "Produtos",
		'url_banner' =>Utils::get_image_url_from_assets('bg-page-header.jpg')
	)); ?>

	<main id="main">
		<div class="container-fluid">
			<div class="row mt-3 mt-lg-10">
				<?php foreach( $fields['produtos'] as $key => $post ): ?>
					<div class="col-6 col-lg-3 mb-5">
						<?php Utils::get_template( 'components/product-card', array(
							'title'     => $post['title'],
							'desc'      => $post['desc'],
							'category'  => $post['category'][0]->name,
							'thumb'     => $post['thumb']['sizes']['SIZE_383_383'],
							'post_link' => $post['link']
						)); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</main>

</div>