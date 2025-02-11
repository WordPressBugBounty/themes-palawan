<?php
/**
 *  Palawan Slider Featured Section Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Slider Options*/
$wp_customize->add_section( 'palawan_slider_section', array(
 'priority'       => 20,
 'capability'     => 'edit_theme_options',
 'theme_supports' => '',
 'title'          => __( 'Slider Section Options', 'palawan' ),
 'panel' 		 => 'palawan_panel',
) );
/*callback functions slider*/
if ( !function_exists('palawan_slider_active_callback') ) :
  function palawan_slider_active_callback(){
    global $palawan_theme_options;
    $palawan_theme_options = palawan_get_options_value();
    $enable_slider = absint($palawan_theme_options['palawan-enable-slider']);
    if( true == $enable_slider ){
      return true;
    }
    else{
      return false;
    }
  }
endif;
/*Slider Enable Option*/
$wp_customize->add_setting( 'palawan_options[palawan-enable-slider]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['palawan-enable-slider'],
 'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-slider]', array(
 'label'     => __( 'Enable Slider Section', 'palawan' ),
 'description' => __('Checked to show slider section in Home Page.', 'palawan'),
 'section'   => 'palawan_slider_section',
 'settings'  => 'palawan_options[palawan-enable-slider]',
 'type'      => 'checkbox',
 'priority'  => 10,
) );

/*Slider Category Selection*/
$wp_customize->add_setting( 'palawan_options[palawan-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['palawan-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new palawan_Customize_Category_Dropdown_Control(
    $wp_customize,
    'palawan_options[palawan-select-category]',
    array(
      'label'     => __( 'Select Category For Slider Section', 'palawan' ),
      'description' => __('From the dropdown select the category for the featured left section. Category having post will display in below dropdown.', 'palawan'),
      'section'   => 'palawan_slider_section',
      'settings'  => 'palawan_options[palawan-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 10,
      'active_callback'=>'palawan_slider_active_callback'
    )
  )
);

/*Slider image size*/
$wp_customize->add_setting( 'palawan_options[palawan-image-size-slider]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-image-size-slider'],
    'sanitize_callback' => 'palawan_sanitize_select'
) );
$wp_customize->add_control( 'palawan_options[palawan-image-size-slider]', array(
   'choices' => array(
    'cropped-image'    => __('Cropped Image','palawan'),
    'original-image'   => __('Original Image','palawan'),
),
   'label'     => __( 'Size of the image, either cropped or original', 'palawan' ),
   'description' => __('The image will be either cropped or original size based on the image. Recommended image size is 1170*606 px. Make the image with this size and add in the featured image.', 'palawan'),
   'section'   => 'palawan_slider_section',
   'settings'  => 'palawan_options[palawan-image-size-slider]',
   'type'      => 'select',
   'priority'  => 10,
   'active_callback'=>'palawan_slider_active_callback'
) );