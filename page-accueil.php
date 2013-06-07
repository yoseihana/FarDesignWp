<?php get_header(); ?>
<div class="content" data-role="content">

    <header class="banner">
        <h2 class="titleDisplay">Slider d'accueil</h2>
        <div id="slider-not-supported" class="sliderAccueil">
            <?php

            query_posts(array('post_type' => 'autre_image', 'category_image' => 'slider-accueil', 'posts_per_page'=>1, 'orderby'=>'menu_order', 'order'=>'ASC'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php echo get_the_post_thumbnail(); ?></a>

                    <figcaption class="infoBanner">
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                            <h3><?php the_title(); ?></h3>

                            <?php the_excerpt(); ?>
                        </a>
                    </figcaption>
                </figure>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>


        <div id="slider-supported" class="sliderAccueil">
            <?php

            query_posts(array('post_type' => 'autre_image', 'category_image' => 'slider-accueil', 'posts_per_page'=>6, 'orderby'=>'menu_order', 'order'=>'ASC'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                        <?php echo get_the_post_thumbnail(); ?>
                    </a>

                    <figcaption class="infoBanner">
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                            <h3><?php the_title(); ?></h3>

                            <?php the_excerpt(); ?>
                        </a>
                    </figcaption>
                </figure>
            <?php endwhile; endif;
            wp_reset_query(); ?>
            <p class="precedent">
                &lt;
            </p>

            <p class="pause">
                Pause
            </p>

            <p class="suivant">
                &gt;
            </p>
        </div>

    </header>

    <section id="main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="titleOutliner">
                <h2>La <?php bloginfo('description'); ?></h2>
            </header>
            <div>
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>

        <footer>
            <nav class="linkTo">
                <h2 class="titleDisplay">Navigation interne</h2>
                <ol>
                    <?php
                    query_posts(array('post_type' => 'autre_image', 'category_image' => 'navigation', 'posts_per_page'=>6, 'orderby'=>'menu_order'));
                    if (have_posts()):while (have_posts()):
                    the_post();
                    ?>
                    <li>
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
                            <figure>
                                <?php echo get_the_post_thumbnail(); ?>
                                <figcaption><?php echo the_title(); ?></figcaption>

                            </figure>

                        </a>
                    </li>
                    <?php endwhile;
                    endif; ?>
                </ol>
            </nav>
        </footer>

    </section>
    <!-- end #main -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/scriptFar.js" type="text/javascript"></script>
<?php get_footer(); ?>