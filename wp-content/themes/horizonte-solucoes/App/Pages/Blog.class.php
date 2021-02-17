<?php

namespace App\Pages;

use WPLP\Core\Page;
use WP_Query;

class Blog extends Page
{
	public function data()
	{
		$posts_query = new \WP_Query([
			'post_type' => 'post',
		]);

		$posts = [];

		while ($posts_query->have_posts()):
			$posts_query->the_post();
			$category = get_the_category();
			$posts[] = [
				'title'            => get_the_title(),
				'category'         => $category[0]->name,
				'excerpt'          => get_the_excerpt(),
				'featured_img_url' => get_the_post_thumbnail_url( get_the_ID(),'SIZE_383_216'),
				'post_link'        => get_the_permalink(),
				'date'             => get_the_date()
			];
		endwhile;
		wp_reset_postdata();

		$cta = [
			'cta_title' => get_field('cta_title', 'option'),
			'cta_link'  => get_field('cta_link', 'option')
		];

		$data = [
			'posts' => $posts,
			'cta'   => [
				'title' => $cta['cta_title'],
				'link'  => $cta['cta_link']
			]
		];

		return $data;
	}
}
