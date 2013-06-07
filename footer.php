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
        <p>© <?php the_time('Y'); ?> - Tous droits réservés / <?php bloginfo('description'); ?> / Design <?php the_author_link(); $useragent = $_SERVER['HTTP_USER_AGENT']; if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))): ?>
               <br/> <a href="#" title="Version standard du site">Visionner le site en version standard</a>
            <?php endif; ?></p>

    </div>
</footer>
</div>
</body >
</html >