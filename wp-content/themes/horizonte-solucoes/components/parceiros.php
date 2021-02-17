<?php
/**
 * Midias
 *
 * Component for show midias on home page
 *
 * @param string $title -> Section title
 * @param array  $cards -> [
 *     card_image (array)  -> [
 *         url -> Url image,
 *         alt -> Alt image
 *     ],
 *     card_url (string)   -> Cta url,
 * ]
 *
 * @package Horizonte
 */
?>

<section class="_parceiros py-10">
    <div class="container big-container">
        <div class="row align-items-md-center">
            <div class="col-12 col-md-6 col-lg-9 order-2 order-lg-1">
				<div class="slide-clientes">

					<!-- Slider main container -->
					<div class="swiper-container swiper-cilentes" dir="rtl">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">

							<?php foreach( $cards as $card ) : ?>
								<!-- Slide -->
								<div class="swiper-slide">
									<div class="client-box position-relative">
										<?php if( isset( $card['cliente_link'] ) ): ?>
											<a href="<?= $card['cliente_link']; ?>" target="_blank" rel="nofollow noopener" title="Link opens in a new window" class="undecorated-link">
										<?php endif; ?>

											<img
												src="<?= $card['cliente_logo']['url']; ?>"
												alt="<?= $card['cliente_logo']['alt']; ?>"
												class="lozad"
											>

											<div class="name text-center">
												<?php echo $card['cliente_nome'] ?>
											</div>

										<?php if( isset( $card['cliente_link'] ) ): ?>
											</a>
										<?php endif; ?>
									</div>
								</div>

							<?php endforeach; ?>

						</div>
					</div>
				</div>

			</div>
			
			<div class="col-12 col-md-6 col-lg-3 mb-6 mb-md-0 order-1 order-lg-2">
                <?php Utils::get_template( 'components/title-description', array(
                    'title'			=> $title,
                    'title_class'	=> 'text-center text-md-left mb-0 h3'
                )); ?>
            </div>
        </div>
    </div>
</section>