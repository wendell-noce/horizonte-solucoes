<?php
  namespace WPLP\Core;

  /**
   * Creates a new interface to ACF Field Groups
   */
  class FieldsGroup {
    public $args = [];
    public $defaults = [];

    public function __construct($args) {
      $this->args = wp_recursive_parse_args($args, $this->defaults);
      $this->register();
    }

    /**
     * Get group fields args and register them with acf_add_local_field_group function.
     *
     * @return void
     */
    public function register(){
		$args = $this->args;
		$args['fields'] = Field::get_fields_args($this->args['fields'], $this->args['key']);
		if( function_exists('acf_add_local_field_group') ) :
			acf_add_local_field_group($args);
		endif;
    }
  }