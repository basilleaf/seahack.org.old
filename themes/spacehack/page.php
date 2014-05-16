<?php
add_body_class("standlone");
get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="hentry post" id="post-<?php the_ID(); ?>">
		<h1><?php the_title(); ?></h1>
		<?php the_content('<p>Read the rest of this page &raquo;</p>'); ?>
		<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
		<?php edit_post_link('Edit this page.', '<p>Admin: ', '</p>'); ?>
	</div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
