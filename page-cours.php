<?php get_header(); ?>
<?php if (have_posts()):while (have_posts()):the_post(); ?>
    <header>

        <h2>
            <?php the_title(); ?>
        </h2>

    </header>
    <p><?php the_content(); ?></p>
<?php endwhile; endif; ?>
<?php get_footer() ?>