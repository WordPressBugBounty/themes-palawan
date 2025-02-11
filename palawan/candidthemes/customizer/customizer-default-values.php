<?php
/**
 * Palawan Theme Customizer default values
 *
 * @package Palawan
 */
if ( !function_exists('palawan_default_theme_options_values') ) :
    function palawan_default_theme_options_values() {
        $default_theme_options = array(
            /*Top Header*/
            'palawan-enable-header'=> true,
            'palawan-enable-header-social'=> true,
            'palawan-enable-header-search'=> true,

            /*Slider Settings Option*/
            'palawan-enable-slider'=> false,
            'palawan-select-category'=> 0,
            'palawan-image-size-slider'=> 'cropped-image',

            /*Sidebar Options*/
            'palawan-sidebar-blog-page'=>'no-sidebar',
            'palawan-sidebar-single-page' =>'right-sidebar',
            'palawan-enable-sticky-sidebar'=> true,


            /*Blog Page Default Value*/
            'palawan-column-blog-page'=> 'three-column',
            'palawan-content-show-from'=>'excerpt',
            'palawan-excerpt-length'=>15,
            'palawan-pagination-options'=>'numeric',
            'palawan-read-more-text'=> '',
            'palawan-blog-page-masonry-normal'=> 'masonry',
            'palawan-blog-page-image-position'=> 'left-image',
            'palawan-image-size-blog-page'=> 'original-image',

            /*Single Page Default Value*/
            'palawan-single-page-featured-image'=> true,
            'palawan-single-page-tags'=> false,
            'palawan-enable-underline-link' => true,
            'palawan-single-page-related-posts'=> true,
            'palawan-single-page-related-posts-title'=> esc_html__('Related Posts','palawan'),


            /*Breadcrumb Settings*/
            'palawan-blog-site-breadcrumb'=> true,
            'palawan-breadcrumb-display-from-option'=> 'theme-default',
            'palawan-breadcrumb-text'=> '',

             /*General Colors*/
            'palawan-primary-color' => '#dd9933',
            'palawan-header-description-color'=>'#404040',

            /*Footer Options*/
            'palawan-footer-copyright'=> esc_html__('All Rights Reserved 2024.','palawan'),
            'palawan-go-to-top'=> true,
            'palawan-go-to-top-icon'=> esc_html__('fa-chevron-up','palawan'),
            'palawan-go-to-top-icon-new'=> esc_html__('fa-chevron-up','palawan'),
            'palawan-footer-social-icons'=> false,
            'palawan-footer-mailchimp-subscribe'=> false,
            'palawan-footer-mailchimp-form-id'=> '',
            'palawan-footer-mailchimp-form-title'=>  esc_html__('Subscribe to my Newsletter','palawan'),
            'palawan-footer-mailchimp-form-subtitle'=> esc_html__('Be the first to receive the latest buzz on upcoming contests & more!','palawan'),

            /*Font Options*/
            'palawan-font-family-url'=> 'Lora:ital,wght@0,400..700;1,400..700',
            'palawan-font-heading-family-url'=> 'Josefin+Sans:ital,wght@400,500,600,700',

            /*Extra Options*/
            'palawan-post-published-updated-date'=> 'post-published',
            //'palawan-font-awesome-version-loading'=> 'version-5',

        );
        return apply_filters( 'palawan_default_theme_options_values', $default_theme_options );
    }
endif;

/**
 *  Palawan Theme Options and Settings
 *
 * @since Palawan 1.0.0
 *
 * @param null
 * @return array palawan_get_options_value
 *
 */
if ( !function_exists('palawan_get_options_value') ) :
    function palawan_get_options_value() {
        $palawan_default_theme_options_values = palawan_default_theme_options_values();
        $palawan_get_options_value = get_theme_mod( 'palawan_options');
        if( is_array( $palawan_get_options_value )){
            return array_merge( $palawan_default_theme_options_values, $palawan_get_options_value );
        }
        else{
            return $palawan_default_theme_options_values;
        }
    }
endif;