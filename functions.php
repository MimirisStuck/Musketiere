<?php
require_once get_template_directory() . '/inc/footer_functions.php';
require_once get_template_directory() . '/inc/calendar_functions.php';

function testthemes_enqueue_assets() {
    // style.css automatisch laden
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // optional JS
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'testthemes_enqueue_assets');

function get_musketier_user(){
    global $wpdb;

    $table = $wpdb->prefix . 'musketier_user';

    return $wpdb->get_results("SELECT * FROM $table");

}

function register_event_post_type() {
    register_post_type('event', [
        'label' => 'Events',
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_event_post_type');
?>
