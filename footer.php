<footer class="liens">
    <ul>
        <?php

        query_posts(array('post_type' => 'links', 'category_link'=>'bas-page', 'posts-per-page'=>3, 'orderby'=>'menu_order', 'order'=>'ASC'));
        if (have_posts()):while (have_posts()):the_post();
        ?>
        <li>
            <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>
        </li>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </ul>
</footer>
</div>
<!-- end .content -->
<!--  <h2 class="noDisplay" style="display: none">Informations footer</h2> -->
<footer>
    <div class="footerContent">
        <div>
            <nav>
                <h3>Navigation</h3>
                <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
            </nav>
        </div>
        <div>
            <?php

            query_posts(array('post_type' => 'horaire'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_day', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_hour', true) ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_close', true) ?></p>
            <?php endwhile; endif;
            wp_reset_query(); ?>

            <form action="#" method="post">
                <fieldset>
                    <label for="newsletterEmail">S'inscrire à notre newsletter</label>
                    <input type="email" placeholder="Votre email" id="newsletterEmail"/>
                    <input type="submit" value="S'inscrire" name="S'inscrire"/>
                </fieldset>
            </form>
        </div>
        <div>
            <?php

            query_posts(array('post_type' => 'contact', 'category_contact' => 'pied-de-page'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_post_meta(get_the_ID(), 'contact_title', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'contact_street', true) . ' ' . get_post_meta(get_the_ID(), 'contcat_number', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'contact_cp', true) . ' ' . get_post_meta(get_the_ID(), 'contcat_town', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'contact_phone', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'contact_email1', true); ?></p>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
        <div>
            <?php

            query_posts(array('post_type' => 'contact', 'category_contact' => 'pied-de-page'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <h3><?php echo get_post_meta(get_the_ID(), 'contact_map_title', true); ?></h3>
                <div><?php echo get_post_meta(get_the_ID(), 'contact_map', true); ?></div>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
    </div>
</footer>
<div class="copy">
    <?php $user_info = get_userdata(1); ?>
    <p>© <?php the_time('Y'); ?> - Tous droits réservés / <?php bloginfo('description'); ?> / Design <?php the_author_link(); ?></p>
</div>
<!--<script src = "http://code.jquery.com/jquery-1.9.0.min.js" ></script > -->
<!--<script src="./js/jquery.js" type="text/javascript"></script>
<script src="js/scriptFar.js" type="text/javascript"></script>-->
</body >
</html >