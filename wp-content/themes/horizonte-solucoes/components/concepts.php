<?php
/**
 * Concepts
 *
 * Section and cards for home page
 *
 * Inputs: $title, $img, $cards
 *
 * @package Horizonte
 *
 * @param string $title -> Section title
 * @param array  $cards -> Image array
 *  [
 *       card_title       => (string) Card title,
 *       card_description => (string) Card description,
 *  ]
 */
?>

<section class="_concepts pb-8 py-lg-10">
    <div class="container mb-xl-10">
        <div class="row justify-content-center align-items-center">
			<div class="col-12">
				<?php Utils::get_template( 'components/title-description', array(
                    'title'       => $title,
                    'title_class' => 'animated fadeInDown text-center'
				)); ?>
			</div>
            <div class="col-10 col-md-7 col-lg-8 col-xl-7 mt-7">
                <div class="description">
                    <?=  $description; ?>
                </div>
            </div>
            <div class="col-8 offset-2 col-md-4 offset-md-1 col-lg-4 offset-lg-0 offset-xl-1 mt-0 mt-md-7 mt-lg-0">
                <div class="concept-img text-center animated fadeInDown">
                    <img
                        src="<?= $image['url'] ?>"
                        class="lozad"
                        alt="<?= $image['alt'] ?>">
                </div>
            </div>
        </div>
    </div>
</section>