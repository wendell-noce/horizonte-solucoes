<section
    class="_page-banner py-5"
    data-bg
    data-background-image="url(<?= $url_banner; ?>)"
    data-background-size="cover"
    data-background-position="center center"
    >

    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-10 text-center text-white text-uppercase font-bold">
                <h1 class="h2 font-beon font-bold text-navyblue animated fadeInDown"> <?= $title; ?> </h1>
                <?php if( isset($desc) && $desc != "" ): ?>
                    <h3> <?= $desc ?> </h3>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>