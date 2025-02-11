<?php
/**
 *  Palawan Sidebar Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'palawan_sidebar_section', array(
   'priority'       => 45,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sidebar Options', 'palawan' ),
   'panel' 		 => 'palawan_panel',
) );
/*Blog Page Sidebar Layout*/
$wp_customize->add_setting( 'palawan_options[palawan-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-sidebar-blog-page'],
    'sanitize_callback' => 'palawan_sanitize_select'
) );
$wp_customize->add_control( 'palawan_options[palawan-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','palawan'),
    'left-sidebar'    => __('Left Sidebar','palawan'),
    'no-sidebar'      => __('No Sidebar','palawan'),
    'middle-column'   => __('Middle Column','palawan')
),
   'label'     => __( 'Blog Page Sidebar Layout', 'palawan' ),
   'description' => __('This sidebar will work for the blog, archive, category, author pages. More options is in pro theme.', 'palawan'),
   'section'   => 'palawan_sidebar_section',
   'settings'  => 'palawan_options[palawan-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );

/*Inner Page Sidebar Layout*/
$wp_customize->add_setting( 'palawan_options[palawan-sidebar-single-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-sidebar-single-page'],
    'sanitize_callback' => 'palawan_sanitize_select'
) );
$wp_customize->add_control( 'palawan_options[palawan-sidebar-single-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','palawan'),
    'left-sidebar'    => __('Left Sidebar','palawan'),
    'no-sidebar'      => __('No Sidebar','palawan'),
    'middle-column'   => __('Middle Column','palawan')
),
   'label'     => __( 'Inner Pages Sidebar Layout', 'palawan' ),
   'description' => __('This sidebar will work for the single page and post. More options is in pro theme.', 'palawan'),
   'section'   => 'palawan_sidebar_section',
   'settings'  => 'palawan_options[palawan-sidebar-single-page]',
   'type'      => 'select',
   'priority'  => 10,
) );


/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'palawan_options[palawan-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-enable-sticky-sidebar'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'palawan' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'palawan'),
    'section'   => 'palawan_sidebar_section',
    'settings'  => 'palawan_options[palawan-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );