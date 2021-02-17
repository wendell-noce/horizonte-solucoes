<?php
  namespace WPLP\Core;

  /**
   *
   * Creates a new interface to page.
   *
   * This class must be extended and files must be in /Site/Pages directory.
   *
   * The page name will be autoloaded on the file theme-classes.php,
   * and one instanced object will be avaliable in the template
   * based on enqueues.php file rules on the global variable $page_class.
   *
   * Example:
   * class Home extends Page{}
   *
   * A Home instance will be autoloaded on page with template "home".
   */
  abstract class Page {
    public $fields = [];

    /**
     * Helper function to load multiples registered in page.
     *
     * @param array $fields_to_fetch - array containing list of fields to load, must contain string with field name or associative array with 'field_name' => [...args]
     * @return array associative array with the format ['field_name' => 'field_value', 'second_field_name' => [...values]]
     */
    protected function get_template_fields($fields_to_fetch){
      $template_fields = [];

      foreach ($fields_to_fetch as $key => $field_args) {
        if(!is_array($field_args)){
          $key = $field_args;
          $field_args = false;
        }

        if(!isset($this->fields[$key])){
          continue;
        }

        $template_fields[$key] = $this->fields[$key]->value($field_args);
      }

      return $template_fields;
    }

    /**
     * Helper function to return conditional arguments based on page template.
     *
     * @param string $template_name - string containing the template name without file extension.
     * @return array conditional array
     */
    public static function templateIsEqualTo($template_name) {
      return [
        'param' => 'page_template',
        'operator' => '==',
        'value' =>  $template_name . '.php',
      ];
    }

    /**
     * Helper function to return conditional arguments based on page ID.
     *
     * @param int $page_id - integer containing the page id.
     * @return array conditional array
     */
    public static function isEqualTo($page_id) {
      return [
        'param' => 'page',
        'operator' => '==',
        'value' =>  $page_id,
      ];
    }

    /**
     * Helper function to return conditional arguments based on page type.
     *
     * @param string $page_type - string containing the page type,
     * accepeted values are: front_page | posts_page | top_level | parent | child
     * @return array conditional array
     */
    public static function typeIsEqualTo($page_type) {
      return [
        'param' => 'page_type',
        'operator' => '==',
        'value' =>  $page_type,
      ];
    }

    /**
     * Helper function to return conditional arguments based on page parent.
     *
     * @param int $parent_id - integer containing the page parent id.
     * @return array conditional array
     */
    public static function parentIsEqualTo($parent_id) {
      return [
        'param' => 'page_parent',
        'operator' => '==',
        'value' =>  $parent_id,
      ];
    }

    /**
     * Helper function to return conditional arguments based on page parent.
     *
     * @param int $parent_id - integer containing the page parent id.
     * @return array conditional array
     */
     public static function wrapperField($width) {
      return [
        'width' => $width,
        'class' => '',
        'id'    => '',
      ];
    }
  }