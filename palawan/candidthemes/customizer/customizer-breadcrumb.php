<?php 
/**
 *  Palawan Breadcrumb Settings Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Breadcrumb Options*/
$wp_customize->add_section( 'palawan_breadcrumb_options', array(
    'priority'       => 50,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Breadcrumb Options', 'palawan' ),
    'panel'          => 'palawan_panel',
) );

/*Breadcrumb Enable*/
$wp_customize->add_setting( 'palawan_options[palawan-blog-site-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-blog-site-breadcrumb'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-blog-site-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'palawan' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page. You can use  Yoast SEO, Rank Math or Breadcrumb NavXT plugin breadcrumb as well. Install the plugin and activate the breadcrumb from the settings.', 'palawan' ),
    'section'   => 'palawan_breadcrumb_options',
    'settings'  => 'palawan_options[palawan-blog-site-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*callback functions breadcrumb enable*/
if ( !function_exists('palawan_breadcrumb_selection_enable') ) :
  function palawan_breadcrumb_selection_enable(){
      global $palawan_theme_options;
      $palawan_theme_options = palawan_get_options_value();
      $enable_bc = absint($palawan_theme_options['palawan-blog-site-breadcrumb']);
      if( $enable_bc == true){
          return true;
      }
      else{
          return false;
      }
  }
endif;

/*Show Breadcrumb Types Selection*/
$wp_customize->add_setting( 'palawan_options[palawan-breadcrumb-display-from-option]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-breadcrumb-display-from-option'],
    'sanitize_callback' => 'palawan_sanitize_select'
) );
$wp_customize->add_control( 'palawan_options[palawan-breadcrumb-display-from-option]', array(
    'choices' => array(
        'theme-default'    => __('Theme Default Breadcrumb','palawan'),
        'yoast-breadcrumb'    => __('Yoast SEO Breadcrumb','palawan'),
        'rankmath-breadcrumb'    => __('Rank Math Breadcrumb','palawan'),
        'breadcrumb-navxt'    => __('NavXT Breadcrumb','palawan'),
    ),
    'label'     => __( 'Select the Breadcrumb Show Option', 'palawan' ),
    'description' => __('Theme has its own breadcrumb. If you want to use the plugin breadcrumb, you need to enable the breadcrumb on the respected plugins first. Check plugin settings and enable it.', 'palawan'),
    'section'   => 'palawan_breadcrumb_options',
    'settings'  => 'palawan_options[palawan-breadcrumb-display-from-option]',
    'type'      => 'select',
    'priority'  => 15,
    'active_callback'=> 'palawan_breadcrumb_selection_enable',
) );

/*Breadcrumb Text*/
$wp_customize->add_setting( 'palawan_options[palawan-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'palawan_options[palawan-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'palawan' ),
    'description' => __( 'Write your own text in place of You are Here', 'palawan' ),
    'section'   => 'palawan_breadcrumb_options',
    'settings'  => 'palawan_options[palawan-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback' => 'palawan_breadcrumb_selection_enable',
) );
