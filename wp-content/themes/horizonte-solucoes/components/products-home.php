<?php
/**
 * Products Home
 *
 * Add the component description here...
 *
 * @package Horizonte
 */
?>

<section class="_products-home pb-5">
	<div class="container-fluid">
		<div class="row">
			<div class='col-12 mb-6'>
                <?php Utils::get_template( 'components/title-description', array(
                    'title'       => $title,
                    'title_class' => ' text-center animated fadeInDown',
                )); ?>
            </div>
			<?php foreach( $cards as $key => $post ): ?>
				<div class="col-6 col-lg-3 mb-5">
					<?php Utils::get_template( 'components/product-card', array(
						'thumb'     => $post['thumb']['sizes']['SIZE_383_383'],
						'category'  => $post['category'][0]->name,
						'title'     => $post['title'],
						'desc'      => $post['desc'],
						'post_link' => $post['link']
					)); ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>