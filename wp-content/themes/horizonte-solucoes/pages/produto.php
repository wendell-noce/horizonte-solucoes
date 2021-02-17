<?php

/**
 * Blog Page
 *
 * Template for the blog landing page, that lists all articles
 *
 * @package Horizonte
 */
 	the_post();
	$id = get_the_ID();
	$feature_image = get_field('image');
	$brev_desc     = get_field('resumo');
	$informations  = get_field('informations');
	$descricao     = get_field('descricao');
	$categoria     = get_the_terms( $id, 'produto-category' );
	$segmento      = get_the_terms( $id, 'produto-segmentos' );
?>

<div id="article-page" class="page-content mt-10 pt-10">
	<main id="main">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6">
					<div class="image">
						<img src="<?= $feature_image['sizes']['medium_large']; ?>" alt="<?= $feature_image['alt']; ?>" width="<?= $feature_image['sizes']['medium_large-width']; ?>" height="<?= $feature_image['sizes']['medium_large-height']; ?>">
					</div>
				</div>
				<div class="col-12 col-lg-6 mt-4 mt-lg-0">
					<h1 class="h2 text-navyblue"> <?= get_the_title(); ?></h1>
					<div class="content">
						<?= $brev_desc; ?>
					</div>

					<h3 class="h4 mt-6"> Principais Características </h3>
					<div class="content">
						<?= $informations; ?>
					</div>
					<p class="mb-2"> <strong> CATEGORIA: </strong> <?= $categoria[0]->name; ?> </p>
					<p> <strong> SEGMENTO: </strong> <?= $segmento[0]->name; ?> </p>
					<a href="#" class="btn btn-red btn-orcamento" data-id="<?= $id; ?>" data-name="<?= get_the_title(); ?>"> Adicionar a lista de orçamento </a>
				</div>
				<div class="col-12 mt-8">
					<h3 class="mb-4"> Descrição </h3>
					<div class="content">
						<?= $descricao; ?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>