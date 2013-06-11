<footer class="liens">
    <ul data-role="listview">

        <?php
        query_posts(array('post_type' => 'links', 'category_link' => 'bas-page', 'posts-per-page' => 3, 'orderby' => 'menu_order', 'order' => 'ASC'));
        if (have_posts()):while (have_posts()):the_post();
            ?>
            <li data-corners="false" data-shadow="false" data-iconshadow="true" data-wrapperels="div" data-icon="arrow-r" data-iconpos="right" data-theme="c">
                <a href="<?php echo get_post_meta(get_the_ID(), 'link', true); ?>" title="<?php echo get_post_meta(get_the_ID(), 'link_title', true); ?>"><?php the_post_thumbnail('full', array('alt' => trim(strip_tags($wp_postmeta->_wp_attachment_image_alt)))); ?></a>
            </li>
        <?php endwhile; endif;
        wp_reset_query(); ?>
    </ul>
</footer>
</div>
<!-- end .content -->
<h2 class="titleDisplay">Informations complémentaires</h2>
<footer class="footer" data-role="footer" class="ui-bar">
    <div class="banner" data-role="collapsible-set" data-theme="b" data-content-theme="d" data-inset="false">
        <div data-role="collapsible">
            <h3>Navigation</h3>
            <nav data-role="navbar">

                <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
            </nav>
        </div>
        <div data-role="collapsible">
            <?php

            query_posts(array('post_type' => 'horaire', 'category_horaire'=>'cat-bas'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <h3><?php the_title(); ?></h3>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_day', true); ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_hour', true) ?></p>
                <p><?php echo get_post_meta(get_the_ID(), 'horaire_close', true) ?></p>
            <?php endwhile; endif;
            wp_reset_query(); ?>

            <script type="text/javascript" src="http://signup.ymlp.com/signup.js?id=gbeeqwbgmgj"></script>
        </div>
        <div data-role="collapsible">
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
        <div data-role="collapsible">
            <?php

            query_posts(array('post_type' => 'contact', 'category_contact' => 'pied-de-page'));
            if (have_posts()):while (have_posts()):the_post();
                ?>
                <h3><?php echo get_post_meta(get_the_ID(), 'contact_map_title', true); ?></h3>
                <div class="gmap"><?php echo get_post_meta(get_the_ID(), 'contact_map', true); ?></div>
            <?php endwhile; endif;
            wp_reset_query(); ?>
        </div>
    </div>
    <div class="copy">
        <?php $user_info = get_userdata(1); ?>
        <p>© <?php the_time('Y'); ?> - Tous droits réservés / <?php bloginfo('description'); ?> / Design <?php the_author_link(); ?> - <?php if (wp_is_mobile()): ?> <button class="ui-link" id="mobileVersion">Version standard</button> <?php endif; ?></p>

    </div>
</footer>
</div>
</body >
</html >