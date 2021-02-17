<?php
/**
 * Title Desc
 *
 * Component used to display the Title and description of a section
 *
 * @param string $title      -> Section title
 * @param string $title_class -> Classes for the title
 * @param string $desc       -> Section description
 * @param string $descClass  -> Classes for the description
 *
 * @package Horizonte
 */
?>

<div class="_title-desc">
    <h2 class="section-title <?= (isset( $title_class ) && $title_class != "" ) ? $title_class : ""; ?>"> <?= $title; ?> </h2>
    <?php if( isset( $description ) && $description != "" ) : ?>
        <div class="desc">
            <p class="<?= (isset( $descClass ) && $descClass != "" ) ? $descClass : ""; ?>"> <?= $description; ?> </p>
        </div>
    <?php endif; ?>
</div>