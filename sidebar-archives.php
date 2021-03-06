<aside class="sidebar fourcol last clearfix" role="complementary">

    <div class="autresFilms">
        <header>
            <span class="icon-video"></span>

            <h3>Toutes nos réalisations</h3>
        </header>
        <ol data-role="listview" data-inset="true" data-split-icon="gear" data-split-theme="d">
            <?php
            $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts ORDER BY post_date DESC");
            foreach ($years as $year) : ?>
                <li>

                    <a href="<?php echo get_year_link($year); ?>"><?php echo 'Archives ' . $year; ?></a>

                </li>
            <?php endforeach; ?>
            <li>
                <a href="http://www.far.be/vitrinevideo/2011.html">Archives 2011 <span class="icon-link-ext"></span> </a>
            </li>
            <li>
                <a href="http://www.far.be/vitrinevideo/2010.html">Archives 2010 <span class="icon-link-ext"></span></a>
            </li>
            <li>
                <a href="http://www.far.be/vitrinevideo/archives.html">Archives antérieurs à 2010 <span class="icon-link-ext"></span></a>
            </li>
        </ol>
</aside>