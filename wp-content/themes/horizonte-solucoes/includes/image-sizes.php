<?php

/**
 * Image Sizes (Thumbnails)
 *
 * Enable support for Post Thumbnails and add custom sizes
 *
 * For more info: https://developer.wordpress.org/reference/functions/add_image_size/
 *
 * @package Horizonte
 */

add_theme_support('post-thumbnails');

// Post Thumbnails

// SQUARE [1:1]
add_image_size('SIZE_383_383', 383, 383, true); // 421:437

// HORIZONTAL
add_image_size('SIZE_366_190', 366, 190, true); // 421:437
add_image_size('SIZE_383_216', 383, 216, true); // 421:437
add_image_size('SIZE_383_273', 383, 273, true); // 421:437
add_image_size('SIZE_421_437', 421, 437, true); // 421:437
add_image_size('SIZE_590_394', 590, 394, true); // 421:437