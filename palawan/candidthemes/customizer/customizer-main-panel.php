<?php
    /*
     * Customizer default value loaded here.
     */
    $default = palawan_default_theme_options_values();

    /*
    * Theme Options Panel
    */
    $wp_customize->add_panel( 'palawan_panel', array(
     'priority' => 25,
     'capability' => 'edit_theme_options',
     'title' => __( 'Palawan Theme Options', 'palawan' ),
    ) );

    /**
     * Load Customizer Colors
     *
     * Colors
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-colors.php';

    /**
     * Load Customizer Header Top setting
     *
     * Header section need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-top-header.php';

    /**
     * Load Customizer Slider setting
     *
     * Slider section need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-slider.php';

    /**
     * Load Customizer Sidebar setting
     *
     * Sidebar need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-sidebar-options.php';

    /**
     * Load Customizer Blog setting
     *
     * Blog need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-blog-page.php';

    /**
     * Load Customizer Single page setting
     *
     * Single page need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-single-page.php';

    /**
     * Load Customizer Breadcrumb setting
     *
     * Breadcrumb need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-breadcrumb.php';

    /**
     * Load Customizer footer setting
     *
     * footer need to manage from here
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-footer-settings.php';

    /**
     * Load Customizer Extra Settings
     *
     * Options for theme extra settings
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-extra-options.php';

    /**
     * Load Customizer Font Settings
     *
     * Change font of site
    */
    require get_template_directory() . '/candidthemes/customizer/customizer-typography.php';
