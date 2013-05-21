<?php get_header(); ?>

<div class="content">
    <header>

        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-archives', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <figure><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                <?php endwhile;
                endif;
                wp_reset_query(); ?>
        </div>
    </header>
    <section class="contentColonne">
        <header class="titleOutliner">
            <h2>Nos archives</h2>
        </header>
        <?php

        $myPosts = new WP_Query();
        $myPosts->query('showposts=10');

        while ($myPosts->have_posts()) : $myPosts->the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                <div class="entry-content page">
                    <header class="article-header">
                        <h3><?php the_title(); ?></h3>
                        <span="category-title">Catégories: <?php the_category(', '); ?></span>
                    </header>
                    <figure class="image"><?php the_post_thumbnail('medium'); ?></figure>
                    <div><?php the_content(); ?></div>
                    <!-- end article section -->

                    <?php if (has_tag(the_post())): ?>
                        <footer class="article-footer">

                            <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>

                        </footer>
                    <?php endif; ?>
                    <!-- end article footer -->
                </div>

            </article> <!-- end article -->
        <?php endwhile; ?>
        <footer>
            <div class="alignleft"><?php previous_posts_link('&laquo; Page précédente') ?></div>
            <div class="alignright"><?php next_posts_link('Page suivante &raquo;', '') ?></div>
        </footer>
    </section>
<?php get_sidebar('archives'); ?>
<?php get_footer(); ?>