<?php get_header(); ?>
<div class="content">

    <header>
        <div id="slider-not-supported" class="sliderAccueil">
            <h2 class="noDisplay" style="display: none">Slider d'accueil</h2>

            <?php

            query_posts(array('post_type' => 'autre_image', 'category_image' => 'slider-accueil', 'posts_per_page'=>1, 'orderby'=>'menu_order', 'order'=>'ASC'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>

                    <figcaption class="infoBanner">
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                            <h3><?php the_title(); ?></h3>

                            <p><?php the_excerpt(); ?></p>
                        </a>
                    </figcaption>
                </figure>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>


        <div id="slider-supported" class="sliderAccueil">
            <h2 class="noDisplay" style="display: none">Slider d'accueil</h2>

            <?php

            query_posts(array('post_type' => 'autre_image', 'category_image' => 'slider-accueil', 'posts_per_page'=>6, 'orderby'=>'menu_order', 'order'=>'ASC'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>

                    <figcaption class="infoBanner">
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                            <h3><?php the_title(); ?></h3>

                            <p><?php the_excerpt(); ?></p>
                        </a>
                    </figcaption>
                    <p class="precedent">
                        <
                    </p>

                    <p class="suivant">
                        >
                    </p>


                </figure>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>

    </header>

    <section id="main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <header class="titleOutliner">
                <h2>La <?php bloginfo('description'); ?></h2>
            </header>
            <p>
                <?php the_content(); ?>
            </p>
        <?php endwhile; endif; ?>

        <footer>
            <nav class="linkTo">
                <h2 class="noDisplay" style="display: none">Navigation interne</h2>
                <ol>
                    <?php
                    query_posts(array('post_type' => 'autre_image', 'category_image' => 'navigation', 'posts_per_page'=>6, 'orderby'=>'menu_order'));
                    if (have_posts()):while (have_posts()):
                    the_post();
                    ?>
                    <li>
                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                            <figure>
                                <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>

                            </figure>
                            <figcaption><?php echo the_title(); ?></figcaption>
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