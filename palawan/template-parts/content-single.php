<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package palawan
 */
global $palawan_theme_options;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- for full single column card layout add [.card-full-width] class -->
    <div class="card card-blog-post card-full-width card-single-article">
        <div class="card_body">
            <div>
                <?php
                    palawan_list_category();
                ?>


                <?php
                    the_title('<h1 class="card_title">', '</h1>');
                ?>
                <?php

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                            palawan_posted_on();
                            palawan_posted_by();

                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </div>
            
            <?php
            if(has_post_thumbnail() && ($palawan_theme_options['palawan-single-page-featured-image'] == 1)) {
            ?>
            <figure class="card_media">
                    <?php palawan_post_thumbnail(); ?>
            </figure>
                <?php
            }
            ?>
        
            

            <div class="entry-content">
                <?php
                    the_content(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'palawan'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );

                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'palawan'),
                            'after' => '</div>',
                        )
                    );

                ?>
            </div>
            <?php
            $palawan_show_tags = $palawan_theme_options['palawan-single-page-tags'];
            if($palawan_show_tags == 1){
                palawan_meta_tags();
            }
            ?>


        </div>
    </div>
    <?php
    /**
     * palawan_related_posts hook
     * @since 1.0.0
     *
     * @hooked palawan_related_posts -  10
     */
    do_action('palawan_related_posts', get_the_ID());
    ?>
    <!-- Related Post Code Here -->

</article><!-- #post-<?php the_ID(); ?> -->
