<?php
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
?>