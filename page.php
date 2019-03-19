<?php
/**
 *
 *	The template for displaying all pages
 *
 *	This is the template that displays all pages by default.
 *	Please note that this is the WordPress construct of pages
 *	and that other 'pages' on your WordPress site may use a
 *	different template.
 *
 *	@package WordPress
 *	@subpackage 
 *	@since 1.0.0
 *	@version 1.0.0
 *
**/
get_header(); ?>
<main>
<?php while ( have_posts() ) : the_post();

endwhile; ?>
</main>
<?php get_footer(); ?>
