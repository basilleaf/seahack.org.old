<?php
add_body_class("projectindex");
add_body_class("search");
get_header(); ?>

<?php if (have_posts()) : ?>

	<h1 class="archive-title">Search for ‘<kbd><?php echo $s ?></kbd>’</h1>
  <ul class="hfeed">

    <?php
          $post_count = 0; # This is used to put a forced break after every third post
          while (have_posts()) :
              the_post();
        $post_count++;
        if ($post_count == 4) $post_count = 1; ?>

   <li class="hentry post-<?php the_ID(); ?><?php if ($post_count == 3) { ?> last <?php  } if ($post_count == 1) { ?> first <?php } ?>">

        <div class="entry-summary">

            <?php the_excerpt(); ?>

            <p class="respond"><a href="<?php the_permalink() ?>" rel="bookmark" title="">Read more &#187;</a></p>


        </div><!-- entry-summary -->

    </li> <!-- /.hentry -->

    <?php endwhile; ?>

</ul> <!-- hfeed -->



<?php else : ?>

	<h2>No posts found. Try a different search?</h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php endif; ?>
<?php get_footer(); ?>
