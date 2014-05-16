<?php get_header(); ?>

INDEX.PHP

<?php if (have_posts()) : ?>

<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
<div class="span-8 post-<?php the_ID(); ?><?php if ($i == 3) { ?> last<?php  } ?>">
<h6 class="archive-header"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title() ?></a></h6>
<?php
	$values = get_post_custom_values("thumbnail");
	if (isset($values[0])) {
?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php $values = get_post_custom_values("thumbnail"); echo $values[0]; ?>" alt="" /></a>
<?php } ?>
<?php the_excerpt(); ?>
<p class="postmetadata">
  <?php the_time('M d, Y') ?> |
  <a href="<?php the_permalink() ?>" rel="bookmark" title="">Check it out &#187;</a>
</p>
</div>
<?php if (3 === $i) { ?><div class="archive-stack clear"></div><?php $i = 0; } ?>
<?php endwhile; ?>

<div class="clear"></div>
<div class="navigation">
	<div><?php next_posts_link('<strong>&laquo; Previous Projects</strong>') ?></div>
	<div><?php previous_posts_link('<strong>Current Projects &raquo;</strong>') ?></div>
</div>

<?php else : ?>

<?php # TODO: Better 404 handling. ?>
<h1>Not Found</h1>
<p>Sorry, but you are looking for something that isn't here.</p>

<?php include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>

<?php get_footer(); ?>
