<?php
/**
 * ACF fields
 * 
 * Register of all custom fields from ACF
 * 
 * For more info: https://www.advancedcustomfields.com/resources/register-fields-via-php/
 * 
 * @package Horizonte
 */

if( function_exists('acf_add_local_field_group') ) {
	// Register here the ACF field groups

	$acf_field_groups = [
		// Add the name of each field group file here
	];

	// Include the file for each field group
	foreach ( $acf_field_groups as $field_group ) {
		include_once( get_template_directory() . "/includes/field-groups/{$field_group}.php" );
	}
}