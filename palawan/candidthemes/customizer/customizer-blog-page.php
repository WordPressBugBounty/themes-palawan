<?php

/**
 *  Palawan Blog Page Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section('palawan_blog_page_section', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __('Blog Section Options', 'palawan'),
    'panel'          => 'palawan_panel',
));

/*Blog Page Layout Masonry*/
$wp_customize->add_setting('palawan_options[palawan-blog-page-masonry-normal]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-blog-page-masonry-normal'],
    'sanitize_callback' => 'palawan_sanitize_select'
));
$wp_customize->add_control('palawan_options[palawan-blog-page-masonry-normal]', array(
    'choices' => array(
        'normal'    => __('Normal Layout', 'palawan'),
        'masonry'   => __('Masonry Layout', 'palawan'),
        'full-image' => __('Full Image Layout', 'palawan'),
    ),
    'label'     => __('Masonry or Normal Layout', 'palawan'),
    'description' => __('Some image layout option will not work in masonry.', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-blog-page-masonry-normal]',
    'type'      => 'select',
    'priority'  => 10,
));

/*Blog Page Show content from*/
$wp_customize->add_setting('palawan_options[palawan-content-show-from]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-content-show-from'],
    'sanitize_callback' => 'palawan_sanitize_select'
));
$wp_customize->add_control('palawan_options[palawan-content-show-from]', array(
    'choices' => array(
        'excerpt'    => __('Excerpt', 'palawan'),
        'content'    => __('Content', 'palawan'),
        'hide'    => __('Hide Content', 'palawan'),
    ),
    'label'     => __('Select Content Display Option', 'palawan'),
    'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-content-show-from]',
    'type'      => 'select',
    'priority'  => 10,
));

/*Blog image size*/
$wp_customize->add_setting('palawan_options[palawan-image-size-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-image-size-blog-page'],
    'sanitize_callback' => 'palawan_sanitize_select'
));
$wp_customize->add_control('palawan_options[palawan-image-size-blog-page]', array(
    'choices' => array(
        'cropped-image'    => __('Cropped Image', 'palawan'),
        'original-image'   => __('Original Image', 'palawan'),
    ),
    'label'     => __('Size of the image, either cropped or original', 'palawan'),
    'description' => __('The image will be either cropped or original size based on the image. Recommended image size is 800*600 px.', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-image-size-blog-page]',
    'type'      => 'select',
    'priority'  => 10,
));

/*Blog Page excerpt length*/
$wp_customize->add_setting('palawan_options[palawan-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-excerpt-length'],
    'sanitize_callback' => 'absint'
));
$wp_customize->add_control('palawan_options[palawan-excerpt-length]', array(
    'label'     => __('Size of Excerpt Content', 'palawan'),
    'description' => __('Enter the number per Words to show the content in blog page.', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-excerpt-length]',
    'type'      => 'number',
    'priority'  => 10,
));
/*Blog Page Pagination Options*/
$wp_customize->add_setting('palawan_options[palawan-pagination-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-pagination-options'],
    'sanitize_callback' => 'palawan_sanitize_select'
));
$wp_customize->add_control('palawan_options[palawan-pagination-options]', array(
    'choices' => array(
        'default'    => __('Default', 'palawan'),
        'numeric'    => __('Numeric', 'palawan'),
        'ajax'    => __('Loading in Same Page', 'palawan'),
    ),
    'label'     => __('Pagination Types', 'palawan'),
    'description' => __('Select the Required Pagination Type', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-pagination-options]',
    'type'      => 'select',
    'priority'  => 10,
));
/*Blog Page read more text*/
$wp_customize->add_setting('palawan_options[palawan-read-more-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
));
$wp_customize->add_control('palawan_options[palawan-read-more-text]', array(
    'label'     => __('Enter Read More Text', 'palawan'),
    'description' => __('Read more text for blog and archive page.', 'palawan'),
    'section'   => 'palawan_blog_page_section',
    'settings'  => 'palawan_options[palawan-read-more-text]',
    'type'      => 'text',
    'priority'  => 10,
));
