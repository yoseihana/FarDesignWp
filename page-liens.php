<?php get_header(); ?>

<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-liens', 'posts_per_page' => 1));
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
        <?php
        $argCategories = array(
            'orderby' => 'ID',
            'parent' => 0,
            'type' => 'links',
            'hide_empty' => 0,
            'taxonomy' => 'category_link',
        );
        $categories = get_categories($argCategories);
        foreach ($categories as $category):
            if ($category->slug == 'sites-associes'):
                ?>
                <div class="farSites">
                    <header>
                        <h2>
                            <?php echo $category->name; ?> de la FAR
                        </h2>
                    </header>
                <?php
                query_posts(array('post_type' => 'links', 'category_link' => 'sites-associes', 'orderby' => 'menu_order', 'order' => 'ASC'));
                if (have_posts()):while (have_posts()):
                    the_post();
                    ?>
                    <div class="lien">
                        <figure>
                            <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>
                        </figure>
                        <h3>
                            <?php the_title(); ?>
                        </h3>

                        <p class="url"><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>

                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; endif;
                wp_reset_query(); ?>
                </div>
             <?php elseif($category->slug == 'autres-sites'): ?>
                <div class="othersSites">
                    <header>
                        <h2>
                            <?php echo $category->name; ?> que la FAR
                        </h2>
                    </header>
                    <?php
                    query_posts(array('post_type' => 'links', 'category_link' => 'autres-sites', 'orderby' => 'menu_order', 'order' => 'ASC'));
                    if (have_posts()):while (have_posts()):
                        the_post();
                        ?>
                        <figure>
                            <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>
                        </figure>
                        <h3>
                            <?php the_title(); ?>
                        </h3>

                        <p class="url"><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>

                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif;
                    wp_reset_query(); ?>
                </div>

            <?php endif; endforeach; ?>

    </section>
<?php get_footer(); ?>