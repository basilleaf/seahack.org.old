<?php add_body_class("projectindex"); ?>

<?php
/*
// while site is in development
if ( !is_user_logged_in() ) { echo "please log in"; die();  }
*/
?>


<?php get_header(); ?>

<?php

query_posts('status=current');   // only current hacks on the homepage
?>
<?php if (have_posts()) : ?>
<ul class="hfeed">
<?php
    $post_count = 0; # This is used to put a forced break after every third post
    while (have_posts()) :
        the_post();
        $post_count++;
        if ($post_count == 4) $post_count = 1;
    ?>
    <li class="hentry post-<?php the_ID(); ?>">

        <div class="entry-summary">

            <?php the_excerpt(); ?>

        </div><!-- entry-summary -->

    </li> <!-- /.hentry -->

    <?php endwhile; ?>

</ul> <!-- hfeed -->

<?php
    query_posts('status=previous');

    if (have_posts()) : ?>

    <div class="pagination">
        <ul>
            <li><a href = "previous">&laquo; Previous Projects</a></li>
        </ul>
    </div>
    <?php endif; ?>

<!-- /.nav.pagination -->
<?php else : ?>

<h1>Not Found</h1>
<p>Sorry, but you are looking for something that isn't here.</p>

<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

<?php get_footer(); ?>
