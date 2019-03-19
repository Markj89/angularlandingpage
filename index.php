<?php
/**
*
* 	he main template file
*	@author Marcus Jackson
*	Description: This is the most generic template file in a WordPress theme
*	and one of the two required files for a theme (the other being style.css).
*	It is used to display a page when nothing more specific matches a query.
*	E.g., it puts together the home page when no home.php file exists.
*
*	@uses have_posts()
*	@uses the_post()
*	@package WordPress
*	@subpackage 
*	@since 2.0
*
**/
get_header(); ?>
<?php if ( have_rows('form') ):
  while ( have_rows('form') ) : the_row();
  if ( get_row_layout() == 'add_form' ): ?>
  <div class="post-body">
    <?php get_template_layout('template-parts/content-page-form', 'page'); ?>
  </div>
  <?php
endif;

endwhile;

endif;
?>

<?php get_footer(); ?>