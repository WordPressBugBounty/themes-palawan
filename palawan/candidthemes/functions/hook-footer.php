<?php
if (!function_exists('palawan_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function palawan_construct_gototop()
    {
        global $palawan_theme_options;
        $go_to_top_class = esc_attr($palawan_theme_options['palawan-go-to-top-icon']);

        if ($palawan_theme_options['palawan-go-to-top'] == true && !empty($go_to_top_class)) :
?>
            <a href="javascript:void(0);" class="footer-go-to-top go-to-top"><i class="fa <?php echo esc_attr($go_to_top_class); ?>"></i></a>
        <?php
        endif;
    }
}
add_action('palawan_gototop', 'palawan_construct_gototop', 10);

if (!function_exists('palawan_construct_footer_social')) {
    /**
     * Add social icon menu on footer
     *
     * @since 1.0.0
     */
    function palawan_construct_footer_social()
    {
        global $palawan_theme_options;
        if ($palawan_theme_options['palawan-footer-social-icons'] != true)
            return false;
        palawan_social_menu();
    }
}
add_action('palawan_footer_social', 'palawan_construct_footer_social', 10);

if (!function_exists('palawan_footer_copyright')) {
    /**
     * Add Footer copyright texts on footer
     *
     * @since 1.0.0
     */
    function palawan_footer_copyright()
    {
        global $palawan_theme_options;
        $copyright_text = $palawan_theme_options['palawan-footer-copyright'];
        if (!empty($copyright_text)) {
        ?>
            <div class="site-reserved text-center">
                <?php echo esc_html($copyright_text); ?>
            </div>
        <?php
        }
    }
}
add_action('palawan_footer_info_texts', 'palawan_footer_copyright', 10);

if (!function_exists('palawan_footer_theme_info')) {
    /**
     * Add Powered by texts on footer
     *
     * @since 1.0.0
     */
    function palawan_footer_theme_info()
    {
        ?>
        <div class="site-info text-center">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'palawan')); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('Proudly powered by %s', 'palawan'), 'WordPress');
                ?>
            </a>
            <span class="sep"> | </span>
            <?php
            /* translators: 1: Theme name, 2: Theme author. */
            printf(esc_html__('Theme: %1$s by %2$s.', 'palawan'), 'Palawan', '<a href="http://www.candidthemes.com/">Candid Themes</a>');
            ?>
        </div><!-- .site-info -->
    <?php
    }
}
add_action('palawan_footer_info_texts', 'palawan_footer_theme_info', 20);

if (!function_exists('palawan_construct_newsletter')) {
    /**
     * Add Newsletter section on footer
     *
     * @since 1.0.0
     */
    function palawan_construct_newsletter()
    {
        global $palawan_theme_options;
        $mailchimp_id = $palawan_theme_options['palawan-footer-mailchimp-form-id'];
        if (($palawan_theme_options['palawan-footer-mailchimp-subscribe']) != 1 || (empty($mailchimp_id)) || (!function_exists('mc4wp_get_form')) || (get_post_status($mailchimp_id) == false))
            return false;
        $newsletter_title =  $palawan_theme_options['palawan-footer-mailchimp-form-title'];
        $newsletter_description =  $palawan_theme_options['palawan-footer-mailchimp-form-subtitle'];
    ?>
        <section class="newsletter-section">
            <div class="container">
                <article class="newsletter-content">
                    <div class="row">
                        <div class="col-1-1 col-md-1-2">
                            <?php
                            if (!empty($newsletter_title)) {
                            ?>
                                <h2><?php echo esc_html($newsletter_title); ?></h2>
                            <?php
                            }
                            ?>
                            <?php
                            if (!empty($newsletter_description)) {
                            ?>
                                <p><?php echo esc_html($newsletter_description);; ?></p>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-1-1 col-md-1-2">
                            <?php echo mc4wp_get_form(absint($mailchimp_id)); ?>
                        </div>
                    </div>
                </article>
            </div>
        </section>
<?php
    }
}
add_action('palawan_newsletter', 'palawan_construct_newsletter', 10);
