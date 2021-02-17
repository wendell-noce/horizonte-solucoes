<?php
/**
 * Quem Somos Page
 *
 * Template for the Quem Somos page
 *
 * @package Horizonte
 */
 //Utils::showme( $fields['concepts'] );
?>

<div id="quem-somos-page" class="page-content">
	<?php
		// // Get Page abnner
        Utils::get_template('components/page-banner', array(
            'title'      => $fields['banner']['title'],
            'url_banner' => $fields['banner']['url_banner']
		)); ?>

	<section class="about pb-7">
		<div class='container'>
			<div class='row align-items-center'>
				<div class='col-12 col-lg-6'>
					<div class="about-content my-5 my-10">
						<div class="text-center">
							<img src="<?= Utils::get_image_url_from_assets('hydrometer.svg'); ?>" alt="Hidrômetro" width="80">
							<?php Utils::get_template( 'components/title-with-border', array(
								'title' => $fields['content']['title']
							)); ?>

							<div class="content">
								<?= $fields['content']['text']; ?>
							</div>
						</div>
					</div>
				</div>
				<div class='col-12 col-lg-6 d-none d-lg-block'>
					<img src="<?= $fields['content']['image_url']; ?>" alt="<?= $fields['content']['image_alt']; ?>" width="<?= $fields['content']['image_w'] ?>" height="<?= $fields['content']['image_h'] ?>">
				</div>
			</div>

			<div class="row align-items-center">
				<?php
					foreach( $fields['concepts']['cards']['concepts_repeater'] as $key => $card) : ?>
					<div class="col-12 col-lg-4">
						<?php Utils::get_template( 'components/about-card', array(
							'title'       => $card['card_title'],
							'url_image'   => $card['card_ico']['url'],
							'alt_image'   => $card['card_ico']['alt'],
							'description' => $card['card_desc']
						)); ?>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
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