<?php get_header(); ?>

<div class="content">
    <header>

        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-publications', 'posts_per_page' => 1));
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
    <div>

        <div class="intro"><?php the_content(); ?></div>
        <?php
        query_posts(array('post_type' => 'publishing', 'orderby' => 'menu_order', 'order' => 'ASC'));
        if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <div class="publication">
                <header>
                    <?php $id_post = get_the_ID();
                    $terms = wp_get_post_terms($id_post, 'category_publication');
                    $slug = $terms[0]->slug;

                    if ($slug == 'cat-video')
                    {
                        ?>
                        <span class="icon-videocam"></span>

                    <?php
                    } elseif ($slug == 'cat-blog')
                    {
                        ?>
                        <span class="icon-edit"></span>

                    <?php
                    } elseif ($slug == 'cat-journal')
                    {
                        ?>
                        <span class="icon-book-open"></span>

                    <?php
                    } elseif ($slug == 'cat-documentation')
                    {
                        ?>
                        <span class="icon-folder-open"></span>

                    <?php } ?>
                    <h3><?php the_title(); ?></h3>
                </header>
                <div>
                    <?php the_content(); ?>
                </div>
                <?php
                if (has_post_thumbnail(get_the_ID())): ?>
                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
                        <figure>
                            <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                            <figcaption><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></figcaption>
                        </figure>
                    </a>
                <?php else: ?>
                <p class="linkPubli">
                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a>
                </p>
                <?php endif; ?>
            </div>
        <?php endwhile;
        endif;
        wp_reset_query(); ?>
    </div>
    </section>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>