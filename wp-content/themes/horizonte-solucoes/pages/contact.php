<?php
/**
 *
 * Template Contact page
 *
 * @package Horizonte
 */

?>

<div id="contact-page" class="page-content">

	<?php
	// // Get Page abnner
	Utils::get_template('components/page-banner', array(
		'title'      => "Contato",
		'url_banner' =>Utils::get_image_url_from_assets('bg-page-header.jpg')
	)); ?>

	<div class="container my-lg-10">
		<div class="row align-items-center">
            <div class="col-12 col-lg-6 bg-navyblue box-rounded">
				<div class="content text-white py-7 px-lg-8">
					<h2> Fale conosco </h2>
					<p>
						Para maiores informações, entre em contato conosco, será um prazer atendê-lo(a).
					</p>

					<h4>Email</h4>
					<p class="d-flex align-items-center w-100 mt-4">
						<i class="icon mr-2 icon-mail"></i>
						<span> contato@horizontesolucao.com.br </span>
					</p>

					<h4> <?php _e('Local', 'horizonte'); ?> </h4>
					<p class="d-flex align-items-center w-100 mt-4">
						<i class="icon mr-2 icon-location"></i>
						<span> <?= get_field('end_footer', 'option'); ?> </span>
					</p>

					<h4><?php _e('Contato', 'horizonte'); ?></h4>
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
									<a href="tel:<?= $tel; ?>" class="undecorated-link text-white">
										<i class="icon mr-2 icon-<?= $val['icon']['value']; ?>"></i>
										<span> <?= $val['text']; ?> </span>
									</a>
								</p>
							<?php endif;

						endforeach;
					endif; ?>
				</div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1">

                <div class="_form mb-4">
					<h2 class="mb-4 mt-6 mt-lg-0"> Atendimento </h2>
                    <form action="">
                        <div class="custom_input mb-3">
                            <input type="text" class="" id="name" aria-describedby="name" placeholder="Nome" required>
                        </div>
                        <div class="custom_input mb-3">
                            <input type="text" class="" id="inputTelefone" aria-describedby="emailHelp" placeholder="Telefone" required>
                        </div>
                        <div class="custom_input mb-3">
                            <input type="email" class="" id="inputEmail" aria-describedby="emailHelp" placeholder="Email" required>
                        </div>
                        <div class="custom_input mb-3">
                            <textarea name="" id="" cols="30" rows="4" class="" placeholder="Mensagem"></textarea>
                        </div>
						<button type="submit" class="btn btn-send btn-green rounded transition position-relative">
							<span> Enviar </span>
							<i class="icon-arrow"></i>
						</button>
                    </form>
				</div>



            </div>
        </div>
	</div>

	<secttion class="map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7500.940051279333!2d-43.946603!3d-19.946726!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa69781c88d3a71%3A0xec5a9238a892c34b!2sR.%20Abre%20Campo%2C%20313%20-%20Santo%20Ant%C3%B4nio%2C%20Belo%20Horizonte%20-%20MG%2C%2030350-190%2C%20Brasil!5e0!3m2!1spt-BR!2sus!4v1590956728969!5m2!1spt-BR!2sus" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
	</secttion>

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