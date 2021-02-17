<?php

namespace App\Pages;

use WPLP\Core\Page;
use WPLP\Core\Field;
use WPLP\Core\FieldsGroup;
use WPLP\Fields;

class Products extends Page
{
	public function data()
	{

		$produtos_query = new \WP_Query([
			'post_type'      => 'produto',
			'posts_per_page' => 12,
			'ordeby'         => 'rand'
		]);

		$produtcs = [];
		while ($produtos_query->have_posts()):
			$produtos_query->the_post();

			$produtcs[] = [
				'thumb' => get_field('image'),
				'category' => get_the_terms( get_the_ID(), 'produto-category' ),
				'title' => get_the_title(),
				'desc'  => get_field('resumo'),
				'link' =>  get_the_permalink(),
			];
		endwhile;
		wp_reset_postdata();

		$data = [
			'produtos' => $produtcs
		];

		return $data;
	}
}
