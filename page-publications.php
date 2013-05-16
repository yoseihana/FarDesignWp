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

                    if($slug == 'cat-video'){ ?>
                        <h3 class="icon-videocam"><?php the_title(); ?></h3>

                    <?php }elseif($slug == 'cat-blog'){ ?>
                        <h3 class="icon-edit"><?php the_title(); ?></h3>

                     <?php }elseif($slug == 'cat-journal'){ ?>
                        <h3 class="icon-book-open"><?php the_title(); ?></h3>

                    <?php }elseif($slug == 'cat-documentation'){ ?>
                        <h3 class="icon-edit"><?php the_title(); ?></h3>

                    <?php } ?>
                </header>
                <p>
                    <?php the_content(); ?>
                </p>

                <p>

                </p>
                <figure>
                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
                        <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                        <figcaption><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></figcaption>
                    </a>
                </figure>
            </div>
        <?php endwhile;
        endif;
        wp_reset_query(); ?>
    </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>