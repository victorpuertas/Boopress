<!DOCTYPE html>
<html>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <!-- Google Chrome Frame for IE -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <!-- mobile meta -->
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
    
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/google-code-prettify/prettify.css" >
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/bootstrap/bootstrap.min.js"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/google-code-prettify/prettify.js"></script>
        
        <?php wp_head(); ?>    
    </head>
    
    <body <?php body_class(); ?>>
        
        <div id="container" class="container-narrow">
            
            <header>
                <div class="hero-unit">
                  <h1><?php bloginfo( 'name' ); ?></h1>
                  <p><?php bloginfo( 'description' ); ?></p>
                  
                </div>
                
                <nav>
                    <?php wp_nav_menu( array( 
                        'container_class' => 'menu-top', 
                        'theme_location' => 'top', 
                        'menu_class' => 'nav nav-pills', 
                        'fallback_cb' => false) );  ?>
                </nav>
            </header>
          
            <hr/>
