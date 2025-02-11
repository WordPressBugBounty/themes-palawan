<?php
/**
 *  Palawan Extra Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'palawan_extra_section', array(
   'priority'       => 60,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Extra Options', 'palawan' ),
   'panel' 		 => 'palawan_panel',
) );

/*post published or updated date*/
$wp_customize->add_setting( 'palawan_options[palawan-post-published-updated-date]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-post-published-updated-date'],
    'sanitize_callback' => 'palawan_sanitize_select'
) );
$wp_customize->add_control( 'palawan_options[palawan-post-published-updated-date]', array(
   'choices' => array(
    'post-published'    => __('Show Post Published Date','palawan'),
    'post-updated'   => __('Show Post Updated Date','palawan'),
),
   'label'     => __( 'Show Post Publish or Updated Date', 'palawan' ),
   'description' => __('Show either post published or updated date.', 'palawan'),
   'section'   => 'palawan_extra_section',
   'settings'  => 'palawan_options[palawan-post-published-updated-date]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Font awesome version loading*/
// $wp_customize->add_setting( 'palawan_options[palawan-font-awesome-version-loading]', array(
//    'capability'        => 'edit_theme_options',
//    'transport' => 'refresh',
//    'default'           => $default['palawan-font-awesome-version-loading'],
//    'sanitize_callback' => 'palawan_sanitize_select'
// ) );
// $wp_customize->add_control( 'palawan_options[palawan-font-awesome-version-loading]', array(
//   'choices' => array(
//    'version-4'    => __('Current Theme Used Version 4','palawan'),
//    'version-5'   => __('New Fontaweome Version 5','palawan'),
//    'version-6' => __('Version 6', 'palawan')
// ),
//   'label'     => __( 'Select the preferred fontawesome version', 'palawan' ),
//   'description' => __('You can select the latest fontawesome version to get more options for icons', 'palawan'),
//   'section'   => 'palawan_extra_section',
//   'settings'  => 'palawan_options[palawan-font-awesome-version-loading]',
//   'type'      => 'select',
//   'priority'  => 10,
// ) );