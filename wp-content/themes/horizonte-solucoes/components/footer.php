<?php

/**
 * Footer
 *
 * The website footer section
 *
 * @package Horizonte
 */
?>

<footer class="_footer pb-6 py-lg-8 text-center text-md-left" role="complementary">
	<div class="container">

		<div class="row pt-6 mt-3 justify-content-center">
			<div class="col-12 col-md-6 col-lg-3">

				<div class="social-media mt-2 mt-lg-4 pt-1 pl-lg-1">
					<p class="mb-2"> <?php _e('Siga-nos nas redes sociais:', 'horizonte'); ?> </p>
					<?php if (has_nav_menu('social-menu')) : ?>
						<?php
						wp_nav_menu(array(
							'theme_location'    => 'social-menu',
							'menu_class'        => 'list-inline pl-0',
							'container'         => false
						));
						?>
					<?php else : ?>
						No main menu found.
					<?php endif; ?>
				</div>
				<div class="footer-logo mb-4 position-relative">
					<?php Utils::get_template( 'components/logo',array(
						'logo_class' => "mx-auto ml-lg-0"
					)); ?>
				</div>
			</div>

			<!-- Links -->
			<div class="col-12 col-md-6 col-lg-2 mb-5 mb-lg-0">
				<div class="footer-block pl-lg-4 ml-lg-3 mt-3 mt-lg-0">
					<h3> Links </h3>
					<?php if (has_nav_menu('footer-menu')) : ?>
						<nav class="footer-menu" role="navigation">
							<?php
							wp_nav_menu(array(
								'theme_location'    => 'footer-menu',
								'menu_class'        => 'list-unstyled pl-0 mt-4',
								'container'         => false
							));
							?>
						</nav>
					<?php else : ?>
						No main menu found.
					<?php endif; ?>
				</div>
			</div>

			<!-- Local -->
			<div class="col-12 col-md-6 col-lg-3 col-xl-32 pl-lg-0 mb-5 mb-lg-0">
				<div class="footer-block">
					<h3> <?php _e('Local', 'horizonte'); ?> </h3>
					<div class="d-flex align-items-start w-100 mt-4">
						<i class="icon mr-2 icon-location"></i>
						<?= get_field('end_footer', 'option'); ?>
					</div>
				</div>
			</div>

			<!-- Contatos -->
			<div class="col-12 col-md-6 col-lg-4 col-xl-2 mb-5 mb-lg-0">
				<div class="footer-block">
					<h3><?php _e('Contato', 'horizonte'); ?></h3>
					<?php $contatos = get_field('contacts_footer', 'option');
					if ($contatos) :
						foreach ($contatos as $key => $val) : ?>

							<?php if( $val['icon']['value'] == "mail" ): ?>
								<p class="mt-4 mb-0">
									<a href="mailto:<?= $val['text']; ?>" class="undecorated-link">
										<i class="icon mr-2 icon-<?= $val['icon']['value']; ?>"></i>
										<span> <?= $val['text']; ?> </span>
									</a>
								</p>
							<?php else: ?>
								<?php $tel = str_replace(array(' ', "(", ")", "-"), '', $val['text'] ); ?>
								<p class="mt-4 ">
									<a href="tel:<?= $tel; ?>" class="undecorated-link">
										<i class="icon mr-2 icon-<?= $val['icon']['value']; ?>"></i>
										<span> <?= $val['text']; ?> </span>
									</a>
								</p>
							<?php endif;

						endforeach;
					endif; ?>
				</div>
			</div>

			<!-- Separator -->
			<div class="col-12">
				<hr class="separator d-block my-5 my-lg-7 bg-white">
			</div>

			<!-- Registration Text  -->
			<div class="col-12 col-lg-10">
				<div class="registration-text text-lg-center py-5">
					<p> <?= get_field('teg_text', 'option') ?> </p>
				</div>

				<!-- COPYRIGHT -->
				<div class="copyright text-center">
					<p>Horizonte Soluções © 2020 Todos os direitos reservados</p>
				</div>
			</div>
		</div>
	</div>

	<?php Utils::get_template('components/trackable-links', ['links' => get_field('trackable_links', 'options')]); ?>
</footer>