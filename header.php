<!DOCTYPE html>

<!--[if lt IE 7]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]>
<html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<!--[if lt IE 9]>
<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="Author"
          content="abDesign"/>
    <meta name="Keywords"
          content="Far, Form'action André Renard, Formations, André Renard, Liège, FGTB"/>
    <meta name="Description"
          content="Site de la Form'action André Renard"/>

    <meta http-equiv="Content-Language"
          content="fr"/>
    <meta name="DC.Language"
          content="fr"/>
    <meta name="DC.Creator"
          content="Buffart Annabelle"/>
    <meta name="DC.Date.modified"
          scheme="W3CDTF"
          content="25/01/2013"/>

    <title>
        <?php
        wp_title('|', true, 'right');
        $site_description = get_bloginfo('description', 'display');
        $site_title = get_bloginfo('name');
        if ($site_description && (is_home() || is_front_page()))
        {
            echo "$site_title | $site_description";
        }
        ?></title>

    <!-- Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- mobile meta (hooray!) -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>"/>

    <!-- <link rel="stylesheet" type="text/css" href="./css/fontello/animation.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="./css/fontello/fontello-codes.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="./css/fontello/fontello-embedded.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="./css/fontello/fontello-ie7-codes.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="./css/fontello/fontello-ie7.css" media="screen"/>
     <link rel="stylesheet" type="text/css" href="./css/fontello/fontello.css" media="screen"/>-->

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="container">
    <header class="header" role="banner">
        <!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
        <div class="banner">
            <h1 id="logo" class="h1">
                <a href="<?php echo home_url(); ?>" rel="nofollow"><img src="http://farwp.buffart.eu/wp-content/uploads/2013/05/headerBis3.png" title="Logo de la FAR"/><?php bloginfo('description'); ?></p></a>
            </h1>

            <nav role="navigation">
                <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
            </nav>
        </div>
    </header>
    <!-- end header -->
