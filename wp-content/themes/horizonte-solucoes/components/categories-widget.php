<div class="_categories-widget mb-8">
	<h2 class="h3 title h6 mb-6"> Categorias </h2>

	<ul class="categories list-unsytled">
		<?php wp_list_categories([
			'title_li' => '',
			'exclude' => [1]
		]); ?>
	</ul>
</div>