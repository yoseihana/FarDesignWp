<?php get_header(); ?>
<div class="content">
<header>
    <div class="slider">
        <?php
        query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-espace-membres', 'posts_per_page' => 1));
        if (have_posts()):while (have_posts()):
            the_post();
            ?>
            <figure><?php
                $thumb_id = get_post_thumbnail_id($post->ID);
                $thumb_title = get_the_title($thumb_id);
                the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>

            </figure>
        <?php endwhile;
        endif;
        wp_reset_query(); ?>
    </div>
</header>


<section>
    <?php
    if (is_user_logged_in()): ?>
    <header>
        <h2><?php the_title(); ?></h2>
    </header>
    <div class="introCours">
        <p>Tous les documents en relation avec les cours.</p>
    </div>
    <div class="contentColonne">
        <ol id="listingRoot">
            <?php
            $argsLevel = array(
                'orderby' => 'name',
                'parent' => 0,
                'type' => 'documents',
                'hide_empty' => 0,
                'taxonomy' => 'category_cours'
            );
            $catLevels = get_categories($argsLevel);
            foreach ($catLevels as $catLevel):

                ?>
                <li class="level">
                    <div>
                        <h3 id="<?php echo $catLevel->slug; ?>"><?php echo $catLevel->name; ?></h3>
                    </div>
                    <ol>
                        <?php
                        $argYear = array(
                            'orderby' => 'name',
                            'parent' => 0,
                            'type' => 'documents',
                            'hide_empty' => 0,
                            'taxonomy' => 'category_cours',
                            'child_of' => $catLevel->cat_ID,
                            'parent' => $catLevel->cat_ID,
                        );
                        $catYears = get_categories($argYear);
                        foreach ($catYears as $catYear):?>
                            <li class="year">
                                <div>
                                    <h4><?php echo $catYear->name; ?></h4>
                                    <!--[if lt IE 8]><span>+</span><![endif]-->
                                </div>
                                <ol>
                                    <?php
                                    $argSubject = array(
                                        'orderby' => 'name',
                                        'parent' => 0,
                                        'type' => 'documents',
                                        'hide_empty' => 0,
                                        'taxonomy' => 'category_cours',
                                        'child_of' => $catYear->cat_ID,
                                        'parent' => $catYear->cat_ID,
                                    );
                                    $catSubjects = get_categories($argSubject);
                                    foreach ($catSubjects as $catSubject):
                                        ?>
                                        <li class="subject">
                                            <div>
                                                <h5><?php echo $catSubject->name;
                                                    if ($catSubject->count >= 1)
                                                    {
                                                        echo '<em>' . $catSubject->count . '</em>';
                                                    } ?><!--[if lt IE 8]><span>+</span><![endif]--></h5>

                                            </div>
                                            <ul>
                                                <?php query_posts(array(
                                                    'post_type' => 'documents',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'category_cours',
                                                            'field' => 'slug',
                                                            'terms' => $catSubject->slug
                                                        )
                                                    )
                                                ));
                                                if (have_posts()):while (have_posts()):
                                                    the_post(); ?>

                                                    <li>
                                                        <p><?php $postIds = get_the_ID();

                                                            $argAttchment = array('post_type' => 'attachment', 'numberposts' => -1, 'post_status' => 'any', 'post_parent' => $postIds);
                                                            $attachments = get_posts($argAttchment);
                                                            if ($attachments): foreach ($attachments as $attachment):

                                                                $excerptDoc = get_the_excerpt();
                                                                $tags = array("<p>", "</p>");
                                                                $excerptDoc = str_replace($tags, "", $excerptDoc);
                                                                ?>
                                                                <a href="<?php echo wp_get_attachment_url($attachment->ID); ?>" title="<?php echo $excerptDoc; ?>">
                                                                    <?php
                                                                    $terms = wp_get_post_terms($postIds, 'category_type');
                                                                    $slug = $terms[0]->slug;

                                                                    if ($slug == 'cat-diapo')
                                                                    {
                                                                        ?>
                                                                        <span class="icon-docs"></span>

                                                                    <?php
                                                                    } elseif ($slug == 'cat-document')
                                                                    {
                                                                        ?>
                                                                       <span class="icon-doc-alt"></span>

                                                                    <?php
                                                                    } elseif ($slug == 'cat-image')
                                                                    {
                                                                        ?>
                                                                        <span class="icon-picture-1"></span>

                                                                    <?php
                                                                    } elseif ($slug == 'cat-tableur')
                                                                    {
                                                                        ?>
                                                                        <span class="icon-picture-2"></span>

                                                                    <?php
                                                                    } elseif ($slug == 'cat-url')
                                                                    {
                                                                        ?>
                                                                        <span class="icon-globe-inv"></span>

                                                                    <?php } ?>
                                                                    <p><?php the_title(); ?></p>
                                                                </a>


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

    <a id="logOut" href="<?php echo wp_logout_url('membres'); ?>" title="Logout">Se déconnecter</a>
</section>
<aside>
    <h2 class="titleDisplay">Racourcis des nouveaux et derniers cours ajoutés</h2>

    <div>
        <header>
            <span class="icon-list-numbered"></span>

            <h3>
                Les niveaux
            </h3>
        </header>
        <ol>
            <?php
            $argLevel = array(
                'orderby' => 'name',
                'parent' => 0,
                'type' => 'documents',
                'hide_empty' => 0,
                'taxonomy' => 'category_cours'
            );
            $levels = get_categories($argLevel);
            foreach ($levels as $level): ?>
                <li>
                    <a href="#<?php echo $level->slug; ?>" title="Vers le dossier: <?php echo $level->name; ?>"><?php echo $level->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div>
        <header>
            <span class="icon-list-add"></span>

            <h3>
                Derniers cours ajouter
            </h3>
        </header>
        <ol>
            <?php $argsLast = array(
                'numberposts' => 5,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'documents',
                'post_status' => 'publish',);

            $lastPosts = wp_get_recent_posts($argsLast);
            foreach ($lastPosts as $lastPost):
                ?>

                <li>
                    <?php
                    echo $lastPost['post_content']; ?> <br/> <em><?php echo mysql2date('d-m-Y', $lastPost['post_date']); ?></em>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
</aside>

<?php else: ?>
    <?php if (have_posts()):while (have_posts()):the_post(); ?>
        <header>
            <h2><?php the_title(); ?></h2>
        </header>

        <div>
            <h3 class="titleDisplay">Connexion</h3>
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
    <form method="post" action="<?php echo bloginfo('url'); ?>/wp-login.php" id="loginform" name="loginform">
        <fieldset>
            <!--[if lt IE 9]><legend>Se connecter</legend><![endif]-->
            <!--[if !IE]><!--><legend class="icon-user-1">Se connecter</legend><!--<![endif]-->

            <label for="user_login">Identifiant</label>

            <input type="text" tabindex="10" size="20" value="" id="user_login" name="log">

            <label for="user_pass">Mot de passe</label>

            <input type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
            <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit">

            <a href="<?php echo bloginfo('url'); ?>/contacts/">Mot de passe oublié? Contactez le secrétariat</a>

            <input type="hidden" value="<?php echo bloginfo('url'); ?>/membres/" name="redirect_to">
        </fieldset>
    </form>
    </section>
<?php
endif;
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/scriptFar.js" type="text/javascript"></script>
<?php get_footer() ?>