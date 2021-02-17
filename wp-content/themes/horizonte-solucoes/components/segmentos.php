<?php
/**
 * Segmentos
 *
 * Component for home page
 *
 * @package Horizonte
 */
?>

<section class="_segmentos pt-8">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-12 mb-6'>
                <?php Utils::get_template( 'components/title-description', array(
                    'title'       => $title,
                    'title_class' => ' text-center animated fadeInDown',
                )); ?>
            </div>

            <!-- Segmentos list -->
            <?php foreach($cards as $key => $segmento ) : ?>
                <div class="col-6 col-lg-3">
					<?php Utils::get_template( 'components/card-segment', array(
						'url'       => $segmento['seg_link'],
						'image_url' => $segmento['qs_image']['sizes']['SIZE_383_273'],
						'image_alt' => $segmento['qs_image']['alt'],
						'image_w'   => $segmento['qs_image']['sizes']['SIZE_383_273-width'],
						'image_h'   => $segmento['qs_image']['sizes']['SIZE_383_273-height'],
						'title'     => $segmento['title']
					)); ?>
				</div>
            <?php endforeach; ?>
        </div>
    </div>
</section>