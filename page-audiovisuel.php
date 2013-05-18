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
                    <h3><?php the_title(); ?></h3>
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
            <h3>Vidéo à la une</h3>
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
            <section class="youtubeChaine">
                <h2 class="titleDisplay">Les chaines YouTubes</h2>

                <div>
                    <h3><?php $category = get_term_by('slug', 'nos-chaines-youtube', 'category_chaine');
                        echo $category->name ?></h3>
                    <ul class="linkTo">
                        <?php query_posts(array('post_type' => 'chaine_youtube', 'category_chaine' => 'nos-chaines-youtube', 'orderby' => 'menu_order', 'order' => 'ASC'));
                        if (have_posts()):while (have_posts()):the_post(); ?>
                            <li class="icon-videocam">
                                <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">
<?php the_title() ?>
                                </a>

                            </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
                <div>
                    <h3><?php $category = get_term_by('slug', 'nos-chaines-youtube-partenaires', 'category_chaine');
                        echo $category->name ?></h3>
                    <ul class="linkTo"><?php query_posts(array('post_type' => 'chaine_youtube', 'category_chaine' => 'nos-chaines-youtube-partenaires', 'orderby' => 'menu_order', 'order' => 'ASC'));
                        if (have_posts()):while (have_posts()):the_post(); ?>
                            <li>
                                <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'title_link', true); ?>">

                                    <figure>
                                        <?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?>
                                    </figure>

                                    <figcaption><?php the_title() ?></figcaption>
                                </a>

                            </li>
                        <?php endwhile; endif; ?>
                    </ul>
                </div>
            </section>
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
        <h2 class="titleDisplay">A propose des réalisateurs</h2>

        <div class="autresFilms">
            <header>
                <span class="icon-video"></span>

                <h3>Toutes nos réalisations</h3>
            </header>
            <ol>

                <?php
                $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts ORDER BY post_date DESC");
                foreach ($years as $year) : ?>
                    <li>

                        <a href="<?php echo get_year_link($year); ?> "><?php echo 'Archives ' . $year; ?></a>

                    </li>
                <?php endforeach; ?>
                <li>
                    <a href="http://www.far.be/vitrinevideo/2011.html">Archives 2011</a>
                </li>
                <li>
                    <a href="http://www.far.be/vitrinevideo/2010.html">Archives 2010</a>
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

<?php get_footer(); ?>