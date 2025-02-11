<?php
/**
 *  Palawan Typography Option
 *
 * @since Palawan 1.1.9
 *
 */
$wp_customize->add_panel( 'palawan_typography', array(
    'priority' => 30,
    'capability' => 'edit_theme_options',
    'title' => __( 'Fonts Options', 'palawan' ),
) );

/*
* Font and Typography Options
* Paragraph Option Section
* Palawan 1.1.9
*/
$wp_customize->add_section( 'palawan_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Paragraph Font', 'palawan' ),
   'panel' 		 => 'palawan_typography',
) );
/*Paragraph Font Family*/
$wp_customize->add_setting( 'palawan_options[palawan-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-font-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = palawan_google_fonts();
$wp_customize->add_control( 'palawan_options[palawan-font-family-url]', array(
    'label'     => __( 'Body Paragraph Font Family', 'palawan' ),
    'description' =>__( 'Select the required font from the dropdown.', 'palawan' ),
    'choices'  	=> $choices,
    'section'   => 'palawan_font_options',
    'settings'  => 'palawan_options[palawan-font-family-url]',
    'type'      => 'select',
    'priority'  => 15,
) );

/*
* Heading Fonts Options
* Heading Font Option Section
* Palawan 1.1.9
*/

/*Heading Fonts*/
$wp_customize->add_section( 'palawan_heading_font_options', array(
    'priority'       => 30,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Heading Font Family', 'palawan' ),
    'panel'         => 'palawan_typography',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'palawan_options[palawan-font-heading-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-font-heading-family-url'],
    'sanitize_callback' => 'wp_kses_post'
) );
$choices = palawan_google_fonts();
$wp_customize->add_control( 'palawan_options[palawan-font-heading-family-url]', array(
    'label'     => __( 'Select Heading Font Family', 'palawan' ),
    'description' => __( 'Select the required font from the dropdown(H1-H6).', 'palawan' ),
    'choices'  	=> $choices,
    'section'   => 'palawan_heading_font_options',
    'settings'  => 'palawan_options[palawan-font-heading-family-url]',
    'type'      => 'select',
    'priority'  => 10,
) );