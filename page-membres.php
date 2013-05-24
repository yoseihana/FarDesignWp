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
                                                    } ?></h5>
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
                                                                        <!--[if lt IE 9]><img class="imageIE" src="http://farwp.buffart.eu/wp-content/uploads/2013/05/1362949328_gnome-mime-application-vnd.ms-powerpoint.png"/><![endif]-->
                                                                        <!--[if !IE]><!--><span class="icon-docs"></span><!--<![endif]-->

                                                                    <?php
                                                                    } elseif ($slug == 'cat-document')
                                                                    {
                                                                        ?>
                                                                        <!--[if lt IE 9]> <img class="imageIE" src="http://farwp.buffart.eu/wp-content/uploads/2013/05/1362949312_Files-Word.png"/><![endif]-->
                                                                        <!--[if !IE]><!--><span class="icon-doc-alt"></span><!--<![endif]-->

                                                                    <?php
                                                                    } elseif ($slug == 'cat-image')
                                                                    {
                                                                        ?>
                                                                        <!--[if lt IE 9]><img class="imageIE" src="http://farwp.buffart.eu/wp-content/uploads/2013/05/1362949390_style.png"/><![endif]-->
                                                                        <!--[if !IE]><!--><span class="icon-picture-1"></span><!--<![endif]-->

                                                                    <?php
                                                                    } elseif ($slug == 'cat-tableur')
                                                                    {
                                                                        ?>
                                                                        <!--[if lt IE 9]> <img class="imageIE" src="http://farwp.buffart.eu/wp-content/uploads/2013/05/1369311254_application-vnd.ms-excel.png"/> <![endif]-->
                                                                        <!--[if !IE]><!--><span class="icon-picture-2"></span><!--<![endif]-->

                                                                    <?php
                                                                    } elseif ($slug == 'cat-url')
                                                                    {
                                                                        ?>
                                                                        <!--[if lt IE 9]> <img class="imageIE" src="http://farwp.buffart.eu/wp-content/uploads/2013/05/1362949374_www.png"/><![endif]-->
                                                                        <!--[if !IE]><!--><span class="icon-globe-inv"></span><!--<![endif]-->

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
    <form method="post" action="http://farwp.buffart.eu/wp-login.php" id="loginform" name="loginform">
        <fieldset>
            <legend class="icon-user-1">Se connecter</legend>
            <label for="user_login">Identifiant</label>

            <input type="text" tabindex="10" size="20" value="" id="user_login" name="log">

            <label for="user_pass">Mot de passe</label>

            <input type="password" tabindex="20" size="20" value="" id="user_pass" name="pwd">
            <input type="submit" tabindex="100" value="Se connecter" id="wp-submit" name="wp-submit">

            <!-- Voir ce qu'on fait dans ce cas-ci <a href="http://www.NOM_DU_SITE.com/wp-login.php?action=lostpassword">Mot de passe oublié</a>-->

            <input type="hidden" value="<?php echo bloginfo('url'); ?>/membres/" name="redirect_to">
        </fieldset>
    </form>
    </section>
<?php
endif;
?>

<script src="<?php echo get_template_directory_uri(); ?>/js/scriptFar.js" type="text/javascript"></script>
<?php get_footer() ?>