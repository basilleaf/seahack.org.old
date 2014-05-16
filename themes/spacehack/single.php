<?php
    $previous = false;
    $status = wp_get_post_terms( $post->ID, 'status');
    if ($status[0]->slug == 'previous') {
        $previous = true;
    }
?>
<?php add_body_class("projectpage"); ?>
<?php get_header(); ?>
<?php if (have_posts()):
        while (have_posts()):
            the_post();
            # Split the post into two columes using the <!-- supplement --> comment
            # Don't run the filters beforehand.
            $the_content = explode('<!--supplement-->', get_the_content());
        ?>
        <div class="hentry post post-<?php the_ID(); ?>">

	<h1 class="entry-title"><?php the_title(); ?> </h1>

        <div class="entry-header">

            <?php echo parse_content($the_content[0]); ?>


            <div class="entry-metadata">
                <p class="taxonomy">Category:
                   <span class="category"><?php the_category(', ') ?></span>.
                </p>
                <?php the_tags('<p class="folksonomy">Tags: ', ', ', '.</p>'); ?>
            </div>



        </div>


        <div class="entry-content
            <?php
            if ($previous) {
                echo " previous_detail_wrapper ";
            }
            ?>
            ">

            <?php
            /* deadline message */
            if ($previous) {
                $values = get_post_custom_values("previous_message");
                ?>
                <div class = "previous_msg_detail">
                <?php
                if (isset($values[0])) {
                    echo $values[0];
                } else { ?>
                    THE DEADLINE FOR THIS PROJECT HAS PASSED
                <?php } ?>
                </div>
            <?php } // end if status = prev
            ?>


            <?php echo parse_content($the_content[1]); ?>




            <?php edit_post_link('Admin: Edit'); ?>
        </div>
    </div>
    <!-- /.hentry -->

    <div class="discussion">
      <div id="discuss">
        <h2>Updates</h2>

        <div class="comment-content">
          <div class="input"><?php if ($the_content[2]):
            echo parse_content($the_content[2]);
          else:
            ?>Nothing to update you on yet! <a href="mailto:ariel@seahack.org">Make contact</a> if you have exciting news about this project.<?php
          endif; ?></div>
        </div>

        <div class="comment-author">
          <div class="avatar">
            <img width = "50" height = "50" src="http://seahack.org/wp-content/uploads/2013/11/seainvader.jpg" alt="" />
          </div>
        </div>
      </div>

    <div class="entry-metadata entry-metadata-mobile">
        <p class="taxonomy">Category:
           <span class="category"><?php the_category(', ') ?></span>.
        </p>
        <?php the_tags('<p class="folksonomy">Tags: ', ', ', '.</p>'); ?>
    </div>

    </div> <!-- /.discussion -->


<?php endwhile; ?>
<?php else: ?>
        <h1>Not Found</h1>
        <p>Sorry, but you are looking for something that isn't here.</p>
        <?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>
<?php get_footer(); ?>