<footer>
    <div class="footerContent">
        <div>
            <h3>Navigation</h3>
            <nav>
                <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
            </nav>
        </div>
        <div>
            <h3>Horaires</h3>

            <p>Du lundi au vendredi</p>

            <p>9h00 à 17h00</p>

            <p>Fermé le week-end</p>

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
           /* $taxonomies=get_taxonomies('','names');
            foreach ($taxonomies as $taxonomy ) {
                if($taxonomy == 'category_contact'){
                echo '<p>'. $taxonomy. '</p>';
                }
            }*/

            query_posts(array('post_type'=>'contact', 'category_contact'=>'pied-de-page'));
            if(have_posts()):while(have_posts()):the_post();
           ?>
            <h3><?php the_title(); ?></h3>
                <?php $key_value = get_post_meta(get_the_ID(), 'contact_street', true);?>
            <p><?php var_dump(get_post_meta($post->ID)); ?></p>
        <?php endwhile; endif; wp_reset_query(); ?>
        </div>
        <div>
            <h3> Plan d'accès</h3>
            <a href="./html/contacts.html" title="Vers la page Contacts"><img src="./img/carte.jpg" alt="Plan d'accès à la FAR"/></a>
        </div>
    </div>
    <div class="copy">
        <p>© 2013 - Tous droits réservés / Form'action André Renard / Design <a href="http://anna.buffart.eu" title="Vers le site de abDesign">abDesign</a></p>
    </div>
</footer>
<!--<script src = "http://code.jquery.com/jquery-1.9.0.min.js" ></script > -->
<script src="./js/jquery.js" type="text/javascript"></script>
<script src="js/scriptFar.js" type="text/javascript"></script>
</body >
</html >