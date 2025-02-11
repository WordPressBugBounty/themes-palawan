<?php
/**
 * palawan Theme Customizer
 *
 * @package palawan
 */

/**
 * Palawan Theme Customizer
 *
 * @package Palawan
 */
/**
 * Load Customizer Defult Settings
 *
 * Default value for the customizer set here.
 */
require get_template_directory() . '/candidthemes/customizer/customizer-default-values.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function palawan_customize_register( $wp_customize ) {
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'palawan_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'palawan_customize_partial_blogdescription',
            )
        );
    }

    /**
     * Load Customizer Settings
     *
     * All the settings for appearance > customize
     */
    require get_template_directory() . '/candidthemes/customizer/customizer-main-panel.php';
}
add_action( 'customize_register', 'palawan_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function palawan_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function palawan_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function palawan_customize_preview_js() {
    wp_enqueue_script( 'palawan-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'palawan_customize_preview_js' );

/**
 * Customizer Styles
 */
function palawan_customizer_css() {
    wp_enqueue_style('palawan-customizer-css', get_template_directory_uri() . '/candidthemes/assets/custom/css/customizer-style.css', array(), '1.0.0');
}
add_action( 'customize_controls_enqueue_scripts', 'palawan_customizer_css' );
