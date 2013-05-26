<?php

add_action('init', 'create_post_type');
add_action('widgets_init', 'far_sidebars');
add_action('after_setup_theme', 'far_setup');
add_action('init', 'add_taxonomies');
add_theme_support('post-thumbnails');
add_action('post_edit_format_tag', 'update_edit_form');

/*
 * Create custom taxonomy
 */

if (!function_exists('add_taxonomies'))
{
    function add_taxonomies()
    {

        register_taxonomy('category_video', 'audiovisual', array(
            'label' => 'Catégorie vidéo',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_contact', 'contact', array(
            'label' => 'Catégorie contact',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_link', 'links', array(
            'label' => 'Catégorie lien',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_cours', 'documents', array(
            'label' => 'Catégorie cours',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true,
            'menu_name' => true,

        ));

        register_taxonomy('category_type', 'documents', array(
            'label' => 'Catégorie type',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_chaine', 'chaine_youtube', array(
            'label' => 'Catégorie chaine',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_publication', 'publishing', array(
            'label' => 'Catégorie publication',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_image', 'autre_image', array(
            'label' => 'Catégorie image',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));

        register_taxonomy('category_horaire', 'horaire', array(
            'label' => 'Catégorie horaire',
            'hierarchical' => true,
            'query_var' => true,
            'rewrite' => true
        ));
    }
}

/*
 * Create custom post type
 */

if (!function_exists('create_post_type'))
{
    function create_post_type()
    {
        register_post_type('publishing',
            array(
                'labels' => array(
                    'name' => __('Parutions'),
                    'singular_name' => __('Parutions'),
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true
            )
        );

        register_post_type('audiovisual',
            array(
                'labels' => array(
                    'name' => __('Films'),
                    'singular_name' => __('Films'),
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true
            )
        );

        register_post_type('contact',
            array(
                'labels' => array(
                    'name' => __('Contact'),
                    'singular_name' => __('Contact'),
                ),
                'supports' => array('title'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

        register_post_type('links',
            array(
                'labels' => array(
                    'name' => __('Liens'),
                    'singular_name' => __('Liens'),
                ),
                'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

        register_post_type('documents',
            array(
                'labels' => array(
                    'name' => __('Cours'),
                    'singular_name' => __('Cours'),
                ),
                'supports' => array('title', 'excerpt', 'editor'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

        register_post_type('equipe',
            array(
                'labels' => array(
                    'name' => __('Equipe'),
                    'singular_name' => __('Equipe'),
                ),
                'supports' => array('title', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true
            )
        );

        register_post_type('chaine_youtube',
            array(
                'labels' => array(
                    'name' => __('Chaine YouTube'),
                    'singular_name' => __('Chaine YouTube'),
                ),
                'supports' => array('title', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

        register_post_type('horaire',
            array(
                'labels' => array(
                    'name' => __('Horaire'),
                    'singular_name' => __('Horaire'),
                ),
                'supports' => array('title'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

        register_post_type('autre_image',
            array(
                'labels' => array(
                    'name' => __('Autres images'),
                    'singular_name' => __('Autres Ajouter'),
                ),
                'supports' => array('title', 'excerpt', 'thumbnail', 'page-attributes'),
                'public' => true,
                'has_archive' => true,
                'hierarchical' => true,
                'menu_position' => true,
            )
        );

    }
}

/*
 * Create custom meta box
 */
if (!class_exists('far_custom_field'))
{

    class far_custom_field
    {
        /**
         * @var  string $prefix  The prefix for storing custom fields in the postmeta table
         */
        var $prefix = '_fcf_';
        /**
         * @var  array $post_types  An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
         */
        var $post_types = array("publishing", "email", "audiovisual", "contact", "links", "chaine_youtube", "equipe", "horaire", "autre_image");
        /**
         * @var  array $custom_fields  Defines the custom fields available
         */
        var $custom_fields = array(
            array(
                "name" => "link",
                "title" => "Le liens",
                "description" => "",
                "type" => "text",
                "scope" => array("publishing", "audiovisual", "links", "chaine_youtube", "autre_image"),
                "capability" => "edit_posts"
            ),
            array(
                "name" => "title_link",
                "title" => "Le titre du lien",
                "description" => "",
                "type" => "text",
                "scope" => array("publishing", "audiovisual", "links", "chaine_youtube", "autre_image"),
                "capability" => "edit_posts"
            ),
            array(
                "name" => "poste_equipe",
                "title" => "Poste",
                "description" => "",
                "type" => "text",
                "scope" => array("equipe"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_title",
                "title" => "Lieu",
                "description" => "",
                "type" => "text",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_street",
                "title" => "Rue",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_number",
                "title" => "Numéro",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_town",
                "title" => "Ville",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_cp",
                "title" => "Code postal",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_phone",
                "title" => "Téléphone",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_fax",
                "title" => "Fax",
                "description" => "",
                "type" => "input",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_email1",
                "title" => "Email 1",
                "description" => "",
                "type" => "input",
                "scope" => array("contact", "equipe"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_email2",
                "title" => "Email 2",
                "description" => "",
                "type" => "input",
                "scope" => array("contact", "equipe"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_map_title",
                "title" => "Titre de la map",
                "description" => "",
                "type" => "text",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "contact_map",
                "title" => "Map Google",
                "description" => "",
                "type" => "textarea",
                "scope" => array("contact"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "horaire_day",
                "title" => "Jours de la semaine",
                "description" => "",
                "type" => "input",
                "scope" => array("horaire"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "horaire_hour",
                "title" => "Heures d'ouverture",
                "description" => "",
                "type" => "input",
                "scope" => array("horaire"),
                "capability" => "manage_options"
            ),

            array(
                "name" => "horaire_close",
                "title" => "Fermeture",
                "description" => "",
                "type" => "input",
                "scope" => array("horaire"),
                "capability" => "manage_options"
            )

        );


        /**
         * PHP 5 Constructor
         */
        function __construct()
        {
            add_action('admin_menu', array(&$this, 'create_custom_fields'));
            add_action('save_post', array(&$this, 'save_custom_fields'), 1, 2);
        }

        /**
         * Create the new Custom Fields meta box
         */
        function create_custom_fields()
        {
            if (function_exists('add_meta_box'))
            {
                foreach ($this->post_types as $post_type)
                {
                    add_meta_box('far_custom_fields', 'Informations complémentaires', array(&$this, 'display_custom_fields'), $post_type, 'normal', 'high');
                }
            }
        }

        /**
         * Display the new Custom Fields meta box
         */
        function display_custom_fields()
        {
            global $post;
            ?>
            <div class="form-wrap">
                <?php
                wp_nonce_field('far_custom_fields', 'far_custom_fields_wpnonce', false, true);
                foreach ($this->custom_fields as $custom_field)
                {
                    // Check scope
                    $scope = $custom_field['scope'];
                    $output = false;
                    foreach ($scope as $scope_item)
                    {
                        switch ($scope_item)
                        {
                            default:
                                {
                                if ($post->post_type == $scope_item)
                                    $output = true;
                                break;
                                }
                        }
                        if ($output) break;
                    }
                    // Check capability
                    if (!current_user_can($custom_field['capability'], $post->ID))
                        $output = false;
                    // Output if allowed
                    if ($output)
                    {
                        ?>
                        <div class="form-field form-required">
                            <?php
                            switch ($custom_field['type'])
                            {
                                case "textarea":
                                {
                                    // Text area
                                    echo '<label for="' . $custom_field['name'] . '"><b>' . $custom_field['title'] . '</b></label>';
                                    echo '<textarea name="' . $custom_field['name'] . '" id="' . $custom_field['name'] . '" columns="30" rows="3">' . htmlspecialchars(get_post_meta($post->ID, $custom_field['name'], true)) . '</textarea>';
                                    // WYSIWYG
                                    if ($custom_field['type'] == "wysiwyg")
                                    {
                                        ?>
                                        <script type="text/javascript">
                                            jQuery(document).ready(function () {
                                                jQuery("<?php echo $custom_field[ 'name' ]; ?>").addClass("mceEditor");
                                                if (typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function") {
                                                    tinyMCE.execCommand("mceAddControl", false, "<?php echo $custom_field[ 'name' ]; ?>");
                                                }
                                            });
                                        </script>
                                    <?php
                                    }
                                    break;
                                }

                                default:
                                    {
                                    // Plain text field
                                    echo '<label for="' . $custom_field['name'] . '"><b>' . $custom_field['title'] . '</b></label>';
                                    echo '<input type="text" name="' . $custom_field['name'] . '" id="' . $custom_field['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $custom_field['name'], true)) . '" />';
                                    break;
                                    }
                            }
                            ?>
                            <?php if ($custom_field['description']) echo '<p>' . $custom_field['description'] . '</p>'; ?>
                        </div>
                    <?php
                    }
                } ?>
            </div>
        <?php
        }

        /**
         * Save the new Custom Fields values
         */
        function save_custom_fields($post_id, $post)
        {
            if (!isset($_POST['far_custom_fields_wpnonce']) || !wp_verify_nonce($_POST['far_custom_fields_wpnonce'], 'far_custom_fields'))

                return;
            if (!current_user_can('edit_post', $post_id))
                return;
            if (!in_array($post->post_type, $this->post_types))
                return;
            foreach ($this->custom_fields as $custom_field)
            {
                if (current_user_can($custom_field['capability'], $post_id))
                {
                    if (isset($_POST[$custom_field['name']]) && trim($_POST[$custom_field['name']]))
                    {
                        $value = $_POST[$custom_field['name']];
                        // Auto-paragraphs for any WYSIWYG
                        if ($custom_field['type'] == "wysiwyg") $value = wpautop($value);
                        update_post_meta($post_id, $custom_field['name'], $value);
                    } else
                    {
                        delete_post_meta($post_id, $custom_field['name']);
                    }
                }
            }
        }

    } // End Class

} // End if class exists statement

// Instantiate the class
if (class_exists('far_custom_field'))
{
    $far_custom_fields_var = new far_custom_field();
}

/* Choisir quel side bar selon les pages via admin ? */

if (!function_exists('far_sidebars'))
{
    function far_sidebars()
    {
        register_sidebar(
            array(
                'id' => 'primary',
                'name' => __('Primary'),
                'description' => __('First sidebar'),
                'before_widget' => '<div id="%1$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_titre">',
                'after_title' => '</h3>'
            )
        );

        register_sidebar(
            array(
                'id' => 'secondary',
                'name' => __('Secondary'),
                'description' => __('Second sidebar'),
                'before_widget' => '<div id="%1$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_titre">',
                'after_title' => '</h3>'
            )
        );
    }
}

/**
 * Intégration MENU
 */
if (!function_exists('far_setup'))
{
    function far_setup()
    {
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');
        add_theme_support('post-formats', array('aside', 'link', 'gallery', 'status', 'quote', 'image'));

        //Intègre le menu de navigation dans une sidebar pour aller dans les pages qui intéresse
        register_nav_menu('header menu', __('Header Menu', 'portfolio'));

    }
}

/**
 * jQuery library
 */
function my_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'my_init');

/**
 * Remove toolbar
 */
add_filter( 'show_admin_bar', '__return_false' );

/**
 * Login Fail redirect
 */
/*add_action( 'wp_login_failed', 'login_fail_redirect' );  // hook failed login

function login_fail_redirect( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
        wp_redirect( $referrer . '?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use

        exit;
    }
}*/

add_action('init', 'ConnectUserSite', 1);
function ConnectUserSite() {

    if (!is_admin()) {
        global $ConnectString;
        global $RegisterString;
        $ConnectString = "<div class='my-error'>";
        $RegisterString = $ConnectString;
        //var_dump($_POST);
        if (isset( $_POST['user-submit']) && !empty( $_POST['user-submit']))
        {
            global $error;

            if ( $_POST['user-submit'] == __('Login'))
            {
                $postpass = array('user_login' => esc_attr($_POST['log']), 'user_password' => esc_attr($_POST['pwd']), 'remember' => esc_attr($_POST['rememberme']));
                $user = wp_signon($postpass, false);
                if ( is_wp_error($user) )
                {
                        $ConnectString .= '<div>Votre mot de passe ou identifiant est invalide</div>';
                }

            }
        }
        $ConnectString .= '</div>';
        $RegisterString .= '</div>';
    }
}
