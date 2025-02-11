<?php

if ( ! function_exists( 'palawan_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function palawan_load_widgets() {

        // Author Widget.
        register_widget( 'palawan_Author_Widget' );
		
		// Social Widget.
        register_widget( 'palawan_Social_Widget' );

        // Recent Posts Widget.
        register_widget( 'palawan_Recent_Post' );

    }

endif;
add_action( 'widgets_init', 'palawan_load_widgets' );