<?php
// Queue parent style followed by child/customized style
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', PHP_INT_MAX);

function theme_enqueue_styles() {
    wp_enqueue_style( 'onepress', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'onepress-child', get_stylesheet_directory_uri() . '/style.css', array( 'onepress' ) );
}

?>
