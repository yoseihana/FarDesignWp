<?php get_header(); ?>

<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-liens', 'posts_per_page' => 1));
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


    <section class="sectionLink">

        <header>
            <h2>
                Nos sites associés
            </h2>
        </header>
        <?php
        query_posts(array('post_type' => 'links', 'category_link' => 'sites-associes', 'orderby' => 'menu_order', 'order' => 'ASC'));
        if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <div class="lien">
                <figure>
                    <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                </figure>
                <h3>
                    <?php the_title(); ?>
                </h3>

                <p class="url"><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>

                <p class="description">
                    <?php the_content(); ?>
                </p>
            </div>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </section>
    <section class="sectionLink autres">
        <header>
            <h2>
                Autres sites
            </h2>
        </header>
        <?php
        query_posts(array('post_type' => 'links', 'category_link' => 'autres-sites', 'orderby' => 'menu_order', 'order' => 'ASC'));
        if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <figure>
                <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
            </figure>
            <h3>
                <?php the_title(); ?>
            </h3>

            <p class="url"><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>

            <p class="description">
                <?php the_content(); ?>
            </p>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </section>
<?php get_footer(); ?>