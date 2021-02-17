<?php

namespace App\PostTypes;

use WPLP\Core\PostType;
use WPLP\Core\Field;
use WPLP\Core\FieldsGroup;
use WPLP\Fields;

class Produto extends PostType
{
	public $slug = 'produto';
	public $singular_label = 'Produto';
	public $plural_label   = 'Produto';

	public function register_fields(){
		$this->fields = [
			'image' => new Fields\Image([
				'label'        => 'Imagem',
				'required'     => 1,
				'preview_size' => 'thumbnail',
				'wrapper' => [
					'width' => '50',
					'class' => '',
					'id'    => '',
				],
			]),
			'resumo'       => new Fields\Textarea([
				'label'        => 'Breve descrição',
				'wrapper' => [
					'width' => '50',
					'class' => '',
					'id'    => '',
				],
			]),
			'informations' => new Fields\Editor('Características'),
			'descricao'    => new Fields\Editor('Descrição'),
		];

		new FieldsGroup([
			'key' => 'produto_fields',
			'title' => 'Informações do produto',
			'location' => [[PostType::isEqualTo($this->slug)]],
			'fields' => $this->fields,
			'hide_on_screen' => array(
				0 => 'the_content',
				1 => 'discussion',
				2 => 'comments',
				3 => 'featured_image',
			)
		]);
	}

	public function get_labels()
	{
		return [
			"name"                  => _x($this->plural_label, 'Post Type Labels', 'admin'),
			"singular_name"         => _x($this->singular_label, 'Post Type Labels', 'admin'),
			"menu_name"             => _x($this->plural_label, 'Post Type Labels', 'admin'),
			"all_items"             => _x('Todos os '.$this->plural_label, 'Post Type Labels', 'admin'),
			"add_new"               => _x('Adicionar', 'Post Type Labels', 'admin'),
			"add_new_item"          => _x('Adicionar novo '.$this->singular_label, 'Post Type Labels', 'admin'),
			"edit_item"             => _x('Editar '.$this->singular_label, 'Post Type Labels', 'admin'),
			"new_item"              => _x('Novo '.$this->singular_label, 'Post Type Labels', 'admin'),
			"view_item"             => _x('Ver '.$this->singular_label, 'Post Type Labels', 'admin'),
			"insert_into_item"      => _x('Inserir novo '.$this->singular_label, 'Post Type Labels', 'admin'),
			"view_items"            => _x('Ver '.$this->plural_label, 'Post Type Labels', 'admin'),
			"search_items"          => _x('Perquisar '.$this->plural_label, 'Post Type Labels', 'admin'),
			"not_found"             => _x('Nenhum item encontrado', 'Post Type Labels', 'admin'),
			"not_found_in_trash"    => _x('Nenhum item encontrado na Lixeira', 'Post Type Labels', 'admin')
		];
	}

	public function get_args()
	{
		return [
			"label"               => _x($this->singular_label, 'Post Type Labels', 'admin'),
			"labels"              => $this->get_labels(),
			"description"         => "",
			"public"              => true,
			"publicly_queryable"  => true,
			"show_ui"             => true,
			"show_in_rest"        => false,
			"rest_base"           => "",
			"has_archive"         => true,
			"show_in_menu"        => true,
			"exclude_from_search" => true,
			"capability_type"     => "page",
			"map_meta_cap"        => true,
			"hierarchical"        => true,
			'rewrite'             => true,
			"menu_position"       => 8,
			'query_var'           => true,
			"supports"            => array("title"),
			"menu_icon"           => 'dashicons-backup'
		];
	}
}
