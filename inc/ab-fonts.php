<?php
function auxbeta_fonts() {
  wp_enqueue_style('googleFonts', '//fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700');
}

add_action('wp_enqueue_scripts', 'auxbeta_fonts');
?>