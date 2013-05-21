<?php get_header(); ?>

<div class="content">
    <header>

        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-annexe', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
                the_post();
                ?>
                <figure><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                </figure>
            <?php endwhile;
            endif;
            wp_reset_query(); ?>

        </div>
    </header>
    <section>
        <?php if (have_posts()) : while (have_posts()) :
            the_post(); ?>
            <header>
                <h2>
                    <?php the_title(); ?>
                </h2>
            </header>
            <div class="contentColonne">
                <h3 class="titleDisplay">Nos objectifs et notre méthodologie</h3>
                <?php the_content(); ?>
            </div>
            <figure>
                <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_imahge_alt)))); ?>
            </figure>
        <?php endwhile;
        endif; ?>
    </section>
<?php get_footer(); ?>