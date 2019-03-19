<?php
/**
 *  
 *  The template for displaying the footer.
 *
 *  Contains the closing of the #content div and all content after
 *
 *  @package WordPress
 *  @subpackage 
 *
**/
?>
<footer role="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Contact</h3>
        <br>
      </div><!--/ .contact-info -->
    </div><!--/ .col-md-4 -->
    <div class="col-lg-4">
      <div class="list-social-icons">
        <h3>Follow Us</h3>
        <?php social_media_icons(); ?>
      </div><!--/ .list-social-icons -->
      </div><!--/ .col-lg-4 -->
    </div><!--/ .row -->
  </div><!--/ .container -->
  <?php wp_footer(); ?>
</footer>
<?php wp_enqueue_script("jquery"); ?>
<script type="text/javascript">
  if (typeof jQuery === 'function') {
    define('jquery', function () { return jQuery; });
  }
</script>
<script async src="<?php echo get_stylesheet_directory_uri(); ?>/js/lib/require.js" data-main="<?php echo get_stylesheet_directory_uri(); ?>/js/app/config"></script>

</body>
</html>