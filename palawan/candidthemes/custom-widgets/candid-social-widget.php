<?php
/**
 * Palawan Social Icons menu widget
 *
 * @since 1.0.0
 */

if (!class_exists('palawan_Social_Widget')) :

    /**
     * Social widget class.
     */
    class palawan_Social_Widget extends WP_Widget
    {
         private function defaults()
        {
            $defaults = array(
                'title'    => esc_html__( 'Follow Us', 'palawan' ),
            );
            return $defaults;
        }

        /**
         * Constructor.
         */
        public function __construct()
        {
            $opts = array(
                'classname' => 'palawan-menu-social',
                'description' => esc_html__('Social Menu Widget', 'palawan'),
            );
            parent::__construct('palawan-social-icons', esc_html__('Palawan Social Icons', 'palawan'), $opts);
        }

        /**
         * Echo the widget content.
         */
        public function widget($args, $instance)
        {
            $instance = wp_parse_args( (array) $instance, $this->defaults() );

            $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            echo $args['before_widget'];

            if (!empty($title)) {
                echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
            }

            if (has_nav_menu('social-menu')) {
                wp_nav_menu(array('theme_location' => 'social-menu', 'menu_class' => 'social-menu'));
            }

            echo $args['after_widget'];

        }

        /**
         * Update widget instance.
         */
        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;

            $instance['title'] = sanitize_text_field($new_instance['title']);

            return $instance;
        }

        /**
         * Output the settings update form.
         */
        public function form($instance)
        {
            $instance  = wp_parse_args( (array )$instance, $this->defaults() );
            $title    = esc_attr($instance['title']);
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'palawan'); ?></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                       name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                       value="<?php echo esc_attr($instance['title']); ?>"/>
            </p>

            <?php if (!has_nav_menu('social-menu')) : ?>
            <p>
                <?php esc_html_e('Please create menu and assign it.', 'palawan'); ?>
            </p>
        <?php endif; ?>
        <?php
        }
    }

endif;