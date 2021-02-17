<?php
  namespace WPLP\Core;

  /**
   * Creates a new interface to wordpress custom post types.
   */
  abstract class PostType {
    public $slug;

    /**
     *
     * @return array
     */
    abstract public function get_labels();

    /**
     * @return array
     */
    abstract public function get_args();

    public function __construct() {
      register_post_type( $this->slug, $this->get_args() );
    }

    /**
     * Helper function to return conditional arguments based on post type.
     *
     * @param string $slug - string containing the post type slug.
     * @return array conditional array
     */
    public static function isEqualTo($slug){
      return [
		'param' => 'post_type',
		'operator' => '==',
        'value' => $slug,
      ];
    }
  }