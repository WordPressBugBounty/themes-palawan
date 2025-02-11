<?php
/**
 * Palawan Footer Option
 *
 * @since Palawan 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'palawan_footer_section', array(
   'priority'       => 55,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'palawan' ),
   'panel' 		 => 'palawan_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'palawan_options[palawan-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'palawan_options[palawan-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'palawan' ),
    'description' => __('Enter your own copyright text.', 'palawan'),
    'section'   => 'palawan_footer_section',
    'settings'  => 'palawan_options[palawan-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'palawan_options[palawan-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-go-to-top'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'palawan' ),
    'description' => __('Checked to Enable Go to Top', 'palawan'),
    'section'   => 'palawan_footer_section',
    'settings'  => 'palawan_options[palawan-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*callback functions header section*/
if ( !function_exists('palawan_go_to_top_active_callback') ) :
    function palawan_go_to_top_active_callback(){
        global $palawan_theme_options;
        $palawan_theme_options = palawan_get_options_value();
        $go_to_top_class = absint($palawan_theme_options['palawan-go-to-top']);
        if( true == $go_to_top_class ){
            return true;
        }
        else{
            return false;
        }
    }
  endif;

/*Go to top Icon*/
// $wp_customize->add_setting( 'palawan_options[palawan-go-to-top-icon]', array(
//     'capability'        => 'edit_theme_options',
//     'transport' => 'refresh',
//     'default'           => $default['palawan-go-to-top-icon'],
//     'sanitize_callback' => 'sanitize_text_field'
// ) );
// $wp_customize->add_control( 'palawan_options[palawan-go-to-top-icon]', array(
//     'label'     => __( 'Font awesome class', 'palawan' ),
//     'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
//         __( 'Enter fontaweome class like fa-long-arrow-up, fa-angle-up, etc. You can find more icons here in', 'palawan' ),
//         esc_url('https://fontawesome.com/v4.7/icons/'),
//         __('Fontawesome lists and icons name' , 'palawan'),
//         __('so that you can use any icon from here.' ,'palawan')
//     ),
//     'section'   => 'palawan_footer_section',
//     'settings'  => 'palawan_options[palawan-go-to-top-icon]',
//     'type'      => 'text',
//     'priority'  => 15,
//     'active_callback'=> 'palawan_go_to_top_active_callback',
// ) );

/*Go to top Icon for font awesome 6*/
$wp_customize->add_setting( 'palawan_options[palawan-go-to-top-icon]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-go-to-top-icon'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'palawan_options[palawan-go-to-top-icon]', array(
    'label'     => __( 'Font Awesome 6 : Icon class name', 'palawan' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Enter font aweome class like fa-long-arrow-alt-up, fa-angle-up, etc. You can find more icons here in', 'palawan' ),
        esc_url('https://fontawesome.com/v6/search?o=r&m=free'),
        __('Fontawesome 6 lists and icons name' , 'palawan'),
        __('so that you can use any icon from here.' ,'palawan')
    ),
    'section'   => 'palawan_footer_section',
    'settings'  => 'palawan_options[palawan-go-to-top-icon]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=> 'palawan_go_to_top_active_callback',
) );

/*Social Icons Footer*/
$wp_customize->add_setting( 'palawan_options[palawan-footer-social-icons]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['palawan-footer-social-icons'],
    'sanitize_callback' => 'palawan_sanitize_checkbox'
) );
$wp_customize->add_control( 'palawan_options[palawan-footer-social-icons]', array(
    'label'     => __( 'Enable Social Icons', 'palawan' ),
    'description' => __('Checked to Enable Social Icons. Make Social Menus from Appearance > Menus.', 'palawan'),
    'section'   => 'palawan_footer_section',
    'settings'  => 'palawan_options[palawan-footer-social-icons]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );

if(function_exists('mc4wp_get_form')) {

    /*Enable Subscribe in Footer*/
    $wp_customize->add_setting('palawan_options[palawan-footer-mailchimp-subscribe]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['palawan-footer-mailchimp-subscribe'],
        'sanitize_callback' => 'palawan_sanitize_checkbox'
    ));
    $wp_customize->add_control('palawan_options[palawan-footer-mailchimp-subscribe]', array(
        'label' => __('Mailchimp Subscribe Form', 'palawan'),
        'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Install and Customize', 'palawan' ),
        esc_url('https://wordpress.org/plugins/mailchimp-for-wp/'),
        __('Mailchimp Subscribe Plugin' , 'palawan'),
        __('and paste the form ID below.' ,'palawan')
    ),
        'section' => 'palawan_footer_section',
        'settings' => 'palawan_options[palawan-footer-mailchimp-subscribe]',
        'type' => 'checkbox',
        'priority' => 15,
    ));

    /*callback functions mailchimp enable*/
    if (!function_exists('palawan_footer_mailchimp_enable')) :
        function palawan_footer_mailchimp_enable()
        {
            global $palawan_theme_options;
            $palawan_theme_options = palawan_get_options_value();
            $enable_mailchimp = absint($palawan_theme_options['palawan-footer-mailchimp-subscribe']);
            if ($enable_mailchimp == true) {
                return true;
            } else {
                return false;
            }
        }
    endif;

    /*Enable Mailchimp form Id in Footer*/
    $wp_customize->add_setting('palawan_options[palawan-footer-mailchimp-form-id]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['palawan-footer-mailchimp-form-id'],
        'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('palawan_options[palawan-footer-mailchimp-form-id]', array(
        'label' => __('Mailchimp Form ID', 'palawan'),
        'description' => __('From your dashboard go to the mailchimp form plugin and get the ID and put here.', 'palawan'),
        'section' => 'palawan_footer_section',
        'settings' => 'palawan_options[palawan-footer-mailchimp-form-id]',
        'type' => 'number',
        'priority' => 15,
        'active_callback'=> 'palawan_footer_mailchimp_enable',
    ));

    /*Title for mailchimp*/
    $wp_customize->add_setting('palawan_options[palawan-footer-mailchimp-form-title]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['palawan-footer-mailchimp-form-title'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('palawan_options[palawan-footer-mailchimp-form-title]', array(
        'label' => __('Mailchimp Section Title', 'palawan'),
        'description' => __('Enter the title of subscribe.', 'palawan'),
        'section' => 'palawan_footer_section',
        'settings' => 'palawan_options[palawan-footer-mailchimp-form-title]',
        'type' => 'text',
        'priority' => 15,
        'active_callback'=> 'palawan_footer_mailchimp_enable',
    ));


    /*subTitle for mailchimp*/
    $wp_customize->add_setting('palawan_options[palawan-footer-mailchimp-form-subtitle]', array(
        'capability' => 'edit_theme_options',
        'transport' => 'refresh',
        'default' => $default['palawan-footer-mailchimp-form-subtitle'],
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('palawan_options[palawan-footer-mailchimp-form-subtitle]', array(
        'label' => __('Mailchimp Section Sub Title', 'palawan'),
        'description' => __('Enter the sub title of subscribe.', 'palawan'),
        'section' => 'palawan_footer_section',
        'settings' => 'palawan_options[palawan-footer-mailchimp-form-subtitle]',
        'type' => 'text',
        'priority' => 15,
        'active_callback'=> 'palawan_footer_mailchimp_enable',
    ));
}