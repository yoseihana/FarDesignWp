<?php get_header(); ?>

<div class="content">
    <header>

        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-expertises', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <fiigure><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>

                <figcaption>
                    <h3><?php the_title(); ?></h3>
                </figcaption>
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
        <?php the_content(); ?>
    </div>
    <figure>
        <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_imahge_alt)))); ?>
    </figure>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>