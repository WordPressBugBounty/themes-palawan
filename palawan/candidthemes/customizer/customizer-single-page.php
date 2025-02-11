<?php
/**
 *  Palawan Single Page Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'palawan_single_page_section', array(
   'priority'       => 40,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'palawan' ),
   'panel' 		 => 'palawan_panel',
) );


/*Featured Image Option*/
$wp_customize->add_setting( 'palawan_options[palawan-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-single-page-featured-image'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'palawan' ),
    'description' => __('You can hide or show featured image on single page.', 'palawan'),
    'section'   => 'palawan_single_page_section',
    'settings'  => 'palawan_options[palawan-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

/*Hide Tags in Single Page*/
$wp_customize->add_setting( 'palawan_options[palawan-single-page-tags]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-single-page-tags'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-single-page-tags]', array(
    'label'     => __( 'Enable Posts Tags', 'palawan' ),
    'description' => __('You can enable the post tags in single page.', 'palawan'),
    'section'   => 'palawan_single_page_section',
    'settings'  => 'palawan_options[palawan-single-page-tags]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Enable Underline in single post link place */
$wp_customize->add_setting( 'palawan_options[palawan-enable-underline-link]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-enable-underline-link'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-underline-link]', array(
    'label'     => __( 'Enable Underline on Link', 'palawan' ),
    'description' => __('If you enabled this, you will see the underline in the links. You can change it color from the general section of colors.', 'palawan'),
    'section'   => 'palawan_single_page_section',
    'settings'  => 'palawan_options[palawan-enable-underline-link]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Related Post Options*/
$wp_customize->add_setting( 'palawan_options[palawan-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-single-page-related-posts'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'palawan' ),
    'description' => __('3 Post from similar category will display at the end of the page.', 'palawan'),
    'section'   => 'palawan_single_page_section',
    'settings'  => 'palawan_options[palawan-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );
/*callback functions related posts*/
if ( !function_exists('palawan_related_post_callback') ) :
    function palawan_related_post_callback(){
        global $palawan_theme_options;
        $palawan_theme_options = palawan_get_options_value();
        $related_posts = absint($palawan_theme_options['palawan-single-page-related-posts']);
        if( true == $related_posts ){
            return true;
        }
        else{
            return false;
        }
    }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'palawan_options[palawan-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'palawan_options[palawan-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'palawan' ),
    'description' => __('Give the appropriate title for related posts', 'palawan'),
    'section'   => 'palawan_single_page_section',
    'settings'  => 'palawan_options[palawan-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 20,
    'active_callback'=>'palawan_related_post_callback'
) );