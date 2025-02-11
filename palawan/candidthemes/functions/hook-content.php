<?php

if (!function_exists('palawan_posts_navigation')) {
    /**
     * Display pagination based on type seclected
     *
     * @since 1.0.0
     *
     */
    function palawan_posts_navigation()
    {
        global $palawan_theme_options;
        if ($palawan_theme_options['palawan-pagination-options'] == 'numeric') {
            the_posts_pagination();
        } elseif ($palawan_theme_options['palawan-pagination-options'] == 'ajax') {
            $page_number = get_query_var('paged');
            if ($page_number == 0) {
                $output_page = 2;
            } else {
                $output_page = $page_number + 1;
            }
            if (paginate_links()) {
                echo "<div class='ajax-pagination text-center'><div class='show-more' data-number='$output_page'><i class='fa fa-refresh'></i>" . __('Load More', 'palawan') . "</div><div id='free-temp-post'></div></div>";
            }
        } else {
            the_posts_navigation();
        }
    }
}
add_action('palawan_action_navigation', 'palawan_posts_navigation', 10);


if (!function_exists('palawan_related_post')) :
    /**
     * Display related posts from same category
     *
     * @param int $post_id
     * @return void
     *
     * @since 1.0.0
     *
     */
    function palawan_related_post($post_id)
    {

        global $palawan_theme_options;
        if ($palawan_theme_options['palawan-single-page-related-posts'] == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-post">
                    <?php
                    $palawan_related_post_title = esc_html($palawan_theme_options['palawan-single-page-related-posts-title']);
                    if (!empty($palawan_related_post_title)) :
                    ?>
                        <h2 class="post-title"><?php echo esc_html($palawan_related_post_title); ?></h2>
                    <?php
                    endif;

                    $palawan_cat_post_args = array(
                        'category__in' => $category_ids,
                        'post__not_in' => array($post_id),
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $palawan_featured_query = new WP_Query($palawan_cat_post_args);
                    ?>
                    <div class="row">
                        <?php
                        if ($palawan_featured_query->have_posts()) :

                            while ($palawan_featured_query->have_posts()) : $palawan_featured_query->the_post();
                        ?>
                                <div class="col-1-1 col-sm-1-2 col-md-1-2">
                                    <div class="card card-blog-post card-full-width">
                                        <?php
                                        if (has_post_thumbnail()) :
                                        ?>
                                            <figure class="card_media">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_post_thumbnail('palawan-medium'); ?>
                                                </a>
                                            </figure>
                                        <?php
                                        endif;
                                        ?>
                                        <div class="card_body">
                                            <?php palawan_list_category(); ?>
                                            <h4 class="card_title">
                                                <a href="<?php the_permalink() ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h4>
                                            <div class="entry-meta">
                                                <?php
                                                palawan_posted_on();
                                                palawan_posted_by();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            endwhile;
                            ?>
                    </div>

                <?php
                        endif;
                        wp_reset_postdata();
                ?>
                </div> <!-- .related-post -->
            <?php
            }
        }
    }
endif;
add_action('palawan_related_posts', 'palawan_related_post', 10, 1);


if (!function_exists('palawan_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function palawan_constuct_carousel()
    {

        if (is_front_page()) {
            global $palawan_theme_options;
            if ($palawan_theme_options['palawan-enable-slider'] != 1)
                return false;
            $featured_cat = absint($palawan_theme_options['palawan-select-category']);
            $palawan_slider_args = array();
            if (is_rtl()) {
                $palawan_slider_args['rtl'] = true;
            }
            $palawan_slider_args_encoded = wp_json_encode($palawan_slider_args);
            $query_args = array(
                'post_type' => 'post',
                'ignore_sticky_posts' => true,
                'posts_per_page' => 6,
                'cat' => $featured_cat
            );

            $query = new WP_Query($query_args);
            if ($query->have_posts()) :
            ?>
                <section class="hero hero-slider-section">
                    <div class="container">
                        <!-- slick slider component start -->
                        <div class="hero_slick-slider" data-slick='<?php echo $palawan_slider_args_encoded; ?>'>
                            <?php
                            $i = 1;
                            while ($query->have_posts()) :
                                $query->the_post();

                            ?>
                                <div class="card card-bg-image">
                                    <?php
                                    if (has_post_thumbnail()) {
                                    ?>
                                        <div class="post-thumb">
                                            <figure class="card_media">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php
                                                    $cropped_image = $palawan_theme_options['palawan-image-size-slider'];
                                                    if ($cropped_image == 'cropped-image') {
                                                        the_post_thumbnail('palawan-large');
                                                    } else {
                                                        the_post_thumbnail();
                                                    }
                                                    ?>
                                                </a>
                                            </figure>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="post-thumb">
                                            <a href="<?php the_permalink(); ?>">

                                                <img src="<?php echo esc_url(get_template_directory_uri()) . '/candidthemes/assets/custom/img/palawan-default.jpg' ?>" alt="<?php the_title(); ?>">

                                            </a>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <article class="card_body">
                                        <?php
                                        palawan_list_category();
                                        ?>

                                        <h3 class="card_title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>

                                        <div class="entry-meta">
                                            <?php
                                            palawan_posted_on();
                                            palawan_posted_by();
                                            ?>
                                        </div>
                                    </article>

                                </div>
                            <?php
                                $i++;

                            endwhile;
                            ?>
                        </div>
                    </div>
                </section><!-- .hero -->
            <?php
            endif;
            wp_reset_postdata();
        } //is_front_page
    }
}
add_action('palawan_carousel', 'palawan_constuct_carousel', 10);


if (!function_exists('palawan_breadcrumb_options')) :
    /**
     * Functions to manage breadcrumbs
     */
    function palawan_breadcrumb_options()
    {
        global $palawan_theme_options;
        if (($palawan_theme_options['palawan-blog-site-breadcrumb'] == 1) && !is_front_page()) {
            $breadcrumb_from = $palawan_theme_options['palawan-breadcrumb-display-from-option'];

            if ((function_exists('yoast_breadcrumb')) && ($breadcrumb_from == 'yoast-breadcrumb')) {
            ?>
                <div class="palawan-breadcrumb-wrapper">
                    <?php
                    yoast_breadcrumb();
                    ?>
                </div>
            <?php
            } elseif ((function_exists('rank_math_the_breadcrumbs')) && ($breadcrumb_from == 'rankmath-breadcrumb')) {
            ?>
                <div class="palawan-breadcrumb-wrapper">
                    <?php
                    rank_math_the_breadcrumbs();
                    ?>
                </div>
            <?php
            } elseif ((function_exists('bcn_display')) && ($breadcrumb_from == 'breadcrumb-navxt')) {
            ?>
                <div class="palawan-breadcrumb-wrapper">
                    <?php
                    bcn_display();
                    ?>
                </div>
            <?php
            } else {
            ?>
                <div class="palawan-breadcrumb-wrapper">
                    <?php
                    palawan_breadcrumbs();
                    ?>
                </div>
<?php
            }
        }
    }
endif;
add_action('palawan_breadcrumb', 'palawan_breadcrumb_options', 10);


/**
 * BreadCrumb Settings
 */
if (!function_exists('palawan_breadcrumbs')) :
    function palawan_breadcrumbs()
    {
        $breadcrumb_args = array(
            'container' => 'div',
            'show_browse' => false
        );
        global $palawan_theme_options;

        $palawan_you_are_here_text = esc_html($palawan_theme_options['palawan-breadcrumb-text']);


        if (!empty($palawan_you_are_here_text)) {
            $palawan_you_are_here_text = "<span class='breadcrumb'>" . $palawan_you_are_here_text . "</span>";
        }
        echo "<div class='breadcrumbs init-animate clearfix'>" . $palawan_you_are_here_text . "<div id='palawan-breadcrumbs' class='clearfix'>";
        breadcrumb_trail($breadcrumb_args);
        echo "</div></div>";
    }
endif;
