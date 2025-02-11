<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package palawan
 */

get_header();
?>
    <main class="site-main">
        <section class="blog-list-section search-section sec-spacing">
            <div class="container">
                <?php
                $sidebar_options = esc_attr($palawan_theme_options['palawan-sidebar-blog-page']);
                $sidebar_class = '';
                if ($sidebar_options == 'left-sidebar') {
                    $sidebar_class = 'row-inverse-md';
                } elseif ($sidebar_options == 'no-sidebar') {
                    $sidebar_class = 'row-full-width';
                } elseif ($sidebar_options == 'middle-column') {
                    $sidebar_class = 'row-center-col';
                }
                ?>
                <div class="row <?php echo esc_attr($sidebar_class); ?>">
                    <div id="primary" class="col-1-1 col-md-2-3">
                        <?php if (have_posts()) : ?>

                            <div class="page-header">
                                <h1 class="page-title">
                                    <?php
                                    /* translators: %s: search query. */
                                    printf(esc_html__('Search Results for: %s', 'palawan'), '<span>' . get_search_query() . '</span>');
                                    ?>
                                </h1>
                            </div><!-- .page-header -->
                            <?php
                            $masonry_options = esc_attr($palawan_theme_options['palawan-blog-page-masonry-normal']);
                            $column_class = '';
                            if ($masonry_options == 'masonry') {
                                if ($sidebar_options == 'no-sidebar') {
                                    $column_class = 'palawan-three-column palawan-masonry';
                                } else {
                                    $column_class = 'palawan-two-column palawan-masonry';
                                }
                            }
                            ?>
                            <div class="palawan-content-area <?php echo esc_attr($column_class); ?>">
                                <?php
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();

                                    /**
                                     * Run the loop for the search to output the results.
                                     * If you want to overload this in a child theme then include a file
                                     * called content-search.php and that will be used instead.
                                     */
                                    get_template_part('template-parts/content', 'search');

                                endwhile;
                                ?>
                            </div>
                            <?php

                            /**
                             * palawan_action_navigation hook
                             * @since 1.0.0
                             *
                             * @hooked palawan_posts_navigation -  10
                             */
                            do_action('palawan_action_navigation');

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>
                    </div>
                    <?php
                    if (($sidebar_options == 'left-sidebar') || ($sidebar_options == 'right-sidebar')) {
                        ?>
                        <div id="secondary" class="col-12 col-md-1-3 col-lg-1-3">
                            <?php get_sidebar(); ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php

get_footer();
