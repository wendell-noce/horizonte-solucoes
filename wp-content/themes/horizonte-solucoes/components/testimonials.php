<?php
/**
 * Testimonials
 *
 * Testimonials section of home page
 *
 * @package Horizonte
 *
 * @param string $title -> Section title
 * @param string $desc  -> Section description
 * @param array  $cards -> [
 *     card_image (array)  -> [
 *         ['sizes'] ['SIZE_366_190'] -> Image url,
 *         alt                        -> Image atl
 *     ],
 *     card_video (array)  -> [
 *         ['sizes'] ['SIZE_366_190'] -> Video image url,
 *         url                        -> Video url
 *     ],
 *     card_desc (string)   -> Card description
 *     card_name   (string) -> Name of person who made the testimonial
 *     card_office (string) -> Office of the person who made the testimony
 * ]

 */
?>

<section class="_testimonials bg-gradient py-9">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-7">
                <?php Utils::get_template( 'components/title-description', array(
                    'title'      => $title,
                    'title_class' => 'position-relative border-title text-white'
                )); ?>
            </div>
			<div class="col-12 col-md-6 col-lg-5">
                <?php Utils::get_template( 'components/title-description', array(
                    'title'      => 'Instagram',
                    'title_class' => 'position-relative text-navyblue mt-lg-5'
                )); ?>
            </div>
        </div>

        <?php if( isset($cards) && $cards !="" ) : ?>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="slide-testimonials">
                        <!-- Slider main container -->
                        <div class="swiper-container slide-depoimentos">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper pb-6">

                                 <?php foreach($cards as $key => $card):  ?>
                                    <!-- Slide -->
                                    <div class="swiper-slide">
                                        <?php if( isset($card['card_video']) && $card['card_video'] != "" ) : ?>
                                            <!-- Vídeo block -->
                                            <div class="video position-relative text-center mx-auto mb-n2">
                                                <video class="video-player" preload="none" poster="<?= $card['card_image']['sizes']['SIZE_366_190']; ?>">
                                                    <source src="<?= $card['card_video']['url']; ?>" type="video/mp4">
                                                    Your browser does not support HTML5 video.
                                                </video>
                                                <a href="#" class="play-video text-white undecorated-link"> <i class="icon-play"></i> </a>
                                            </div>

                                        <?php else: ?>
                                            <div class="image position-relative text-center mx-auto">
                                                <!-- Image block -->
                                                <img
                                                    src="<?= $card['card_image']['sizes']['SIZE_366_190']; ?>"
                                                    alt="<?= Utils::get_image_alt_text( $card['card_image']['alt'], $card['card_image']['url']); ?>"
                                                    width="<?= $card['card_image']['sizes']['SIZE_366_190-width']; ?>"
                                                    height="<?= $card['card_image']['sizes']['SIZE_366_190-height']; ?>"
                                                    class="lozad">
                                            </div>
                                        <?php endif; ?>
                                        <div class="box-description bg-white position-relative py-5 px-6 mx-lg-auto">
                                            <div class="description">
                                                <p class="mb-2">
                                                    <?= $card['card_desc']; ?>
                                                </p>
                                            </div>
                                            <p class="name mb-0 text-navyblue font-weight-bold"> <?= $card['card_name']; ?> </p>
                                            <p class="office mb-0"> <?= $card['card_office']; ?> </p>
                                        </div>
                                    </div>

                                <?php endforeach; ?>

                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="navigation d-none d-lg-block">
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>

                        </div>
                    </div>
                </div>
				<div class="col-12 col-md-6 col-lg-5">

				</div>
            </div>
        <?php endif; ?>
    </div>
</section>