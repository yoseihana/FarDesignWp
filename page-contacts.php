<?php get_header(); ?>
<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-contact', 'posts_per_page' => 1));
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
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <header>
                <h2><?php the_title(); ?></h2>
            </header>
            <div class="sectionContent">
                <h3 style="display: none;">Nous contacter via le formulaire</h3>
                <form action="<?php bloginfo('template_directory'); ?>/form.php" method="post">
                    <fieldset>
                        <?php the_content(); ?>
                    </fieldset>
                </form>
            </div>
        <?php endwhile; endif; ?>
        <div class="contactEquipe">
            <header>
                <h2>
                    Contacter les membres de l'équipe
                </h2>
            </header>
            <?php
            query_posts(array('post_type' => 'equipe', 'orderby' => 'menu_order', 'order' => 'ASC'));
            if (have_posts()):while (have_posts()):
                the_post();
                ?>
                <div>
                    <h3><?php the_title(); ?></h3>
                    <figure><?php the_post_thumbnail('thumbnail', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></figure>
                    <p class="poste"><?php echo get_post_meta(get_the_ID(), 'poste_equipe', true); ?></p>

                    <p class="email"><?php echo get_post_meta(get_the_ID(), 'contact_email1', true); ?></p>

                    <p class="email"><?php echo get_post_meta(get_the_ID(), 'contact_email2', true); ?></p>

                </div>
            <?php endwhile;
            endif;
            wp_reset_query(); ?>
    </section>
    <aside>
        <?php
        query_posts(array('post_type' => 'contact', 'category_contact' => 'page-contact', 'posts_per_page' => 1));
        if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <header>
                <h2 style="display: none;">Nos coordonnées</h2>
                <span class="icon-mail"></span>

                <h3><?php the_title(); ?></h3>
            </header>
            <p><?php echo get_post_meta(get_the_ID(), 'contact_title', true); ?><p>

            <p><?php echo get_post_meta(get_the_ID(), 'contact_street', true) . ' ' . get_post_meta(get_the_ID(), 'contact_number', true); ?></p>

            <p><?php echo get_post_meta(get_the_ID(), 'contact_cp', true) . ' ' . get_post_meta(get_the_ID(), 'contact_town', true); ?></p>
            <dl>
                <dt>Téléphone</dt>
                <dd><?php echo get_post_meta(get_the_ID(), 'contact_phone', true); ?></dd>
                <dt>Fax</dt>
                <dd><?php echo get_post_meta(get_the_ID(), 'contact_fax', true); ?></dd>
                <dt>Email</dt>
                <dd><?php echo get_post_meta(get_the_ID(), 'contact_email1', true); ?></dd>
            </dl>
        <?php endwhile; endif;
        wp_reset_query(); ?>
        <form action="#" method="post">
            <fieldset>
                <label for="newsletter">S'inscrire à notre newsletter</label>
                <input type="email" placeholder="Votre email" id="newsletter"/>
                <input type="submit" value="S'inscrire" name="S'inscrire"/>
            </fieldset>
        </form>
    </aside>
<?php get_footer(); ?>