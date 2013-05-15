<?php

add_action('init', 'create_post_type');
add_action('widgets_init', 'far_sidebars');
//add_action('after_setup_theme', 'far_setup');
add_action('init', 'add_taxonomies');
add_theme_support('post-thumbnails');

/*
 * Create custom taxonomy
 */

if(! function_exists('add_taxonomies')){
    function add_taxonomies(){

        register_taxonomy('category_video', 'audiovisual', array(
            'label'=> 'Catégorie vidéo',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_contact', 'contact', array(
            'label'=> 'Catégorie contact',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_link', 'links', array(
            'label'=> 'Catégorie lien',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_cours', 'documents', array(
            'label'=> 'Catégorie cours',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true,
            'menu_name'=>true,

        ));

        register_taxonomy('category_type', 'documents', array(
            'label'=> 'Catégorie type',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_chaine', 'chaine_youtube', array(
            'label'=> 'Catégorie chaine',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_publication', 'publishing', array(
            'label'=> 'Catégorie publication',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
        ));

        register_taxonomy('category_image', 'autre_image', array(
            'label'=> 'Catégorie image',
            'hierarchical'=>true,
            'query_var'=>true,
            'rewrite'=>true
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
                'supports' => array('title', 'excerpt'),
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
         * @var  string  $prefix  The prefix for storing custom fields in the postmeta table
         */
        var $prefix = '_fcf_';
        /**
         * @var  array  $post_types  An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
         */
        var $post_types = array("publishing", "email", "audiovisual", "contact", "links", "chaine_youtube", "equipe", "horaire", "autre_image");
        /**
         * @var  array  $custom_fields  Defines the custom fields available
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
                                case "textarea":{
                                    // Text area
                                    echo '<label for="' . $custom_field[ 'name' ] .'"><b>' . $custom_field[ 'title' ] . '</b></label>';
                                    echo '<textarea name="' . $custom_field[ 'name' ] . '" id="' . $custom_field[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $custom_field[ 'name' ], true ) ) . '</textarea>';
                                    // WYSIWYG
                                    if ( $custom_field[ 'type' ] == "wysiwyg" ) { ?>
                                        <script type="text/javascript">
                                            jQuery( document ).ready( function() {
                                                jQuery( "<?php echo $custom_field[ 'name' ]; ?>" ).addClass( "mceEditor" );
                                                if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
                                                    tinyMCE.execCommand( "mceAddControl", false, "<?php echo $custom_field[ 'name' ]; ?>" );
                                                }
                                            });
                                        </script>
                                    <?php }
                                    break;
                                }

                                default:
                                    {
                                    // Plain text field
                                    echo '<label for="'. $custom_field['name'] . '"><b>' . $custom_field['title'] . '</b></label>';
                                    echo '<input type="text" name="'. $custom_field['name'] . '" id="' . $custom_field['name'] . '" value="' . htmlspecialchars(get_post_meta($post->ID, $custom_field['name'], true)) . '" />';
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
                    if (isset($_POST[ $custom_field['name']]) && trim($_POST[$custom_field['name']]))
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

if(! function_exists('far_sidebars')){
    function far_sidebars(){
        register_sidebar(
            array(
                'id' => 'primary',
                'name'=>__('Primary'),
                'description' => __('First sidebar'),
                'before_widget'=> '<div id="%1$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_titre">',
                'after_title'=> '</h3>'
            )
        );

        register_sidebar(
            array(
                'id' => 'secondary',
                'name'=>__('Secondary'),
                'description' => __('Second sidebar'),
                'before_widget'=> '<div id="%1$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_titre">',
                'after_title'=> '</h3>'
            )
        );
    }
}


/**
 * Custom box download
 */
/* Create meta box */
function download_custom_meta_boxes(){
    //Define the custom attachment for the posts
    add_meta_box(
        'wp_custom_download',
        'Télécharger un fichier',
        'wp_custom_download',
        'documents',
        'normal'
    );

}

/* Create the upload input */
function wp_custom_download(){
    //Define the nonce value to validate and secure the upload
    wp_nonce_field(plugin_basename(__FILE__), 'wp_custom_download_nonce');

    $html='';
    $html.='Télécharger le document ici';
    $html.='';
    $html.='<input type="file" id="wp_custom_download" name="wp_custom_download" value="" size="25">';
    echo $html;

}

/* Save the uplaod */
function save_custom_download($id){
    //Security and verification
    if(!wp_verify_nonce($_POST['wp_custom_download_nonce'], plugin_basename(__FILE__))){
        return $id;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return  $id;
    }

    if('documents' == $_POST['post_type']){
        return $id;
    }else{
        if(!current_user_can('edit_page', $id)){
            return $id;
        }
    }

    //Verify if the file array is not empty
    if(!empty($_FILES['wp_custom_download']['name'])){
        //Support file type
        $supported_types = array('application/pdf', 'application/jpg', 'application/jpeg', 'application/doc', 'application/docx', 'application/png', 'application/gif', 'application/xls', 'application/xlsx', 'application/txt', 'application/pdf');

        //Get the file type of the upload
        $arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_download']['name']));
        $uploaded_type = $arr_file_type['type'];

        //Check the support file. If not, there is an error message
        if(in_array($uploaded_type, $supported_types)){
            //WP API to upload file, upload_bits save the file on the server
            $upload = wp_upload_bits($_FILES['wp_custom_download']['name'], null, file_get_contents($_FILES['wp_custom_download']['tmp_name']));

            if(isset($upload['error']) && $upload['error'] != 0){
                wp_die('Une erreur est survenue lors du téléchargement du fichier:'.$upload['error']);
            }else{
                //Execute the upload and display to the user
                add_post_meta($id, 'wp_custom_download', $upload);
                update_post_meta($id, 'wp_custom_download', $uplaod);
            }
        }else{
            wp_die("Le type de fichier téléchargé n'est pas supporter");
        }
    }
}

add_action('add_meta_boxes', 'download_custom_meta_boxes');

/*Update the post */
function update_edit_form(){
    echo 'enctype="multipart/form-data"';
}
add_action('post_edit_format_tag', 'update_edit_form');

