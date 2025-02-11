<?php
/**
 *  Palawan Color Option
 *
 * @since Palawan 1.0.0
 *
 */

/* Site Title hover color */
$wp_customize->add_setting( 'palawan_options[palawan-primary-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['palawan-primary-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'palawan_options[palawan-primary-color]',
        array(
            'label'       => esc_html__( 'Site Primary Color', 'palawan' ),
            'description' => esc_html__( 'It will change the color of site whole site.', 'palawan' ),
            'section'     => 'colors',
             'settings'  => 'palawan_options[palawan-primary-color]',
        )
    )
);

/* Site Title hover color */
$wp_customize->add_setting( 'palawan_options[palawan-header-description-color]',
    array(
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'transport' => 'refresh',
        'default'           => $default['palawan-header-description-color'],
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'palawan_options[palawan-header-description-color]',
        array(
            'label'       => esc_html__( 'Header Description Color', 'palawan' ),
            'description' => esc_html__( 'It will change the color of site header description.', 'palawan' ),
            'section'     => 'colors',
             'settings'  => 'palawan_options[palawan-header-description-color]',
        )
    )
);
