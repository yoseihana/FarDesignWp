<?php
/*
 * Template Name: Formulaire de connexion
 */

?>
<?php get_header(); ?>
<div class="container">
    <div class="content">
    <header>
        <div class="slider">
            <div class="slider">
                <?php
                query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-espace-membres', 'posts_per_page' => 1));
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
        </div>
    </header>


    <section>
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <header>
                <h1><?php the_title() ?></h1>
            </header>


            <div>
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
        <form action="http://farwp.buffart.eu/wp-login.php" method="post">
            <fieldset>
                <legend>
                    Se connecter
                </legend>
                <label for="user_login">Identifiant</label>

                <input type="text" tabindex="10" size="20" value="" id="user_login" name="log">
                <label for="user_pass">Mot de passe</label>

                <input type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
                <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit">

                <input type="hidden" value="http://farwp.buffart.eu/cours" name="redirect_to">
            </fieldset>
        </form>
    </section>
<?php get_footer(); ?>