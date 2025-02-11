<?php
if (!function_exists('palawan_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function palawan_do_skip_to_content_link()
    {
?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'palawan'); ?></a>
    <?php
    }
}
add_action('palawan_before_header', 'palawan_do_skip_to_content_link', 10);


if (!function_exists('palawan_header_search_modal')) {
    /**
     * Add search modal before header
     *
     * @since 1.0.0
     */
    function palawan_header_search_modal()
    {
        global $palawan_theme_options;
        if (($palawan_theme_options['palawan-enable-header-search'] != 1) || ($palawan_theme_options['palawan-enable-header'] != 1))
            return false;
    ?>
        <section class="search-section">
            <div class="container">
                <button class="close-btn"><i class="fa fa-times"></i></button>
                <?php get_search_form(); ?>
            </div>
        </section>
    <?php

    }
}
add_action('palawan_header', 'palawan_header_search_modal', 10);


if (!function_exists('palawan_construct_header')) {
    /**
     * Add header
     *
     * @since 1.0.0
     */
    function palawan_construct_header()
    {
        global $palawan_theme_options;
        $palawan_enable_top_header = absint($palawan_theme_options['palawan-enable-header']);
        $palawan_enable_top_social = absint($palawan_theme_options['palawan-enable-header-social']);
        $palawan_enable_top_search = absint($palawan_theme_options['palawan-enable-header-search']);
    ?>
        
        <?php
        if ($palawan_enable_top_header == 1) {
        ?>
            <header id="masthead" class="site-header text-center site-header-v2">
                <?php 
                    /**
                 * palawan_main_header hook.
                 *
                 * @since 1.0.0
                 *
                 * @hooked palawan_construct_main_header - 10
                 */
                do_action('palawan_main_header');
                ?>
            </header><!-- #masthead -->

        <?php
        }

    }
}
add_action('palawan_header', 'palawan_construct_header', 20);


if (!function_exists('palawan_top_search')) {
    /**
     * Add search icon on top header.
     *
     * @since 1.0.0
     */
    function palawan_top_search()
    {
        global $palawan_theme_options;
        if ($palawan_theme_options['palawan-enable-header-search'] != 1)
            return false;
    ?>
        <button class="search-toggle desktop-hide"><i class="fa fa-search"></i></button>
    <?php
    }
}
add_action('palawan_top_right', 'palawan_top_search', 20);

if (!function_exists('palawan_top_social')) {
    /**
     * Add social icon menu on top header.
     *
     * @since 1.0.0
     */
    function palawan_top_social()
    {
        global $palawan_theme_options;
        if ($palawan_theme_options['palawan-enable-header-social'] != 1)
            return false;
        palawan_social_menu();
    }
}
add_action('palawan_top_right', 'palawan_top_social', 10);

if (!function_exists('palawan_construct_main_header')) {
    /**
     * Add Main Header
     *
     * @since 1.0.0
     */
    function palawan_construct_main_header()
    {

        /**
         * palawan_header_default hook.
         *
         * @since 1.0.0
         *
         * @hooked palawan_default_header - 10
         */
        do_action('palawan_header_default');
    }
}
add_action('palawan_main_header', 'palawan_construct_main_header', 10);


if (!function_exists('palawan_default_header')) {
    /**
     * Add Default header
     *
     * @since 1.0.0
     */
    function palawan_default_header()
    {

        //has header image
        $has_header_image = has_header_image();

    ?>

        <div id="site-nav-wrap">
            <section class="site-header-top header-main-bar" <?php if (!empty($has_header_image)) { ?> style="background-image: url(<?php echo header_image(); ?>);" <?php } ?>>
                <div class="container">
                    <div class="row">
                        <div class="col col-md-1-4 header-col-left mobile-hide">
                            <?php
                                global $palawan_theme_options;
                                if ($palawan_theme_options['palawan-enable-header-search'] == 1){
                                get_search_form();
                            }
                            ?>    
                        </div>

                        <div class="col col-md-1-2 header-col-center text-center">
                            <?php
                            /**
                             * palawan_branding hook.
                             *
                             * @since 1.0.0
                             *
                             * @hooked palawan_construct_branding - 10
                             */
                            do_action('palawan_branding');
                            ?>
                        </div>

                        <div class="col col-md-1-4 header-col-right">
                            <div class="palawan-menu-social topbar-flex-grid">
                                <?php
                                /**
                                 * palawan_top_right hook.
                                 *
                                 * @since 1.0.0
                                 *
                                 * @hooked palawan_top_search - 10
                                 * @hooked palawan_top_social - 20
                                 *
                                 */
                                do_action('palawan_top_right');
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section id="site-navigation-wrap" class="site-header-bottom">
                <div class="container">
                    <?php
                    /**
                     * palawan_main_menu hook.
                     *
                     * @since 1.0.0
                     *
                     * @hooked palawan_construct_main_menu - 10
                     */
                    do_action('palawan_main_menu');
                    ?>

                </div>
            </section>
        </div>
    <?php
    }
}
add_action('palawan_header_default', 'palawan_default_header', 10);





if (!function_exists('palawan_construct_branding')) {
    /**
     * Add Branding on Header
     *
     * @since 1.0.0
     */
    function palawan_construct_branding()
    {
    ?>
        <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
            ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php
            else :
            ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;
            $palawan_description = get_bloginfo('description', 'display');
            if ($palawan_description || is_customize_preview()) :
            ?>
                <p class="site-description"><?php echo $palawan_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                            ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <button id="menu-toggle-button" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </button>
    <?php
    }
}
add_action('palawan_branding', 'palawan_construct_branding', 10);



if (!function_exists('palawan_construct_main_menu')) {
    /**
     * Add Main Menu on Header
     *
     * @since 1.0.0
     */
    function palawan_construct_main_menu()
    {
    ?>
        <nav class="main-navigation">
            <ul id="primary-menu" class="nav navbar-nav nav-menu justify-content-center">
                <?php
                if (has_nav_menu('menu-1')) :
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'items_wrap' => '%3$s',
                        'container' => false
                    ));
                else :
                    wp_list_pages(array('depth' => 0, 'title_li' => ''));
                endif; // has_nav_menu
                ?>
                <button class="close_nav"><i class="fa fa-times"></i></button>
            </ul>
        </nav><!-- #site-navigation -->

        
<?php
    }
}
add_action('palawan_main_menu', 'palawan_construct_main_menu', 10);
