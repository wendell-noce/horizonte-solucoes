<div class="site-logo text-center pb-3 px-3<?= isset($logo_class) ? $logo_class : ""; ?>">
    <a href="<?= home_url('/'); ?>" aria-label="<?php bloginfo('name'); ?>" class="undecorated-link d-block">
        <img src="<?= Utils::get_image_url_from_assets('logo-horizonte-solucoes.png')  ?>" alt="Horizonte Soluções" width="45" class="my-3
         d-block mx-auto">
        <span class="text-1 text text-primary font-devil">HORIZONTE </span>
        <span class="text-2 text font-beon d-block">SOLUÇÕES </span>
    </a>
</div>