<?php
/**
 * Template Manager
 *
 * Defines the template name based on the type of the page
 * This template name defines the assets (JS and SCSS) that will be imported
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @Horizonte
 */

function set_template_name() {
	global $template_name;

	if( is_front_page() ) { // Home
		$template_name = 'home';
	}

	elseif( is_home() ) { // Blog
		$template_name = 'blog';
	}

	elseif( is_singular('post') ) { // Article
		$template_name = 'article';
	}

	elseif( is_category() ) { // Category
		$template_name = 'category';
	}

	elseif( is_page() ) {
		$page_template_slug = get_page_template_slug();

		if($page_template_slug == 'template-quem-somos.php') { // Quem Somos
			$template_name = 'quem-somos';
		}
		else if($page_template_slug == 'template-contact.php') { // Contato
			$template_name = 'contact';
		}
		else if($page_template_slug == 'template-products.php') { // Contato
			$template_name = 'produtos';
		}
		else { // Default Page template
			$template_name = 'page';
		}
	}

	elseif( is_tax() ) { // Search
		$template_name = 'products';
	}

	elseif( is_search() ) { // Search
		$template_name = 'search';
	}

	elseif( is_404() ) { // 404
		$template_name = '404';
	}
}
add_action( 'wp_enqueue_scripts', 'set_template_name' );
?>