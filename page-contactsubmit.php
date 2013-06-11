<?php get_header(); ?>
<div class="content" data-role="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-contact', 'posts_per_page' => 1));
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
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <header>
                <h2><?php the_title(); ?></h2>
            </header>
            <div class="contentColonne">
                <h3 class="titleDisplay">Nous contacter via le formulaire</h3>

                <form action="<?php bloginfo('template_directory'); ?>/form.php" method="post" id="contactForm">
                    <fieldset>
                        <?php the_content(); ?>
                    </fieldset>
                </form>
            </div>
        <?php endwhile; endif; ?>
    </section>
    <aside>
        <div>
            <?php
            query_posts(array('post_type' => 'contact', 'category_contact' => 'page-contact', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
                the_post();
                ?>
                <header>
                    <h2 class="titleDisplay">Nos coordonnées</h2>
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
        </div>
        <div>
            <header class="opening">
                <h2 class="titleDisplay">Horaire du centre de documentation et des archives</h2>
                <span class="icon-clock"></span>
            </header>
            <?php
            query_posts(array('post_type' => 'horaire', 'category_horaire' => 'cat-page-contact', 'orderby' => 'name'));
            if (have_posts()):while (have_posts()):
                the_post();
                ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_day', true); ?></p>

                <p><?php echo get_post_meta(get_the_ID(), 'horaire_hour', true) ?></p>

                <p><?php echo get_post_meta(get_the_ID(), 'horaire_close', true) ?></p>

            <?php endwhile;
            endif;
            wp_reset_query(); ?>
        </div>
        <script type="text/javascript" src="http://signup.ymlp.com/signup.js?id=gbeeqwbgmgj"></script>
    </aside>
    <div class="contactEquipe">
        <header>
            <h2>
                Contacter les membres de l'équipe
            </h2>
        </header>
        <ul data-role="listview" data-inset="true" data-split-theme="d">
            <?php
            query_posts(array('post_type' => 'equipe', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => 20));
            if (have_posts()):while (have_posts()):
                the_post();
                ?>
                <li class="lien">
                    <h3><?php the_title(); ?></h3>
                    <figure><?php the_post_thumbnail('thumbnail', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></figure>
                    <p class="poste"><?php echo get_post_meta(get_the_ID(), 'poste_equipe', true); ?></p>
                    <h4>Email(s)</h4>

                    <p class="email"><?php echo get_post_meta(get_the_ID(), 'contact_email1', true); ?></p>

                    <p class="email"><?php echo get_post_meta(get_the_ID(), 'contact_email2', true); ?></p>

                </li>
            <?php endwhile;
            endif;
            wp_reset_query(); ?>
        </ul>

    </div>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/scriptFar.js" type="text/javascript"></script>
<?php get_footer(); ?>