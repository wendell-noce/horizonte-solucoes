<?php

namespace GFParser;

abstract class Field
{
	protected $data = [];

	abstract public function render(array $args): string;

	public function render_html(array $args): string
	{
		$label = '';
		$input = '';

		if ($this->data['labelPlacement'] != 'hidden_label') {
			$label = $this->label();
		}

		if ($args['labelPlacement'] == 'top_label' || $args['labelPlacement'] == 'left_label') {
			$input .= $label;
		}

		$input .= $this->render($args);

		if ($args['labelPlacement'] == 'right_label') {
			$input .= $label;
		}

		return $input;
	}

	public function __construct($data)
	{
		$this->data = $data;
	}

	public function id()
	{
		return 'input_' . $this->data['id'];
	}

	public function required_attr(): string
	{
		return $this->data['isRequired'] ? 'required' : '';
	}

	public function label(): string
	{
		return sprintf(
			'<label for="%2$s">%1$s</label>',
			$this->data['label'],
			$this->id()
		);
	}

	static public function type_has_render_class(string $type): bool
	{
		$class_path =
			get_template_directory() .
			DIRECTORY_SEPARATOR .
			'includes' .
			DIRECTORY_SEPARATOR .
			'classes' .
			DIRECTORY_SEPARATOR .
			'GFParser' .
			DIRECTORY_SEPARATOR .
			'Fields' .
			DIRECTORY_SEPARATOR .
			str_replace("\\", DIRECTORY_SEPARATOR, ucfirst($type)) .
			".class.php";

		return file_exists($class_path);
	}
}
