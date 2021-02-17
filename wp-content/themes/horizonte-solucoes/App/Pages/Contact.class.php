<?php

namespace App\Pages;

use WPLP\Core\Page;
use WPLP\Core\Field;
use WPLP\Core\FieldsGroup;
use WPLP\Fields;

class Contact extends Page
{
	public function register_fields()
	{
		$this->fields = [
			'banner_tab' => Field::tab('Banner'),
			'banner_title'     => new Fields\Text([
				'label'    => 'Título',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			'banner_image' => new Fields\Image([
				'label'        => 'Imagem do banner',
				'preview_size' => 'thumbnail',
				'required' => 1,
				'wrapper' => Page::wrapperField('50'),
			]),
			'content_tab' => Field::tab('Conteúdo'),
			'content_title'     => new Fields\Text([
				'label'    => 'Título',
				'required' => 1,
				'wrapper'  => array(
					'width'  => '50',
				)
			]),
			'content_image' => new Fields\Image([
				'label'        => 'Imagem do banner',
				'preview_size' => 'thumbnail',
				'required' => 1,
				'wrapper' => Page::wrapperField('50'),
			]),
			'content_text' => new Fields\Editor([
				'label'   	   => 'Conteúdo do seção',
				'tabs'    	   => 'visual',
				'toolbar' 	   => 'basic',
				'media_upload' => 0,
			]),
			'concepts_tab' => Field::tab('Conceitos'),
			'concepts_repeater' => new Fields\Repeater([
				'label'        => 'Conceitos',
				'instructions' => 'Adicione os conceitos',
				'button_label' => 'Adicionar',
				'max'          => 3,
				'layout'       => 'block',
				'sub_fields'   => [
					'card_title'     => new Fields\Text([
						'label'   => 'Título',
						'wrapper' => Page::wrapperField('50'),
					]),
					'card_ico'  => new Fields\Image([
						'label'        => 'Ícone',
						'preview_size' => 'thumbnail',
						'required' => 1,
						'wrapper' => Page::wrapperField('50'),
					]),
					'card_desc' => new Fields\Textarea([
						'label'     => 'Descrição',
						'required'  => 1,
						'rows'      => 4,
						'new_lines' => 'br'
					])
				],
			]),
		];

		new FieldsGroup([
			'key'      => 'contact_fields',
			'title'    => 'Contato',
			'fields'   => $this->fields,
			'location' => [
				[
					Page::templateIsEqualTo('template-contact'),
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
		$banner =  $this->get_template_fields([
			'banner_title',
			'banner_image'
		]);
		$content =  $this->get_template_fields([
			'content_title',
			'content_image',
			'content_text'
		]);
		$concepts =  $this->get_template_fields([
			'concepts_repeater'
		]);

		$cta = [
			'cta_title' => get_field('cta_title', 'option'),
			'cta_link' => get_field('cta_link', 'option'),
		];

		$data = [
			'banner' => [
				'title'      => $banner['banner_title'],
				'url_banner' => $banner['banner_image']['url']
			],
			'content' => [
				'title'      => $content['content_title'],
				'image_url'  => $content['content_image']['sizes']['SIZE_590_394'],
				'image_w'    => $content['content_image']['sizes']['SIZE_590_394-width'],
				'image_h'    => $content['content_image']['sizes']['SIZE_590_394-height'],
				'image_alt'  => $content['content_image']['alt'],
				'text'       => $content['content_text']
			],
			'concepts' => [
				'cards' => $concepts
			],
			'cta' => [
				'title' => $cta['cta_title'],
				'link'  => $cta['cta_link']
			],
		];

		return $data;
	}
}
