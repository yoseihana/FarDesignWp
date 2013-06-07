<?php get_header(); ?>
    <div class="content" data-role="content">
        <header>
            <div class="slider">
                <?php
                query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-archives', 'posts_per_page' => 1));
                if (have_posts()):while (have_posts()):
                    the_post();
                    ?>
                    <figure><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></figure>
                <?php endwhile;
                endif;
                wp_reset_query(); ?>
            </div>
        </header>
        <section class="contentColonne">
            <?php if (is_category())
            {
                ?>
                <header>
                    <h2 class="archive-title h2">
                        Archives <?php single_cat_title(); ?>
                    </h2>
                </header>
            <?php
            } elseif (is_year())
            {
                ?>
                <header>
                    <h2 class="archive-title h2">
                        Archives <?php the_time('Y'); ?>
                    </h2>
                </header>
            <?php } ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

                    <div class="entry-content page">
                        <header class="posted article-header">
                            <h3><?php the_title(); ?></h3>

                            <p class="category">Catégories: <?php the_category(', '); ?></p>
                        </header>
                        <!-- end article header -->

                        <figure class="image"><?php the_post_thumbnail('medium'); ?></figure>

                        <div><?php the_content(); ?></div>

                        <!-- end article section -->

                        <footer class="article-footer">
                            <p class="tags"><?php the_tags('<span class="tags-title">Tags:</span> ', ', ', ''); ?></p>
                        </footer>
                        <!-- end article footer -->
                    </div>
                </article> <!-- end article -->

            <?php endwhile; ?>

            <?php else : ?>

                <article id="post-not-found" class="hentry clearfix">
                    <header class="article-header">
                        <h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e("This is the error message in the archive.php template.", "bonestheme"); ?></p>
                    </footer>
                </article>

            <?php endif; ?>


        </section>
        <!-- end #main -->
        <?php get_sidebar('archives'); ?>
    </div> <!-- end #content -->

<?php get_footer(); ?>