<?php
  namespace WPLP\Core;
    
  /**
   * Creates a new interface to ACF Field
   * 
   * This class must be extended and files must be in /WPLP/Core/Fields directory.
   */
  class Field {
    public $args = [];
    public $defaults = [];

    public function __construct() {
      $args = func_get_arg(0);

      if(is_string($args)){
        $args = [
          'label' => $args
        ];
      }

      $this->args = wp_recursive_parse_args($args, $this->defaults);
    }


    /**
     * Returns field value, defaults to get_field function from ACF.
     * 
     *
     * @param array $args
     * @return mixed
     */
    public function value($args = []){
      return get_field($this->args['key']);
    }

    /**
     * Get field args that will be used in acf_add_local_field_group function.
     *
     * @param string $group_key - field group key, will be prepended to field key. 
     * @param string $field_name - field name prefixed by field group key will be used as key.
     * @return array
     */
    public function get_args($group_key, $field_name = '') {
      if(isset($this->args['name']) && $this->args['name']){
        $field_name = $this->args['name'];
      } else {
        $this->args['name'] = $field_name;
      }

      $this->args['key'] = $group_key . '_' . $field_name;

      $args = $this->args;

      if(isset($this->args['sub_fields']) && $this->args['sub_fields']){
        $args['sub_fields'] = Field::get_fields_args($this->args['sub_fields'], $this->args['key']);
      }

      if(isset($this->args['layouts']) && $this->args['layouts']){
        $args['layouts'] = Field::get_fields_args($this->args['layouts'], $this->args['key']);
      }

      return (array)$args;
    }

    /**
     * Helper to generate ACF tab field.
     *
     * @param string $title - Tab title
     * @param array $options - aditional tab options
     * @return Field
     */
    public static function tab($title, $options = []){
      return new Field(wp_recursive_parse_args($options, [
        'key' => 'tab_'.sanitize_title($title),
        'label' => $title,
        'type' => 'tab',
      ]));
    }

    /**
     * Get args from multiple Field instances in array.
     *
     * @param array $fields - must contain Field instances.
     * @param string $parent_key
     * @return array
     */
    public static function get_fields_args($fields, $parent_key){
      $fields_args = [];
      
      foreach($fields as $field_name => $field){
        $fields_args[] = $field->get_args($parent_key, $field_name);
      }

      return $fields_args;
    }
  }