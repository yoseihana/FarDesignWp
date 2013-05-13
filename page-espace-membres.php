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
                <label for="user_login">
                    Se connecter
                </label>
                <label for="id">
                    Identifiant
                </label>
                <input type="text" name="log" id="user_login" placeholder="Se connecter"/>
                <label for="user_pass">
                    Mot de passe
                </label>
                <input type="password" name="mdp" id="user_pass" name="pwd" placeholder="Mot de passe"/>
                <input type="submit"  id="wp-submit" name="wp-submit" value="Se connecter" name="connexion"/>
                <input type="hidden" value="http://www.NOM_DU_SITE.com/" name="redirect_to">
            </fieldset>
        </form>
    </section>
<?php get_footer(); ?>