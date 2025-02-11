<?php
if (!function_exists('palawan_social_menu')) {
    /**
     * Add social icons menu
     *
     * @since 1.0.0
     *
     */
    function palawan_social_menu()
    {
        if (has_nav_menu('social-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'social-menu',
                'container' => 'ul',
                'menu_class' => 'social-menu'
            ));
        endif;
    }
}


if (!function_exists('palawan_custom_body_class')) {
    /**
     * Add sidebar class in body
     *
     * @since 1.0.0
     *
     */
    function palawan_custom_body_class($classes)
    {
        global $palawan_theme_options;
        if (!empty($palawan_theme_options['palawan-enable-sticky-sidebar']) &&  $palawan_theme_options['palawan-enable-sticky-sidebar'] == 1) {
            $classes[] = 'ct-sticky-sidebar';
        }

        // if (!empty($palawan_theme_options['palawan-font-awesome-version-loading'])) {
        //     $classes[] = 'palawan-fontawesome-version-6' . $palawan_theme_options['palawan-font-awesome-version-loading'];
        // }

        $classes[] = 'palawan-fontawesome-version-6';

        return $classes;
    }
}

add_filter('body_class', 'palawan_custom_body_class');



if (!function_exists('palawan_excerpt_more')) :
    /**
     * Remove ... From Excerpt
     *
     * @since 1.0.0
     */
    function palawan_excerpt_more($more)
    {
        if (!is_admin()) {
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'palawan_excerpt_more');


if (!function_exists('palawan_alter_excerpt')) :
    /**
     * Filter to change excerpt length size
     *
     * @since 1.0.0
     */
    function palawan_alter_excerpt($length)
    {
        if (is_admin()) {
            return $length;
        }
        global $palawan_theme_options;
        if (!empty($palawan_theme_options['palawan-excerpt-length'])) {
            return absint($palawan_theme_options['palawan-excerpt-length']);
        }
        return 25;
    }
endif;
add_filter('excerpt_length', 'palawan_alter_excerpt');


if (!function_exists('palawan_tag_cloud_widget')) :
    /**
     * Function to modify tag clouds font size
     *
     * @param none
     * @return array $args
     *
     * @since 1.0.0
     *
     */
    function palawan_tag_cloud_widget($args)
    {
        $args['largest'] = 0.9; //largest tag
        $args['smallest'] = 0.9; //smallest tag
        $args['unit'] = 'rem'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'palawan_tag_cloud_widget');


/**
 * Google Fonts
 *
 * @param null
 * @return array
 *
 * @since Palawan 1.0.0
 *
 */
if (!function_exists('palawan_google_fonts')) :
    function palawan_google_fonts()
    {
        $palawan_google_fonts = array(
            'Josefin+Sans:ital,wght@400,500,600,700' => 'Josefin Sans',
            'Libre+Baskerville' => 'Libre Baskerville',
            'Lora:ital,wght@0,400..700;1,400..700' => 'Lora',
            'Merriweather:400,400italic,300,900,700' => 'Merriweather',
            'Montserrat:400,700' => 'Montserrat',
            'Muli:400,300italic,300' => 'Muli',
            'Mulish:wght@300;400;500;600;700' => 'Mulish',
            'Open+Sans:400,400italic,600,700' => 'Open Sans',
            'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed',
            'Oswald:400,300,700' => 'Oswald',
            'Oxygen:400,300,700' => 'Oxygen',
            'Poppins:400,500,600,700' => 'Poppins',
            'Roboto:400,500,300,700,400italic' => 'Roboto',
            'Voltaire' => 'Voltaire',
            'Yanone+Kaffeesatz:400,300,700' => 'Yanone Kaffeesatz'
        );
        return apply_filters('palawan_google_fonts', $palawan_google_fonts);
    }
endif;


/**
 * Enqueue the list of fonts.
 */
function palawan_customizer_fonts()
{
    wp_enqueue_style('palawan_customizer_fonts', 'https://fonts.googleapis.com/css?family=Josefin+Sans|Libre+Baskerville|Lora|Merriweather|Montserrat|Muli|Mulish|Open+Sans|Open+Sans+Condensed|Oswald|Oxygen|Poppins|Roboto|Voltaire|Yanone+Kaffeesatz', array(), null);
}

add_action('customize_controls_print_styles', 'palawan_customizer_fonts');
add_action('customize_preview_init', 'palawan_customizer_fonts');

add_action(
    'customize_controls_print_styles',
    function () {
?>
    <style>
        <?php
        $arr = array('Josefin+Sans', 'Libre+Baskerville', 'Lora', 'Merriweather', 'Montserrat', 'Muli','Mulish', 'Open+Sans', 'Open+Sans+Condensed', 'Oswald', 'Oxygen', 'Poppins', 'Roboto', 'Voltaire', 'Yanone+Kaffeesatz');

        foreach ($arr as $font) {
            $font_family = str_replace("+", " ", $font);
            echo '.customize-control select option[value*="' . $font . '"] {font-family: ' . $font_family . '; font-size: 22px;}';
        }
        ?>
    </style>
<?php
    }
);


if (!function_exists('palawan_editor_assets')) {
    /**
     * Add styles and fonts for the editor.
     */
    function palawan_editor_assets()
    {
        wp_enqueue_style('palawan-fonts', palawan_fonts_url(), array(), null);

        /* Paragraph Font Options */
        $palawan_custom_css = '';
        global $palawan_theme_options;
        $palawan_theme_options = palawan_get_options_value();
        $palawan_google_fonts = palawan_google_fonts();

        $palawan_body_fonts = esc_attr($palawan_theme_options['palawan-font-family-url']);
        $palawan_heading_fonts = esc_attr($palawan_theme_options['palawan-font-heading-family-url']);

        $palawan_google_fonts_enqueue = array(
            $palawan_body_fonts,
            $palawan_heading_fonts,
        );
        $palawan_google_fonts_enqueue_uniques = array_unique($palawan_google_fonts_enqueue);
        foreach ($palawan_google_fonts_enqueue_uniques as $palawan_google_fonts_enqueue_unique) {
            wp_enqueue_style(
                $palawan_google_fonts_enqueue_unique,
                '//fonts.googleapis.com/css?family=' . $palawan_google_fonts_enqueue_unique . '',
                array(),
                ''
            );
        }
        if (!empty($palawan_body_fonts)) {
            $palawan_font_family = esc_attr($palawan_google_fonts[$palawan_body_fonts]);
            if (!empty($palawan_font_family)) {
                $palawan_custom_css .= ".editor-styles-wrapper .wp-block-table td, .editor-styles-wrapper .wp-block-table th, .editor-styles-wrapper, .editor-styles-wrapper .wp-block-button__link, .editor-styles-wrapper ul li, .editor-styles-wrapper ol li, .editor-styles-wrapper p, .editor-styles-wrapper .editor-block-list__block-edit, .editor-block-list__block  { font-family: '{$palawan_font_family}'; }";
            }
        }

        /* Heading H1 Font Option */
        if (!empty($palawan_heading_fonts)) {
            $palawan_heading_font_family = $palawan_google_fonts[$palawan_heading_fonts];
            if (!empty($palawan_heading_font_family)) {
                $palawan_custom_css .= ".editor-post-title__block .editor-post-title__input , .editor-styles-wrapper h1, .editor-styles-wrapper h2, .editor-styles-wrapper h3, .editor-styles-wrapper h4, .editor-styles-wrapper h5, .editor-styles-wrapper h6 { font-family: '{$palawan_heading_font_family}'; }";
            }
        }

        wp_add_inline_style($palawan_google_fonts_enqueue_unique, $palawan_custom_css);
    }

    add_action('enqueue_block_editor_assets', 'palawan_editor_assets');
}
