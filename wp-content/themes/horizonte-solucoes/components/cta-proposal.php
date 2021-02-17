<?php
/**
 * Cta Proposal
 *
 * Cta for request a proposal
 *
 * @package Horizonte
 * @param string $title   -> Section title
 * @param string $btn_label  -> CTA url
 * @param string $btn_url    -> CTA url
 * @param string $btn_target -> CTA target
 */
?>

<section class="_cta-proposal bg-green py-10">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <h2 class="cta-title text-center text-white text-center text-lg-left mb-0"> <?= $title; ?> </h2>
            </div>
            <div class="col-12 col-lg-4 text-center text-lg-right mt-6 mt-lg-0">
				<div class="ctas">
					<a href='<?= $btn_url; ?>' aria-label='Saiba mais' class='button-estimate undecorated-link position-relative d-block py-2 px-8 rounded' data-text='Saiba mais' >
						<span>p</span>
						<span>r</span>
						<span>o</span>
						<span>d</span>
						<span>u</span>
						<span>t</span>
						<span>o</span>
						<span>s</span>
					</a>
				</div>
       		</div>
		</div>
    </div>
</section>