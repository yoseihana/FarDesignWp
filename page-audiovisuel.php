<?php get_header(); ?>

<div class="content">
    <header>
        <div class="slider">
            <?php
            query_posts(array('post_type' => 'autre_image', 'category_image' => 'cat-audiovisuel', 'posts_per_page' => 1));
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
    <section class="vitrineAudiovisuelle">
        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <header>

                <h2>
                    <?php the_title(); ?>
                </h2>

            </header>
            <p><?php the_content(); ?></p>
        <?php endwhile; endif; ?>
        <div class="contentColonne">
            <h3>Notre dernière vidéo</h3>
            <?php query_posts(array('post_type' => 'audiovisual', 'category_video' => 'nouvelle-video', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):
            the_post(); ?>
            <div>
                <h4><?php the_title(); ?></h4>

                <p><?php the_content(); ?></p>

                <p><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>
                <?php endwhile;
                endif;
                wp_reset_query(); ?>
            </div>
            <div class="films">
                <h3>Nos films</h3>
                <ul>
                    <?php query_posts(array('post_type' => 'audiovisual', 'category_video' => 'nos-videos', 'posts_per_page' => 5, 'orderby' => 'menu_order', 'order' => 'ASC'));
                    if (have_posts()):while (have_posts()):the_post(); ?>
                        <li>
                            <div>
                                <h4><?php the_title(); ?></h4>

                                <p><?php the_content(); ?></p>

                                <p><a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>"><?php echo get_post_meta(get_the_ID(), 'title_link', true); ?></a></p>
                        </li>
                    <?php endwhile; endif;
                    wp_reset_query(); ?>
            </div>
    </section>
    <aside>
        <h2 style="display: none">A propose des réalisateurs</h2>
        <div class="autresFilms">
            <header>
                <span class="icon-video"></span>

                <h3>Toutes nos réalisations</h3>
            </header>
            <ol>
                <li>
                    <a href="http://www.far.be/vitrinevideo/2012.html">Archives 2012</a>
                </li>
                <li>
                    <a href="http://www.far.be/vitrinevideo/2011.html">Archives 2011</a>
                </li>
                <li>
                    <a href="http://www.far.be/vitrinevideo/2010.html">Aechives 2010</a>
                </li>
                <li>
                    <a href="http://www.far.be/vitrinevideo/archives.html">Archives antérieurs à 2010</a>
                </li>
            </ol>
        </div>
        <div>
            <?php query_posts(array('post_type' => 'contact', 'category_contact' => 'page-audiovisuel', 'posts_per_page' => 1));
            if (have_posts()):while (have_posts()):the_post(); ?>
                <header>
                    <span class="icon-mail"></span>

                    <h3><?php the_title(); ?></h3>
                </header>

                <p>
                    <?php echo get_post_meta(get_the_ID(), 'contact_title', true); ?>
                </p>

                <p>
                    <?php echo get_post_meta(get_the_ID(), 'contact_street', true) . ' ' . get_post_meta(get_the_ID(), 'contact_number', true); ?>
                </p>

                <p>
                    <?php echo get_post_meta(get_the_ID(), 'contact_cp', true) . ' ' . get_post_meta(get_the_ID(), 'contact_town', true); ?>
                </p>

                <p>
                    <?php echo get_post_meta(get_the_ID(), 'contact_email1', true) . ' et ' . get_post_meta(get_the_ID(), 'contact_email2', true); ?>
                </p>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
    </aside>
    <section class="youtubeChaine">
    <h2 style="display:none;">Les chaines YouTubes</h2>
    <div>
        <h3>Nos chaines YouTubes</h3>
        <ul class="linkTo">
            <?php query_posts(array('post_type' => 'chaine_youtube', 'category_chaine' => 'nos-chaines-youtube', 'orderby' => 'menu_order', 'order' => 'ASC'));
            if (have_posts()):while (have_posts()):the_post(); ?>
                <li>
                    <p><?php $category = get_the_terms(get_the_ID(), 'category_chaine');
                        var_dump($category);
                        var_dump($category[0]);
                        ?></p>
                    <figure>

                        <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
                            <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                            <figcaption><?php the_title() ?></figcaption>
                        </a>
                    </figure>

                </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>
    <div>
        <h3>Nos chaines YouTubes partenaires</h3>
        <ul <?php query_posts(array('post_type' => 'chaine_youtube', 'category_chaine' => 'nos-chaines-youtube-partenaires', 'orderby' => 'menu_order', 'order' => 'ASC'));
        if (have_posts()):while (have_posts()):the_post(); ?>
            <li>

                <figure>

                    <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
                        <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                        <figcaption><?php the_title() ?></figcaption>
                    </a>
                </figure>

            </li>
        <?php endwhile; endif; ?>
        </ul>
    </div>
<?php get_footer(); ?>