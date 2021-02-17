<?php

if (!function_exists('wp_recursive_parse_args')) {
	/**
	 * Prases multidimensional arrays.
	 *
	 * @param array $args
	 * @param array $defaults
	 * @return array
	 */
	function wp_recursive_parse_args($args, $defaults)
	{
		$new_args = (array) $defaults;

		foreach ($args as $key => $value) {
			if (is_array($value) && isset($new_args[$key])) {
				$new_args[$key] = wp_recursive_parse_args($value, $new_args[$key]);
			} else {
				$new_args[$key] = $value;
			}
		}

		return $new_args;
	}
}

if (!function_exists('pascal_to_kebab_case')) {
	/**
	 * Convert string from pascal case to kebab case.
	 *
	 * @param string $input - string in pascal case format
	 * @return string
	 */
	function pascal_to_kebab_case($input)
	{
		preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);
		$ret = $matches[0];
		foreach ($ret as &$match) {
			$match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
		}
		return implode('-', $ret);
	}
}

spl_autoload_register(function ($class) {
	$class_path =
		get_template_directory() .
		DIRECTORY_SEPARATOR .
		str_replace("\\", DIRECTORY_SEPARATOR, $class) .
		".class.php";

	$includes_class_path =
		get_template_directory() .
		DIRECTORY_SEPARATOR .
		'includes' .
		DIRECTORY_SEPARATOR .
		'classes' .
		DIRECTORY_SEPARATOR .
		str_replace("\\", DIRECTORY_SEPARATOR, $class) .
		".class.php";

	if (file_exists($includes_class_path)) {
		require_once($includes_class_path);
	}

	if (file_exists($class_path)) {
		require_once($class_path);
	}
});

/**
 * Create instances of classes located inside /Site/Pages,
 * and stores them inside $site_pages global variable.
 *
 * Files must be named *.class.php and contain one class definition
 * where * is pascal cased template name, the contained class must
 * extends core Page class.
 *
 * Example:
 * /Site/Pages/Home.class.php contains "class Home extends Page{}"
 * and will be loaded in "home" template.
 */
$pages_dir = get_template_directory() . '/App/Pages/';

foreach (glob($pages_dir . '/*.*') as $file) {
	global $site_pages;

	$class_name_array = explode('.class.php', basename($file));
	$class_name = array_shift($class_name_array);
	$template_name = pascal_to_kebab_case($class_name);

	if ($template_name) {
		$class_namespaced = 'App\Pages\\' . $class_name;
		$page_class_instance = new $class_namespaced();
		$site_pages[$template_name] = $page_class_instance;

		if (method_exists($page_class_instance, 'register_fields')) {
			$page_class_instance->register_fields();
		}
	}
}

/**
 * Create instances of classes located inside /Site/Options.
 *
 * Files must be named *.class.php and and, the contained class
 * must extends core OptionsPage class.
 *
 * Example:
 * MyThemeOptions.class.php contains "class MyThemeOptions extends Options{}"
 */
$options_dir = get_template_directory() . '/App/Options/';

foreach (glob($options_dir . '/*.*') as $file) {
	$class_name_array = explode('.class.php', basename($file));
	$class_name = array_shift($class_name_array);
	$class_namespaced = 'App\Options\\' . $class_name;
	new $class_namespaced();
}

/**
 * Create instances of classes located inside /Site/Taxonomies.
 *
 * Files must be named *.class.php and and, the contained class
 * must extends core Taxonomy class.
 *
 * Example:
 * CustomCategory.class.php contains class CustomCategory extends Taxonomy{}
 */
$post_types_dir = get_template_directory() . '/App/Taxonomies/';

foreach (glob($post_types_dir . '/*.*') as $file) {
	$class_name_array = explode('.class.php', basename($file));
	$class_name = array_shift($class_name_array);
	$class_namespaced = 'App\Taxonomies\\' . $class_name;
	$post_type_class_instance = new $class_namespaced();

	if (method_exists($post_type_class_instance, 'register_fields')) {
		$post_type_class_instance->register_fields();
	}
}


/**
 * Create instances of classes located inside /Site/PostTypes.
 *
 * Files must be named *.class.php and and, the contained class
 * must extends core PostType class.
 *
 * Example:
 * Service.class.php contains class Service extends PostType{}
 */
$post_types_dir = get_template_directory() . '/App/PostTypes/';

foreach (glob($post_types_dir . '/*.*') as $file) {
	$class_name_array = explode('.class.php', basename($file));
	$class_name = array_shift($class_name_array);
	$class_namespaced = 'App\PostTypes\\' . $class_name;
	$post_type_class_instance = new $class_namespaced();

	if (method_exists($post_type_class_instance, 'register_fields')) {
		$post_type_class_instance->register_fields();
	}
}
