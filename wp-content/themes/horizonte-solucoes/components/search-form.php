<?php

/**
 * Search Form
 *
 * Wordpress posts search form
 *
 * @package Horizonte
 */

?>

<form class="_search-form d-none d-lg-flex py-3 px-4 mb-8" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
	<input aria-label="Procurar no Blog" aria-required="true" required type="search" class="input" placeholder="Procurar no Blog" value="<?php echo get_search_query(); ?>" name="s" />
	<button aria-label="Pesquisar" class="submit m-0 p-0" type="submit"><i class="icon icon-search"></i></button>
</form>