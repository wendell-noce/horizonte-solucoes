<?php

/**
 * Desktop menu
 *
 * Menu desktop
 *
 * @package Horizonte
 * @param string $logo_tag -> Tag for logo
 *
 */
?>
<div class="_desktop-menu d-none d-lg-block">
	<div class="container">
		<div class="row">
			<div class="col-2">
                <!-- LOGO -->
                <?php Utils::get_template( 'components/logo' , array('is_h1'=> true)); ?>
			</div>
			
			<div class="col-lg-10">
				<div class="navigation d-flex justify-content-between align-items-center">
					

					<?php if (has_nav_menu('main-menu')) : ?>
						<nav class="site-navigation pr-xl-4 pl-xl-7" role="navigation">
							<?php
							wp_nav_menu(array(
								'theme_location'    => 'main-menu',
								'menu_class'        => 'main-menu list-unstyled d-flex justify-content-around mb-0',
								'container'         => false
							));
							?>
						</nav>
					<?php else : ?>
						No main menu found.
					<?php endif; ?>

					<div class="ctas">
						<a href='#' aria-label='Orçamento' class='button-estimate undecorated-link position-relative d-block py-2 px-8 rounded' data-text='Orçamento' >
							<span>P</span>
							<span>e</span>
							<span>ç</span>
							<span>a</span>
							<span> </span>
							<span>j</span>
							<span>á</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>