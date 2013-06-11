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
    <meta name="description" content="<?php bloginfo('description') . ': ' . wp_title(); ?>"/>
    <meta name="language" content="<?php bloginfo('description') . ': ' . wp_title(); ?>"/>

    <title>
        <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>

    <!-- Google Chrome Frame for IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <!-- mobile meta (hooray!) -->
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fontello/fontello-codes.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fontello/fontello-embedded.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fontello/fontello-ie7-codes.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fontello/fontello-ie7.css"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/fontello/fontello.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/print.css" media="print"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" id="defaultStyle" disable="disable"/>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.browser.mobile.min.js"></script>

    <?php if (wp_is_mobile()): ?>
        <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js" id="jqueryMobileScript"></script>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css" id="jqueryMobileVersion"/>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/mobile.css" id="styleMobileVersion"/>
    <?php else: ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" id="defaultStyle"/>
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
<div class="warpper" data-role="page">
    <header class="header" role="banner" data-role="header" data-theme="a">
        <!-- to use a image just replace the bloginfo('name') with your img src and remove the surrounding <p> -->
        <div class="banner">
            <!--<a href="#" data-rel="back" data-icon="arrow-l" data-theme="a"></a>-->
            <a class="logo" href="<?php echo home_url(); ?>" rel="nofollow"><img src="http://farwp.buffart.eu/wp-content/uploads/2013/05/logoFar.png" title="Logo de la FAR" alt="logo"/>

                <h1 class="h1" role="heading"><?php bloginfo('description'); ?></h1>

            </a>
            <nav data-role="navbar">
                <h2 class="titleDisplay">Navigation principale</h2>
                <?php wp_nav_menu(array('menu' => 'Header Menu')); ?>
            </nav>
        </div>
    </header>
    <!-- end header -->
