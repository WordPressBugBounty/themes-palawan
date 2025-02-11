<?php
/**
 *  Palawan Top Header Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'palawan_header_section', array(
   'priority'       => 5,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Options', 'palawan' ),
   'panel' 		 => 'palawan_panel',
) );
/*callback functions header section*/
if ( !function_exists('palawan_header_active_callback') ) :
  function palawan_header_active_callback(){
      global $palawan_theme_options;
      $palawan_theme_options = palawan_get_options_value();
      $enable_header = absint($palawan_theme_options['palawan-enable-header']);
      if( true == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Enable Header Section*/
$wp_customize->add_setting( 'palawan_options[palawan-enable-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['palawan-enable-header'],
   'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-header]', array(
   'label'     => __( 'Enable Header Section', 'palawan' ),
   'description' => __('Check to show the header section', 'palawan'),
   'section'   => 'palawan_header_section',
   'settings'  => 'palawan_options[palawan-enable-header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );

/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'palawan_options[palawan-enable-header-social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['palawan-enable-header-social'],
   'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-header-social]', array(
   'label'     => __( 'Enable Social Icons', 'palawan' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'palawan'),
   'section'   => 'palawan_header_section',
   'settings'  => 'palawan_options[palawan-enable-header-social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'palawan_header_active_callback'
) );

/*Enable Search in Header*/
$wp_customize->add_setting( 'palawan_options[palawan-enable-header-search]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-enable-header-search'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-header-search]', array(
    'label'     => __( 'Search in Header', 'palawan' ),
    'description' => __('Enable Search icon in Header', 'palawan'),
    'section'   => 'palawan_header_section',
    'settings'  => 'palawan_options[palawan-enable-header-search]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'palawan_header_active_callback'
) );