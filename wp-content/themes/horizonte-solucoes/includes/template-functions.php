<?php
/**
 * Template functions
 *
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Horizonte
 */

/**
 * Adds custom classes to the array of body classes.
 * @param array $classes Classes for the body element.
 */
function add_classes_to_body( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( !is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'add_classes_to_body' );

// Add a pingback url auto-discovery header for single posts, pages, or attachments.
function add_pingback_url_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'add_pingback_url_header' );

/**
 * Use radio inputs instead of checkboxes for term checklists in specified taxonomies.
 *
 * @param   array   $args
 * @return  array
 */
 function wpse_139269_term_radio_checklist( $args ) {
    if ( !empty( $args['taxonomy'] ) && ($args['taxonomy'] === 'category' || $args['taxonomy'] === 'produto-category' || $args['taxonomy'] === 'produto-segmentos' )  ) {
        if ( empty( $args['walker'] ) || is_a( $args['walker'], 'Walker' ) ) { // Don't override 3rd party walkers.
            if ( ! class_exists( 'WPSE_139269_Walker_Category_Radio_Checklist' ) ) {
                /**
                 * Custom walker for switching checkbox inputs to radio.
                 *
                 * @see Walker_Category_Checklist
                 */
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist {
                    function walk( $elements, $max_depth, ...$args ) {
                        $output = parent::walk( $elements, $max_depth, ...$args );
                        $output = str_replace(
                            array( 'type="checkbox"', "type='checkbox'" ),
                            array( 'type="radio"', "type='radio'" ),
                            $output
                        );

                        return $output;
                    }
                }
            }

            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }

    return $args;
}

add_filter( 'wp_terms_checklist_args', 'wpse_139269_term_radio_checklist' );