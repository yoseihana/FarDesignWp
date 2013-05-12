<?php get_header(); ?>

<div class="content">
    <header>

        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-publications', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <fiigure><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>

                <figcaption>
                    <p><?php the_title(); ?></p>
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

        <div class="intro"><?php the_content(); ?></div>
    <?php
    query_posts(array('post_type' => 'publishing', 'orderby' => 'menu_order', 'order'=>'ASC'));
    if (have_posts()):while (have_posts()):
        the_post();
        ?>
        <div class="publication">
            <header>
                <h3><?php the_title(); ?></h3>
            </header>
            <p>
                <?php the_content(); ?></p>


                <figure>
                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>">
                        <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                        <figcaption><?php get_post_meta(get_the_ID(), 'link_title', true); ?></figcaption></a>
                </figure>
        </div>
    <?php endwhile;
    endif;
    wp_reset_query(); ?>
    </div>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>