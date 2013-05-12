<?php get_header(); ?>
<div id="content">

    <header>
        <!--<h1 class="noDisplay" style="display: none">A propos de la FAR</h1>-->

        <div class="slider">
            <?php

            query_posts(array('post_type' => 'autre_image', 'category_image' => 'slider-accueil', 'posts_per_page'=>6, 'orderby'=>'menu_order'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>

                    <figcaption class="infoSlider">
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

<?php get_footer(); ?>