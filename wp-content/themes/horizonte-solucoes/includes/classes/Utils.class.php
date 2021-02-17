<?php

/**
 * Utils class
 *
 * Utility functions to be used in the theme files
 *
 * @package Horizonte
 */

class Utils
{

	/**
	 * Prints the variable, object or array content with a <pre> tag and print_r()
	 * @param any $to_print Variable with content to be printed
	 */
	public static function showme($to_print)
	{
		echo "<pre>" . print_r($to_print, true) . "</pre>";
	}

	/**
	 * Get template, include file
	 * @param string $file string file path
	 * @param array $args Extract array parse template as variables
	 */
	public static function get_template($file, $args = array())
	{

		if ($args && is_array($args)) {
			extract($args);
		}

		$filepath = get_template_directory() . '/' . $file . '.php';

		if (!file_exists($filepath)) {
			return;
		}
		include($filepath);
	}

	/**
	 * Prints a script to log in the console via javascript
	 * @param string $message Text message to log in the console
	 * @param string $type The message type (log, warn or error)
	 */
	public static function console_log($message, $type)
	{
		echo "
			<script>console.{$type}('{$message}');</script>
			";
	}

	/**
	 * Returns a string with the CSS file content
	 * @param string $file CSS file path (without extension)
	 * @return array $vars Optional array with variables to be replaced. i.e. array( "heading-color" => "red" )
	 */
	public static function get_style_file_content($file, $vars = array())
	{
		$file_path = get_template_directory() . "/" . $file . ".css";
		$file_content = file_get_contents($file_path);
		foreach ($vars as $var => $value) {
			$file_content = str_replace(("--" . $var), $value, $file_content);
		}
		return $file_content;
	}

	/**
	 * Gets the image URL from the assets image folder
	 * @param string $file_name Image file name with extension
	 */
	public static function get_image_url_from_assets($file_name)
	{
		return get_template_directory_uri() . "/assets/img/{$file_name}";
	}

	/**
	 * Gets the video URL from the assets video folder
	 * @param string $file_name Video file name with extension
	 */
	public static function get_video_url_from_assets($file_name)
	{
		return get_template_directory_uri() . "/assets/video/{$file_name}";
	}

	/**
	 * Returns a base64 image code to be used as placeholder before lazy load an image
	 * @param number $width	Image width size
	 * @param number $height Image height size
	 */
	public static function img_placeholder_src($width = 1000, $height = 1000)
	{
		//return "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+ip1sAAAAASUVORK5CYII=";
		return '';
	}

	/**
	 * Returns the image alt text or a generic alt text if the alt is not defined
	 * @param string $text Alt text for image
	 * @param string $image_url Image URL to get name from, or just name
	 */
	public static function get_image_alt_text($text, $image_url)
	{

		// Check if the alt text is already defined
		if ($text) {
			return str_replace('"', '', $text);
		}

		// If not defined, returns the name of the image
		else {
			return basename($image_url);
		}
	}

	/**
	 * Returns a string using same pattern as URL slugs
	 * @param string $text Text to be formated
	 */
	/* public static function slugifyString( $text ) {
			return $text;
		} */

	/**
	 * Add associative array as args to url.
	 *
	 * @param array $args - associative array containing the args ['key' => 'value...]
	 * @param string $url - full url
	 * @return string
	 */
	public static function add_args_to_url(array $args, string $url): string
	{
		$url_parsed_array = parse_url($url);

		/**
		 * Checks if url already contains arguments, if true merge then into args array.
		 */
		if (isset($url_parsed_array['query']) && $url_parsed_array['query']) {
			$parsed_args = [];
			parse_str($url_parsed_array['query'], $parsed_args);
			$args = array_merge($args, $parsed_args);
		}

		$url_args = http_build_query($args);

		$url_with_args = "{$url_parsed_array['scheme']}://{$url_parsed_array['host']}{$url_parsed_array['path']}";

		if ($url_args) {
			$url_with_args .= "?{$url_args}";
		}

		return $url_with_args;
	}
}
