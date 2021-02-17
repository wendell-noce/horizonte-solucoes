<?php
  namespace WPLP\Core;

  /**
   * Creates a new interface to wordpress taxonomies.
   */
  abstract class Taxonomy {
    public $slug;
    public $post_types = [];

    /**
     * Must return wordpress labels object, with the following structure:
     * 
     * [
     *  'name'              => __( 'MyTaxonomys', 'admin' ),
     *  'singular_name'     => __( 'MyTaxonomy', 'admin' ),
     *  'search_items'      => __( 'Search MyTaxonomy', 'admin' ),
     *  'all_items'         => __( 'All MyTaxonomys', 'admin' ),
     *  'parent_item'       => __( 'Parent MyTaxonomy', 'admin' ),
     *  'parent_item_colon' => __( 'Parent MyTaxonomy:', 'admin' ),
     *  'edit_item'         => __( 'Edit MyTaxonomy', 'admin' ),
     *  'update_item'       => __( 'Update MyTaxonomy', 'admin' ),
     *  'add_new_item'      => __( 'Add New MyTaxonomy', 'admin' ),
     *  'new_item_name'     => __( 'New MyTaxonomy Name', 'admin' ),
     *  'menu_name'         => __( 'MyTaxonomys', 'admin' ),
     * ];
     *
     * @return array
     */
    abstract public function get_labels();

    /**
     * Must returns wordpress custom post type args, with the followig structure:
     * 
     * [
     *  'hierarchical'      => true,
     *  'labels'            => $this->get_labels(),
     *  'show_ui'           => true,
     *  'show_admin_column' => true
     * ]
     *
     * @return array
     */
    abstract public function get_args();

    public function __construct() {
      register_taxonomy( $this->slug, $this->post_types, $this->get_args() );
    }

    /**
     * Helper function to return conditional arguments based on taxonomy.
     *
     * @param string $slug - string containing the taxonomy slug.
     * @return array conditional array
     */
    public static function isEqualTo($slug){
      return [
				'param' => 'taxonomy',
				'operator' => '==',
        'value' => $slug,
      ];
    }
    
  }