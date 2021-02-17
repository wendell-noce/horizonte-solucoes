<?php

namespace App\Options;

use WPLP\Core\OptionsPage;
use WPLP\Core\FieldsGroup;
use WPLP\Core\Field;
use WPLP\Fields;

class ThemeOptions extends OptionsPage
{
	private $key = 'theme-options';

	public function __construct()
	{
		$this->fields = [
			'cta_proposal' => Field::tab('CTA'),
			'cta_title' => new Fields\Text([
				'label'   	=> 'Título',
				'wrapper'   => array(
					'width'  => '50',
				)
			]),
			'cta_link'  => new Fields\Link('Insira o link do CTA'),

			'cards_tab' => Field::tab('Contatos'),
			'contacts_footer' => new Fields\Repeater([
				'label' => 'Telefones',
				'button_label' => 'Adicionar contato',
				'sub_fields' => [
					'icon' => new Fields\Select([
						'label' => 'Ícone',
						'required' => 1,
						'wrapper' => array(
							'width' => '30',
						),
						'choices' => array(
							'mail'     => 'Email',
							'phone'    => 'Telefone',
							'whatsapp' => 'Whatsapp',
						),
						'ui' => 1,
						'ajax' => 1,
						'return_format' => 'array',
					]),
					'text' => new Fields\Text('Texto')
				]
			]),

			'end_footer' => new Fields\Editor([
				'label' => 'Local',
			]),

			'teg_text' => new Fields\Textarea([
				'label' => 'Texto sobre a empresa',
			]),

		];

		new FieldsGroup([
			'key' => 'key-lorem',
			'title' => 'Opções do site',
			'location' => [
				[
					OptionsPage::isEqualTo($this->key),
				],
			],
			'fields' => $this->fields,
		]);

		// Check function exists.
		if( function_exists('acf_add_options_page') ) {
			acf_add_options_page(array(
				'page_title' 	=> __('General Settings'),
				'menu_title'	=> __('Options'),
				'menu_slug' 	=> __($this->key),
				'capability'	=> 'edit_posts',
				'redirect'		=> false
			));
		}
	}
}
