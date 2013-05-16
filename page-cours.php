<?php get_header(); ?>
<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-cours', 'posts_per_page' => 1));
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
        <?php
        if (is_user_logged_in()): if (have_posts()):while (have_posts()):
            the_post(); ?>
            <header>
                <h2>Espace membre</h2>
            </header>
        <?php endwhile;
        endif; ?>
            <p>Tous les documents en relation avec les cours.</p>
            <div class="contentColonne">

                <ol id="formation">
                    <?php $level_terms = get_terms("category_cours", array("orderby" => "slug", "parent" => 0, 'hide_empty' => 0, 'order' => 'ASC')); ?>
                    <?php foreach ($level_terms as $key => $level_term) : ?>
                        <li class="niveau">
                            <div>
                                <h3><?php echo $level_term->name; ?></h3>
                            </div>
                            <ul>
                                <?php $args = array(
                                    'child_of' => $level_term->term_id,
                                    'taxonomy' => $level_term->taxonomy,
                                    'hide_empty' => 0,
                                    'hierarchical' => false,
                                    'depth' => 0,
                                );

                                $year_terms = get_categories($args);

                                foreach ($year_terms as $year_term):
                                    ?>

                                    <li class="year">
                                        <div>
                                            <?php
                                            $year_parent = $year_term->parent;

                                            $level_id = $level_term->term_id;

                                            if ($year_parent == $level_id):?>
                                            <h4><?php echo $year_term->name; ?></h4>

                                        </div>
                                        <? else: ?>
                                            <ul>
                                                <li class="thematique">
                                                    <div>
                                                        <h5><?php echo $year_term->name; ?></h5>
                                                    </div>
                                                    <ul>
                                                        <?php $args = array(
                                                            'post_type' => 'documents', /* This is where you should put your Post Type */
                                                            'tax_query' => array(
                                                                array(
                                                                    'taxonomy' => 'category_cours',
                                                                    'field' => 'slug',
                                                                    'terms' => $year_term->name,
                                                                    ''
                                                                )
                                                            )
                                                        );
                                                        $query = new WP_Query($args);?>

                                                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                                            <li>
                                                                <p><?php the_title(); ?></p>

                                                            </li>
                                                        <?php endwhile; endif;
                                                        wp_reset_query(); ?>
                                                    </ul>
                                                </li>
                                            </ul>
                                        <?
                                        endif ?>
                                    </li>
                                <?php endforeach;
                                ?>
                            </ul>

                        </li>
                    <?php endforeach; ?>
                </ol>

            </div>

            <a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">Logout</a>
        <?php else: ?>
            <?php if (have_posts()):while (have_posts()):the_post(); ?>
                <header>
                    <h2><?php the_title(); ?></h2>
                </header>

                <div>
                    <h3 style="display:none;">Connexion</h3>
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            <form method="post" action="http://farwp.buffart.eu/wp-login.php" id="loginform" name="loginform">

                <label for="user_login">Identifiant</label>

                <input type="text" tabindex="10" size="20" value="" id="user_login" name="log">

                <label for="user_pass">Mot de passe</label>

                <input type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
                <label><input type="checkbox" tabindex="90" value="forever" id="rememberme" name="rememberme">Rester connecter</label>

                <!-- Voir ce qu'on fait dans ce cas-ci <a href="http://www.NOM_DU_SITE.com/wp-login.php?action=lostpassword">Mot de passe oublié</a>-->
                <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit">

                <input type="hidden" value="http://farwp.buffart.eu/cours/" name="redirect_to">
            </form>
        <?php
        endif; ?>
    </section>
<?php get_footer() ?>