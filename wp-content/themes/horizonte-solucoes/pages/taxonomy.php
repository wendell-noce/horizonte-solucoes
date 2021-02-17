<?php

/**
 * Category
 *
 * Lists posts from the current category
 *
 * @package Horizonte
 */
	$cat = get_queried_object();
	$produtos_query = new \WP_Query([
		'post_type'      => 'produto',
		'posts_per_page' => -1,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'produto-segmentos',
				'field'    => 'slug',
				'terms'    => $cat->slug
			),
			array(
				'taxonomy' => 'produto-category',
				'field'    => 'slug',
				'terms'    => $cat->slug
			),
		),
	]);
	$produtcs = [];
	while ($produtos_query->have_posts()):
		$produtos_query->the_post();

		$produtcs[] = [
			'thumb'    => get_field('image'),
			'category' => get_the_terms( get_the_ID(), 'produto-category' ),
			'title'    => get_the_title(),
			'desc'     => get_field('resumo'),
			'link'     =>  get_the_permalink(),
		];
	endwhile;
	wp_reset_postdata();
?>

<div id="segmentos-page" class="page-content">
	<?php
	//Get Page abnner
	Utils::get_template('components/page-banner', array(
		'title'      => $cat->name,
		'url_banner' =>Utils::get_image_url_from_assets('bg-page-header.jpg')
	)); ?>

	<main id="main">
		<div class="container">
			<div class="row mt-3 mt-lg-10">
				<?php
				foreach( $produtcs as $key => $post ): ?>
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