<?php
    add_body_class("projectindex");
    add_body_class("archive");
    get_header();
    

    // hack, when you pass status to the query_string it breaks single_tag_title
    // so have to fetch it here then rewind.. 
    $tag_title = '';
    query_posts($query_string);
	if (is_tag()) {
		$tag_title = single_tag_title('', False);
	}
	rewind_posts();
?>      
<!-- archive.php -->


<?php       
         
$statuses = array('current','previous'); # get current first then previous    

$post_count = 0; # This is used to put a forced break after every third post
$title_drawn = False;
foreach ($statuses as $status) {
	
	rewind_posts();

	query_posts($query_string."&status=$status");
	
    while (have_posts()) : 
    	$post_count++;
    	if ($post_count == 4) $post_count = 1; 

    		/* 
			 Draw the page title if it hasn't been drawn
			 putting this here so it doesn't get drawn if have_posts never triggers (no posts with one of the statuses above) */ 
		?>
	  <?php if (!$title_drawn) { ?>
			<?php $title_drawn = True; ?> 
			<h1 class="archive-title"> 
			<?php /* If this is a category archive */ if (is_category()) { ?>  
				<?php single_cat_title(); ?> 
		 	<?php /* If this is a tag archive */ } elseif( $tag_title) { ?>
				<?php echo $tag_title; ?> 
		 	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				Archive for <?php the_time('F jS, Y'); ?>
		 	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				Archive for <?php the_time('F, Y'); ?>
		 	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				Archive for <?php the_time('Y'); ?>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				Author Archive
		 	<?php /* If this is a paged archive */ } else { ?>
				Project Archives
		 	<?php } ?></h1>
		 	<ul class="hfeed">
	  <?php } /* end !if title_drawn */ ?>


    <?php
		the_post();
		?>     
    
 <li class="hentry post-<?php the_ID(); ?><?php if ($post_count == 3) { ?> last <?php  } if ($post_count == 1) { ?> first <?php } ?>">

        <div class="entry-summary">

            <?php the_excerpt(); ?>

            <p class="respond"><a href="<?php the_permalink() ?>" rel="bookmark" title="">Read more &#187;</a></p>


        </div><!-- entry-summary -->

    </li> <!-- /.hentry -->

    <?php endwhile; ?>

<?php } // endforeach ?>

</ul> <!-- hfeed -->

    


<?php if (!$title_drawn) { ?>
	<h2 class="center">Not Found</h2>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<?php } ?>

<?php get_footer(); ?>
