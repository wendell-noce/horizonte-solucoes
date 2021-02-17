<?php

namespace App\Taxonomies;

use WPLP\Core\Taxonomy;

class ProdutoSegmentos extends Taxonomy
{
	public $slug = 'produto-segmentos';
	public $post_types = ['produto'];

	public function get_labels()
	{
		return [
			'name'              => __('Segmentos', 'admin'),
			'singular_name'     => __('Segmento', 'admin'),
			'search_items'      => __('Pesquisar', 'admin'),
			'all_items'         => __('Todas', 'admin'),
			'parent_item'       => __('Segmento', 'admin'),
			'parent_item_colon' => __('Segmentos', 'admin'),
			'edit_item'         => __('Editar', 'admin'),
			'update_item'       => __('Atualizar', 'admin'),
			'add_new_item'      => __('Adicionar', 'admin'),
			'new_item_name'     => __('Nome da novo Segmento', 'admin'),
			'menu_name'         => __('Segmentos', 'admin'),
		];
	}

	public function get_args()
	{
		return [
			'labels'              => $this->get_labels(),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_admin_column'   => true,
			'show_in_nav_menus'   => true,
			'show_tagcloud'       => true,
		];
	}
}
