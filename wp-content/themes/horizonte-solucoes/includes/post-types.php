<?php
/**
 * Post types settings
 * 
 * Define custom post types and taxonomies
 * 
 * For more info: https://developer.wordpress.org/reference/functions/register_post_type/
 * 
 * @package Horizonte
 */

// Changes the WordPress default Post type labels for Articles
/* function change_default_post_labels() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
    $labels->name               	= _x('Articles', 'Post Type Labels', 'admin');
    $labels->singular_name      	= _x('Article', 'Post Type Labels', 'admin');
    $labels->menu_name          	= _x('News', 'Post Type Menu Label', 'admin');
    $labels->all_items          	= _x('All Articles', 'Post Type Labels', 'admin');
    $labels->add_new            	= _x('Add New', 'Post Type Labels', 'admin');
    $labels->add_new_item       	= _x('Add New Article', 'Post Type Labels', 'admin');
    $labels->edit_item          	= _x('Edit Article', 'Post Type Labels', 'admin');
    $labels->new_item           	= _x('Article', 'Post Type Labels', 'admin');
    $labels->view_item          	= _x('View Article', 'Post Type Labels', 'admin');
    $labels->search_items       	= _x('Search Articles', 'Post Type Labels', 'admin');
    $labels->not_found          	= _x('No articles found', 'Post Type Labels', 'admin');
    $labels->not_found_in_trash 	= _x('No articles found in trash', 'Post Type Labels', 'admin');
    $labels->name_admin_bar     	= _x('Articles', 'Post Type Labels', 'admin');
    $get_post_type->menu_icon   	= 'dashicons-format-aside';
    $get_post_type->menu_position	= 7;
    $get_post_type->rewrite   		= array( "slug" => _x( 'news', 'Post Type Slug', 'tsc' ), "with_front" => false );
}
add_action( 'init', 'change_default_post_labels' ); */


// Changes the order of the Pages item in the admin menu
/* function change_page_post_type_order_in_menu() {
    $get_post_type = get_post_type_object('page');
    $get_post_type->menu_position = 5;
}
add_action( 'init', 'change_page_post_type_order_in_menu' ); */


// Register a custom post type for products
/* function create_product_post_type() {
    $product_labels = array(
        "name"                  => _x('Products', 'Post Type Labels', 'admin'),
        "singular_name"         => _x('Product', 'Post Type Labels', 'admin'),
        "menu_name"             => _x('Products', 'Post Type Labels', 'admin'),
        "all_items"             => _x('All Products', 'Post Type Labels', 'admin'),
        "add_new"               => _x('Add New', 'Post Type Labels', 'admin'),
        "add_new_item"          => _x('Add New Product', 'Post Type Labels', 'admin'),
        "edit_item"             => _x('Edit Product', 'Post Type Labels', 'admin'),
        "new_item"              => _x('New Product', 'Post Type Labels', 'admin'),
        "view_item"             => _x('View Product', 'Post Type Labels', 'admin'),
        "insert_into_item"      => _x('Insert into Product', 'Post Type Labels', 'admin'),
        "view_items"            => _x('View Products', 'Post Type Labels', 'admin'),
        "search_items"          => _x('Search Products', 'Post Type Labels', 'admin'),
        "not_found"             => _x('No products found', 'Post Type Labels', 'admin'),
        "not_found_in_trash"    => _x('No products found in Trash', 'Post Type Labels', 'admin')
    );
    $product_args = array(
        "label"               => _x('Products', 'Post Type Labels', 'admin'),
        "labels"              => $product_labels,
        "description"         => "",
        "public"              => true,
        "publicly_queryable"  => true,
        "show_ui"             => true,
        "show_in_rest"        => false,
        "rest_base"           => "",
        "has_archive"         => true,
        "show_in_menu"        => true,
        "exclude_from_search" => false,
        "capability_type"     => "post",
        "map_meta_cap"        => true,
        "hierarchical"        => true,
        "menu_position"       => 8,
        'rewrite'             => array( "slug" => 'clients', "with_front" => false ),
        'query_var'           => true,
        "supports"            => array( "title", "editor", "author", "excerpt", "thumbnail", "custom-fields", "revisions", "post-formats" ),
        "menu_icon"           => 'dashicons-star-filled',
        //"taxonomies"          => array( "category" )
    );
    register_post_type( "product", $product_args );
}
add_action( 'init', 'create_product_post_type' );  */


// Register a custom taxonomy for the brands
/* function register_brands_taxonomy() {
    // Add new taxonomy, make it hierarchical (like categories)
    $brand_labels = array(
        'name'              => __( 'Brands', 'admin' ),
        'singular_name'     => __( 'Brand', 'admin' ),
        'search_items'      => __( 'Search Brand', 'admin' ),
        'all_items'         => __( 'All Brands', 'admin' ),
        'parent_item'       => __( 'Parent Brand', 'admin' ),
        'parent_item_colon' => __( 'Parent Brand:', 'admin' ),
        'edit_item'         => __( 'Edit Brand', 'admin' ),
        'update_item'       => __( 'Update Brand', 'admin' ),
        'add_new_item'      => __( 'Add New Brand', 'admin' ),
        'new_item_name'     => __( 'New Brand Name', 'admin' ),
        'menu_name'         => __( 'Brands', 'admin' ),
    );
    $brand_args = array(
        'hierarchical'      => true,
        'labels'            => $brand_labels,
        'show_ui'           => true,
        'show_admin_column' => true
    );
    register_taxonomy( 'brand', array( 'product' ), $brand_args );
}
add_action( 'init', 'register_brands_taxonomy' ); */