<?php

/**
 * Post Categories
 *
 * List of post categories
 *
 * @package Horizonte
 *
 * @param string $classes -> Container additional classes
 */

if (!isset($classes)) {
	$classes = '';
}
?>

<div class="_post-categories <?php echo $classes ?>">
	<?php the_category(); ?>
</div>