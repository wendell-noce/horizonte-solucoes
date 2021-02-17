<?php

namespace GFParser\Fields;

use GFParser\Field;

class Text extends Field
{
	public function render(array $args): string
	{
		return sprintf(
			'<input
				type="text"
				name="%1$s"
				placeholder="%2$s"
				class="%3$s"
				aria-label="%4$s"
				%5$s
			/>',
			esc_attr($this->id()),
			esc_attr($this->data['placeholder']),
			esc_attr($args['cssClass']),
			esc_attr($this->data['label']),
			esc_attr($this->required_attr())
		);
	}
}
