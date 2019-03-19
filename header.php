<?php
/**
 *
 * The header for our theme.
 * @package WordPress
 * @subpackage 
 * Displays all of the <head> section and everything up till <main>
 * and the left sidebar conditional
 * @since 2.0.0
 *
**/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js"><!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php wp_title(); ?></title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="content-type" content="text/html; charset=us-ascii">
    <meta name="description" content="">
    <meta name="robots" content="noindex, nofollow">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="theme-color" content="#">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> dir="auto">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="btn navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <?php if (get_theme_mod( 'logo' ) ): ?>
                    <a class="brand" href="<?php echo home_url('home'); ?>">
                        <img src="<?php echo get_theme_mod( 'logo' ); ?>" class="" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="150">
                    </a>
                <?php endif; ?>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <?php 
            /* Primary navigation */
            wp_nav_menu( array(
                'menu'        => 'menu_class',
                'depth'       =>  2,
                'container'   => 'div',
                'menu_class'  => 'nav navbar-nav navbar-left',  
                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                'walker'      => new wp_bootstrap_navwalker())
            );
            ?>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>