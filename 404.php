<?php get_header(); ?>

<div class="content" data-role="content">
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
            <header>
                <h2>
                    Oups pas le bon endroit
                </h2>
            </header>
            <div>
                <h3 class="titleDisplay">Erreur 404</h3>
                <p>La page que vous désirez avoir n'existe pas. N'hésitez pas à naviger dans notre menu pour retrouver votre chemin. Vous pouvez <a href="<?php echo bloginfo('siteurl') ?>" title="Retourner sur la page d'acceuil">retourner sur la page d'acceuil par ce lien</a></p>
            </div>
    </section>
<?php get_footer(); ?>