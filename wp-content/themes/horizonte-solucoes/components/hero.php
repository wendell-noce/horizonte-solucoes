<?php
/**
 * Hero
 *
 * Hero slider for home page
 * @package Horizonte
 *
 * @param string $image_url    -> Image url for background hero
 * @param string $title        -> Hero title
 * @param string $description  -> Hero description
 * @param array  $cta -> [
 *     url (string)    -> Cta url,
 *     title (string)  -> Cta label,
 *     target (string) -> Cta target,
 * ]
 *
 */
?>

<section class="_hero position-relative">
    <!-- Title Overlay -->
    <div class="hero-overlay h-100 w-100"></div>

    <!-- Slider main container -->
    <div class="swiper-container hero-container  h-100 ">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper  h-100 ">
            <!-- Slides -->
            <div class="swiper-slide slide  h-100 ">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center justify-content-lg-start align-items-end align-items-md-center pb-8 pb-md-0">
                        <div class="col-10 col-lg-6 mt-10 mt-lg-0">
                            <div class="content text-center text-lg-left animated fadeInLeft mt-5 mt-lg-0">

                                <!-- Description -->
                                <?php if ( isset( $subtitle ) && $subtitle != "" ) : ?>
                                    <p class="text-uppercase"> <?= $subtitle ?> </p>
                                <?php endif; ?>

                                <!-- Title -->
                                <h2 class="title mb-3"> <?= $title; ?></h2>

                                <!-- CTA -->
                                <a
                                    href="<?= $cta['url']; ?>"
                                    class="btn btn-navyblue mt-3 mt-md-5 btn-cta position-relative"
                                    target="<?= (isset($cta['target'])) ? '_blank' : '_self'; ?>"
                                    <?= (isset($cta['target'])) ? 'rel="nofollow noopener"' : '' ?>
                                >
                                    <span><?= $cta['title']; ?></span>

                                    <i class="icon-arrow"></i>
                                </a>

                            </div>
                        </div>

                        <div class="col-10 col-lg-6 text-md-center">
                            <img src="<?= $image; ?>" alt="<?= $image_alt; ?>" class="" width="<?= $image_width; ?>" height="<?= $image_height; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide slide h-100 ">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center justify-content-lg-start align-items-end align-items-md-center pb-8 pb-md-0">
                        <div class="col-10 col-lg-6 mt-10 mt-lg-0">
                            <div class="content text-center text-lg-left animated fadeInLeft mt-5 mt-lg-0">

                                <!-- Description -->
                                <?php if ( isset( $subtitle ) && $subtitle != "" ) : ?>
                                    <p class="text-uppercase"> <?= $subtitle ?> </p>
                                <?php endif; ?>

                                <!-- Title -->
                                <h2 class="title mb-3"> <?= $title; ?></h2>

                                <!-- CTA -->
                                <a
                                    href="<?= $cta['url']; ?>"
                                    class="btn btn-navyblue mt-3 mt-md-5 btn-cta position-relative"
                                    target="<?= (isset($cta['target'])) ? '_blank' : '_self'; ?>"
                                    <?= (isset($cta['target'])) ? 'rel="nofollow noopener"' : '' ?>
                                >
                                    <span><?= $cta['title']; ?></span>

                                    <i class="icon-arrow"></i>
                                </a>

                            </div>
                        </div>

                        <div class="col-10 col-lg-6 text-md-center">
                            <img src="<?= $image; ?>" alt="<?= $image_alt; ?>" class="" width="<?= $image_width; ?>" height="<?= $image_height; ?>">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>

    
</section>