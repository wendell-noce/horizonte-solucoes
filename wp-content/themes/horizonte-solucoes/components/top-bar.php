<?php
/**
 * Top Bar
 * 
 * Top bar site
 * 
 * @package Horizonte
 */
?>

<section class="_top-bar bg-top-bar d-none d-lg-block">
    <div class='container'>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-column flex-md-row py-3">

                    <!-- Redes sociais -->
                    <div class="social-media">
                        <?php if (has_nav_menu('social-menu')) : ?>
                            <?php
                            wp_nav_menu(array(
                                'theme_location'    => 'social-menu',
                                'menu_class'        => 'd-flex align-items-center justify-content-around list-unstyled pl-0 mb-0',
                                'container'         => false
                            ));
                            ?>
                        <?php else : ?>
                            No main menu found.
                        <?php endif; ?>
                    </div>

                    <!-- Contatos -->
                    <div class="contatos">
                        <div class="content d-flex align-items-center">
                            <?php $contatos = get_field('contacts_footer', 'option');
                            if ($contatos) :
                                foreach ($contatos as $key => $val) : ?>
                                    <?php if( $val['icon']['value'] == "phone" ): ?>
                                        <?php $tel = str_replace(array(' ', "(", ")", "-"), '', $val['text'] ); ?>
                                        <a href="tel:55<?= $tel; ?>" class="undecorated-link px-3 transition">
                                            <i class="icon mr-1 icon-<?= $val['icon']['value']; ?>"></i>
                                            <span> <?= $val['text']; ?> </span>
                                        </a>
                                    <?php elseif ( $val['icon']['value'] == "whatsapp" ) :?>    
                                        <?php $tel = str_replace(array(' ', "(", ")", "-"), '', $val['text'] ); ?>
                                        <a href="https://web.whatsapp.com/send?phone=55<?= $tel; ?>&amp;text=Olá.." class="undecorated-link px-3 transition" target="_blank">
                                            <i class="icon mr-1 icon-<?= $val['icon']['value']; ?>"></i>
                                            <span> <?= $val['text']; ?> </span>
                                        </a>
                                    <?php endif;

                                endforeach;
                            endif; ?>
                        </div>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</section>