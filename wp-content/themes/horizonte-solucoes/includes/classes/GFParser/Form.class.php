<?php

namespace GFParser;

class Form
{
	private $api_key = '';
	private $signature = '';
	private $data;
	public $url = '';
	public $submit_button = '';
	public $fields = [];

	public function __construct($data = [], array $options = [])
	{
		if ($data) {
			$this->data = $data;
			$this->api_key = $options['api_key'];
			$this->signature = $options['signature'];
			$this->url = $this->get_url();
			$this->submit_button = $this->get_submit_button($options['submit_button'] ?? []);
			$this->fields = $this->get_rendered_fields($options['fields'] ?? []);
		}
	}

	public function get_url(): string
	{
		$url =
			get_site_url() .
			'/gravityformsapi/forms/' . $this->data['id'] .
			'/submissions/?api_key=' . $this->api_key .
			'&signature=' . $this->signature .
			'&expires=1557247703';

		return $url;
	}

	public function get_submit_button(array $args = []): string
	{
		return sprintf(
			'<button class="%2$s" aria-label="%1$s" type="submit">%1$s</button>',
			$this->data['button']['text'],
			$args['cssClass'] ?? ''
		);
	}

	public function get_rendered_fields(array $args = []): array
	{
		$form_render_args = $this->data;
		unset($form_render_args['fields']);

		// Merge default args
		if (isset($args['*']) && $args['*']) {
			$form_render_args = array_merge($form_render_args, $args['*']);
		}

		$fields = [];

		foreach ($this->data['fields'] as $field) {
			// Defaults to text input
			$field_class_name = 'GFParser\Fields\Text';

			// Checks if custom class is defined for input
			if (Field::type_has_render_class($field['type'])) {
				$field_class_name = 'GFParser\Fields\\' . ucfirst($field['type']);
			}

			$render_args = $form_render_args;

			// Merge input specific classes into args
			if (isset($args[$field['adminLabel']]['cssClass']) && $args[$field['adminLabel']]['cssClass']) {
				$args[$field['adminLabel']]['cssClass'] .= ' ' . $render_args['cssClass'];
			}

			if (isset($args[$field['adminLabel']]) && $args[$field['adminLabel']]) {
				$render_args = array_merge($render_args, $args[$field['adminLabel']]);
			}

			// Merge input classes from GF admin
			if (isset($field['cssClass']) && $field['cssClass']) {
				$render_args['cssClass'] .= ' ' . $field['cssClass'];
			}

			$field_class = new $field_class_name($field);
			$fields[] = $field_class->render_html($render_args);
		}

		return $fields;
	}
}
