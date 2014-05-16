<?php
/*
Template Name: Previous
*/
?>

<?php
    add_body_class("projectindex");
    add_body_class("archive");
    get_header();
    rewind_posts();      

?>                         

<?php
	query_posts('status=previous');  

	// query_posts($query_string.'&posts_per_page=24');
	if (have_posts()) : ?>
      <div class="hfeed">
 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

      <h1 class="archive-title">Previous Projects</h1>

      <?php
          $post_count = 0; # This is used to put a forced break after every third post
          while (have_posts()) :
              the_post();
              $post_count++; ?>
      <div class="hentry post-<?php the_ID(); ?><?php if (0 === $post_count % 3) { ?> last<?php  } ?>">



      <div class="entry-summary">

          <?php the_excerpt(); ?>

          <p class="respond"><a href="<?php the_permalink() ?>" rel="bookmark" title="">Read more &#187;</a></p>

          <?php edit_post_link('Admin edit:', '<p>', '</p>'); ?>


      </div>
      </div>
      <!-- /.hentry -->
      <?php
          if(0 === $post_count % 3) {
              echo '<br style = "clear:left">';
          }

          endwhile; ?>



	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
</div>
<?php get_footer(); ?>
