<?php
/**
 * Mobile Menu
 *
 * The togglable menu template used for mobile devices
 *
 * @package Horizonte
 */
?>

<div class="_mobile-menu d-lg-none" id="toggleable-menu">

    <!-- Control button of toggleable menu -->
    <input type="checkbox"  class="d-lg-none" id="open-menu" aria-controls="toggleable-menu" aria-expanded="false">

    <!-- Menu bars -->
    <label for="open-menu" class="menu-icon mt-1 mb-0 ml-5 d-inline-block d-lg-none">
        <span class="menu-bar mx-auto d-block"></span>
        <span class="menu-bar mx-auto d-block"></span>
        <span class="menu-bar mx-auto d-block"></span>
    </label>

    <a href="#" class="btn btn-primary btn-highlighted mr-5 py-2 px-5 position-relative"><?php _e('Orçamento','horizonte'); ?></a>

    <!-- Overlay menu-mobile -->
    <div class="menu-overlay d-lg-none"></div>

    <!-- MOBILE MENU -->
    <div class="_nav-menu">
        <?php if( has_nav_menu( 'mobile-menu' ) ) : ?>
            <nav class="mobile-navigation pl-5" role="navigation">
                <?php
                    wp_nav_menu( array(
                        'theme_location'    => 'mobile-menu',
                        'menu_class'        => 'mobile-menu list-unstyled',
                        'container'         => false
                        ) );
                ?>
            </nav>
        <?php else: ?>
            <p>No mobile menu found.</p>
        <?php endif; ?>
    </div>

</div><!-- ._menu-mobile -->

