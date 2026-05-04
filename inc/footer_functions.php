<?php
// -------------------------------------------------
// FOOTER CUSTOMIZER (STABLE VERSION)
// -------------------------------------------------

function mytheme_footer_customizer($wp_customize) {

    // SECTION
    $wp_customize->add_section('footer_section', array(
        'title'    => 'Footer',
        'priority' => 120,
    ));

    // =========================
    // KONTAKT
    // =========================

    // "Titel" (einfach als Label-Feld Trick)
    $wp_customize->add_setting('footer_contact_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_contact_title', array(
        'label'   => '—— Kontakt ——',
        'section' => 'footer_section',
        'type'    => 'hidden',
        'priority'=> 10,
    ));

    // Name 
    $wp_customize->add_setting('footer_name', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ));

    $wp_customize->add_control('footer_name', array(
        'label'   => 'Name',
        'section' => 'footer_section',
        'type'    => 'text',
        'priority'=> 11,
    ));

    // Adresse
    $wp_customize->add_setting('footer_address', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ));
    
    $wp_customize->add_control('footer_address', array(
        'label'   => 'Adresse',
        'section' => 'footer_section',
        'type'    => 'text',
        'priority'=> 12,
    ));

    // PLZ & Ort
    $wp_customize->add_setting('footer_city', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ));

    $wp_customize->add_control('footer_city', array(
        'label'   => 'PLZ & Ort',
        'section' => 'footer_section',
        'type'    => 'text',
        'priority'=> 13,
    ));

    // Telefon
    $wp_customize->add_setting('footer_phone', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default' => '',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label'   => 'Telefon',
        'section' => 'footer_section',
        'type'    => 'text',
        'priority'=> 14,
    ));

    // Email
    $wp_customize->add_setting('footer_email', array(
        'sanitize_callback' => 'sanitize_email',
        'default' => '',
    ));

    $wp_customize->add_control('footer_email', array(
        'label'   => 'E-Mail',
        'section' => 'footer_section',
        'type'    => 'text',
        'priority'=> 15,
    ));




    // =========================
    // LINKS
    // =========================

    // Titel
    $wp_customize->add_setting('footer_links_title', array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_links_title', array(
        'label'   => '—— Links ——',
        'section' => 'footer_section',
        'type'    => 'hidden',
        'priority'=> 20,
    ));

    // Link 1
    $wp_customize->add_setting('footer_link_1', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '',
    ));

    $wp_customize->add_control('footer_link_1', array(
        'label'   => 'Link 1 URL',
        'section' => 'footer_section',
        'type'    => 'url',
        'priority'=> 21,
    ));

    // Link 2
    $wp_customize->add_setting('footer_link_2', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => '',
    ));

    $wp_customize->add_control('footer_link_2', array(
        'label'   => 'Link 2 URL',
        'section' => 'footer_section',
        'type'    => 'url',
        'priority'=> 22,
    ));
}

add_action('customize_register', 'mytheme_footer_customizer');