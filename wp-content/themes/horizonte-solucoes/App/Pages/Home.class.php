<?php

namespace App\Pages;

use Utils;
use WPLP\Core\Page;
use WPLP\Core\Field;
use WPLP\Core\FieldsGroup;
use WPLP\Fields;

class Home extends Page
{
	public function register_fields()
	{
		$this->fields = [
			'cards_tab' => Field::tab('Cabeçalho'),
			//Title
			'title'     => new Fields\Text([
				'label'    => 'Título',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			//Subtite
			'subtitle'     => new Fields\Text([
				'label'    => 'SubTítulo',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			//image
			'image' => new Fields\Image([
				'label'        => 'Imagem',
				'instructions' => 'De preferência coloque imagens em <strong style="color: #000; font-weight: bold"> .png </strong> com o fundo <strong style="color: #000; font-weight: bold">transparente.</strong>',
				'required'     => 1,
				'preview_size' => 'thumbnail',
				'wrapper' => Page::wrapperField('50'),
			]),
			//Subtite
			'cta'     => new Fields\Link([
				'label'    => 'Botão',
				'wrapper'  => Page::wrapperField('50')
			]),

			// Quem Somos
			'tab_quem_somos' => Field::tab('Quem Somos'),
			//Title
			'qs_title'     => new Fields\Text([
				'label'    => 'Título',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			//image
			'qs_image' => new Fields\Image([
				'label'        => 'Imagem',
				'instructions' => 'De preferência coloque imagens em <strong style="color: #000; font-weight: bold"> .png </strong> com o fundo <strong style="color: #000; font-weight: bold">transparente.</strong>',
				'required'     => 1,
				'preview_size' => 'thumbnail',
				'wrapper' => Page::wrapperField('50'),
			]),
			//Description
			'qs_description'  => new Fields\Editor('Descrição'),

			// Segmentos
			'tab_segmentos' => Field::tab('Segmentos'),
			'seg_title'     => new Fields\Text([
				'label'    => 'Título',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			// Cards
			'seg_cards' => new Fields\Repeater([
				'label'      => 'Cards',
				'collapsed'  => 'title',
				'layout'     => 'block',
				'max'        => 6,
				'sub_fields' => [
					'title'     => new Fields\Text([
						'label'    => 'Título',
						'wrapper'  => array(
							'width'  => '50',
						)
					]),
					//Image
					'qs_image' => new Fields\Image([
						'label'        => 'Imagem',
						'preview_size' => 'thumbnail',
						'wrapper' => Page::wrapperField('50'),
					]),
					'seg_link'     => new Fields\URL('Url do card'),
				]
			]),

			'tab_produtos'  => Field::tab('Produtos'),
			'produto_title' => new Fields\Text('Título'),


			'tab_clientes' => Field::tab('Clientes'),
			'clientes_title' => new Fields\Text('Título do seção'),
			// Cards
			'clientes_cards' => new Fields\Repeater([
				'label'      => 'Clientes',
				'layout'     => 'block',
				'button_label' => 'Adicionar cliente',
				'sub_fields' => [
					'cliente_nome'     => new Fields\Text([
						'label'    => 'Nome',
						'wrapper'  => array(
							'width'  => '50',
						)
					]),
					//Image
					'cliente_logo' => new Fields\Image([
						'label'        => 'Imagem',
						'preview_size' => 'thumbnail',
						'wrapper' => Page::wrapperField('50'),
					]),
					'cliente_link' => new Fields\URL('Link'),
				]
			]),

			'tab_parceiros' => Field::tab('Parceiros'),
			'parceiros_title' => new Fields\Text('Título do seção'),
			// Cards
			'parceiros_cards' => new Fields\Repeater([
				'label'      => 'Parceiros',
				'layout'     => 'block',
				'button_label' => 'Adicionar parceiro',
				'sub_fields' => [
					'cliente_nome'     => new Fields\Text([
						'label'    => 'Nome',
						'wrapper'  => array(
							'width'  => '50',
						)
					]),
					//Image
					'cliente_logo' => new Fields\Image([
						'label'        => 'Imagem',
						'preview_size' => 'thumbnail',
						'wrapper' => Page::wrapperField('50'),
					]),
					'cliente_link' => new Fields\URL('Link'),
				]
			]),

			'testimonials' => Field::tab('Depoimentos'),
			'testimonials_title' => new Fields\Editor([
				'label'   	   => 'Título do seção',
				'tabs'    	   => 'visual',
				'toolbar' 	   => 'basic',
				'media_upload' => 0,
			]),
			'testimonials_repeater' => new Fields\Repeater([
				'label'        => 'Depoimentos',
				'instructions' => 'Preencha os depoimentos',
				'button_label' => 'Adicionar depoimento',
				'layout'       => 'block',
				'sub_fields'   => [
					'card_name'  => new Fields\Text([
						'label'   => 'Nome',
						'wrapper' => array(
							'width'  => '50',
						)
					]),
					'card_office' => new Fields\Text([
						'label'   => 'Cargo ou ocupação',
						'wrapper' => array(
							'width'  => '50',
						)
					]),
					'card_desc' => new Fields\Textarea([
						'label'     => 'Descrição',
						'required'  => 0,
						'rows'      => 4,
						'new_lines' => 'br',
						'wrapper' => array(
							'width'  => '50',
						)
					]),
					'card_video'  => new Fields\File([
						'label'        => 'Vídeo',
						'instructions' => 'Vídeo com o depoimento',
						'mime_types'   => 'mp4',
						'wrapper' => array(
							'width'  => '50',
						)
					]),
					'card_image' => new Fields\Image([
						'label' => 'Imagem de preview',
						'instructions' => 'Selecione a imagem que aparecerá antes do vídeo ser carregado',
					]),
				],
			]),
		];

		new FieldsGroup([
			'key'      => 'page_groups',
			'title'    => 'Seções página',
			'fields'   => $this->fields,
			'location' => [
				[
					Page::typeIsEqualTo('front_page'),
				],
			],
			'hide_on_screen' => array(
				0 => 'the_content',
				1 => 'discussion',
				2 => 'comments',
				3 => 'featured_image',
			)
		]);
	}

	public function data()
	{

		$hero = $this->get_template_fields([
			'title',
			'subtitle',
			'image',
			'cta'
		]);

		$concepts = $this->get_template_fields([
			'qs_title',
			'qs_description',
			'qs_image'
		]);

		$segmentos = $this->get_template_fields([
			'seg_title',
			'seg_description',
			'seg_cards'
		]);

		$clientes = $this->get_template_fields([
			'clientes_cards',
			'clientes_title'
		]);

		$parceiros = $this->get_template_fields([
			'parceiros_title',
			'parceiros_cards'
		]);

		$testimonials = $this->get_template_fields([
			'testimonials_title',
			'testimonials_repeater'
		]);

		$produto = $this->get_template_fields([
			'produto_title'
		]);

		$midias = $this->get_template_fields([
			'midias_title',
			'midias_repeater'
		]);		

		$cta = [
			'cta_title' => get_field('cta_title', 'option'),
			'cta_link' => get_field('cta_link', 'option'),
		];

		$produtos_query = new \WP_Query([
			'post_type'      => 'produto',
			'posts_per_page' => 4,
			'orderby'         => 'rand'
		]);

		$produtcs = [];
		while ($produtos_query->have_posts()):
			$produtos_query->the_post();

			$produtcs[] = [
				'thumb' => get_field('image'),
				'title' => get_the_title(),
				'desc'  => get_field('resumo'),
				'link'  => get_the_permalink(),
				'category' => get_the_terms( get_the_ID(), 'produto-category' )
			];
		endwhile;
		wp_reset_postdata();


		$data = [
			'hero' => [
				'title'         => $hero['title'],
				'subtitle'      => $hero['subtitle'],
				'image'         => $hero['image'],
				'cta'           => $hero['cta'],
			],
			'concepts' => [
				'title'         => $concepts['qs_title'],
				'description'   => $concepts['qs_description'],
				'image'         => $concepts['qs_image']
			],
			'segmentos' => [
				'title'         => $segmentos['seg_title'],
				'cards'         => $segmentos['seg_cards'],
			],
			'testimonials' => [
				'title' => $testimonials['testimonials_title'],
				'cards' => $testimonials['testimonials_repeater']
			],
			'clientes' => [
				'title' => $clientes['clientes_title'],
				'cards' => $clientes['clientes_cards']
			],
			'parceiros' => [
				'title' => $parceiros['parceiros_title'],
				'cards' => $parceiros['parceiros_cards']
			],
			'cta' => [
				'title' => $cta['cta_title'],
				'link'  => $cta['cta_link']
			],
			'produtos' => [
				'title' => $produto['produto_title'],
				'cards' => $produtcs
			]
		];

		return $data;
	}
}
