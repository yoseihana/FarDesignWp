<?php get_header(); ?>
<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-espace-membres', 'posts_per_page' => 1));
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
                <ol>
                    <?php
                    $args = array(
                        'orderby' => 'name',
                        'parent' => 0,
                        'type' => 'documents',
                        'hide_empty' => 0,
                        'taxonomy' => 'category_cours'
                    );
                    $categories = get_categories($args);
                    foreach ($categories as $category):
                        //var_dump(get_category_link($category)); renvoie le lien de la catégorie
                        ?>
                        <li class="niveau">
                            <div>
                                <p><?php echo $category->name; ?>
                            </div>
                            <ol>
                                <?php
                                $arg2 = array(
                                    'orderby' => 'name',
                                    'parent' => 0,
                                    'type' => 'documents',
                                    'hide_empty' => 0,
                                    'taxonomy' => 'category_cours',
                                    'child_of' => $category->cat_ID,
                                    'parent' => $category->cat_ID,
                                );
                                $categories2 = get_categories($arg2);
                                foreach ($categories2 as $category2):?>
                                    <li class="year">
                                        <div>
                                            <p><?php echo $category2->name; ?></p>
                                        </div>
                                        <ol>
                                            <?php
                                            $arg3 = array(
                                                'orderby' => 'name',
                                                'parent' => 0,
                                                'type' => 'documents',
                                                'hide_empty' => 0,
                                                'taxonomy' => 'category_cours',
                                                'child_of' => $category2->cat_ID,
                                                'parent' => $category2->cat_ID,
                                            );
                                            $categories3 = get_categories($arg3);
                                            foreach ($categories3 as $category3):?>
                                                <li class="thematique">
                                                    <div>
                                                        <p><?php echo $category3->name; ?></p>
                                                    </div>
                                                    <ul>
                                                        <?php query_posts(array(
                                                            'post_type' => 'documents',
                                                            'tax_query' => array(
                                                                array(
                                                                    'taxonomy' => 'category_cours',
                                                                    'field' => 'slug',
                                                                    'terms' => $category3->slug
                                                                )
                                                            )
                                                        ));
                                                        if (have_posts()):while (have_posts()):
                                                            the_post(); ?>

                                                            <li>
                                                                <p><?php $postIds = get_the_ID();

                                                                    $args = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $postIds);
                                                                    $attachments = get_posts($args);
                                                                    if ($attachments): foreach ($attachments as $attachment): ?>

                                                                        <a href="<?php echo wp_get_attachment_url($attachment->ID); ?>" title="<?php the_excerpt(); ?>"><?php the_title(); ?></a>


                                                                    <?php endforeach;
                                                                    endif ?></p>

                                                            </li>
                                                        <?php endwhile; endif; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </li>
                                <?php endforeach; ?>
                            </ol>
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
        endif;
        ?>
    </section>
<?php get_footer() ?>