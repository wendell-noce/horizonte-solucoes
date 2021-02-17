<?php
/**
 * Google Tag Manager [Head]
 *
 * Head scripts for GTM analytics
 *
 * @param string $gtm_id Project ID from Google Tag Manager
 *
 * Reference: https://developers.google.com/analytics/devguides/collection/gtagjs
 */
?>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?= $gtm_id ?>');</script>
<!-- End Google Tag Manager -->