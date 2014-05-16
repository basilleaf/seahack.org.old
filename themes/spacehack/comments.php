<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

    # Don't show passwords there's a password
	if (!empty($post->post_password)) {
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
		    # and it doesn't match the cookie
			?>
			<?php
			return;
		}
	}
?>


<?php if ('open' == $post->comment_status) :

    # Has this user previously commented?
    $hascommented = ($comment_author != "" && $comment_author_email != "");
?>

<div id="discuss">
    <h2>Discuss</h2>
        <p class="comments-subscribe"><?php post_comments_feed_link('Subscribe to comments'); ?></p>

    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>

        <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>

    <?php else : ?>

    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">
        <div class="comment-content">
            <div class="input"><textarea name="comment" cols="60" rows="10"><?php
                contextual_echo(
                    array(
                        $_GET['comment'],
                        'share your thoughts…'
                        ),
                    '',
                    '',
                    htmlspecialchars
                ); ?></textarea></div>
        </div>

        <div class="comment-author">
            <div class="avatar">
                <?php echo get_avatar($comment_author_email, 50, get_bloginfo('stylesheet_directory').'/images/space-invader.png'); ?>
            </div>

    <?php if ($user_ID):
        # Switch between logged in user-credentials vs. input form: ?>
        <p>Logged in as
            <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php
                echo $user_identity;
            ?></a>.
            <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a>.
        </p>
        <?php elseif (false && $hascommented && !isset($_GET['ignore-saved-comment-info'])): ?>
		<input type="hidden" name="author" id="author" value="<?php echo $comment_author; ?>">
		<input type="hidden" name="email" id="email" value="<?php echo $comment_author_email; ?>">
		<input type="hidden" name="url" id="url" value="<?php echo $comment_author_url; ?>">

		<p>Welcome back, <?php echo $comment_author; ?>. <a class="forget" href="?ignore-saved-comment-info" title="Ignores your saved commentator profile information and lets you enter new information.">Log Out</a>.</p>

    <?php else : ?>
        <p><input type="text" name="author" id="comment-author" value="<?php echo $comment_author; ?>" size="22">
           <label for="comment-author">Name <?php if ($req) echo "<em>(required)</em>"; ?></label></p>

        <p><input type="email" name="email" id="comment-email" value="<?php echo $comment_author_email; ?>" size="22">
           <label for="comment-email">Email <em>(will not be published<?php if ($req) echo ", required"; ?>)</em></label></p>

        <p><input type="url" name="url" id="comment-url" value="<?php echo $comment_author_url; ?>" size="22">
           <label for="comment-url">Website</label></p>
    <?php endif; ?>
        </div>

        <p class="submit"><input name="submit" type="submit" value="Post It!"></p>
<?php do_action('comment_form', $post->ID); ?>
    </form>
</div>
<?php endif; // IFF: Comments require auth ?>
<?php endif; // IFF: Comments are open ?>

<?php if ($comments) : ?>
<br /><br />
	<ol id="comments" class="hfeed">
	<?php foreach ($comments as $comment) : ?>

		<li class="hentry comment" id="comment-<?php comment_ID() ?>">
            <?php if ($comment->comment_approved == '0') : ?>
			<p class="moderated"><em>Your comment is awaiting moderation.</em></p>
			<?php endif; ?>

    		<p class="author vcard">
            <?php echo str_replace(
                "class='", "class='photo ",
                get_avatar($comment, 50, get_bloginfo('stylesheet_directory').'/images/space-invader.png')
                ); ?>
    		<?php if(get_comment_author_url() != ''): ?>
    			<a class="fn url nickname" href='<?php echo get_comment_author_url() ?>'><?php comment_author() ?></a>
    		<?php else: ?>
    			<span class="fn nickname"><?php comment_author() ?></span>
    		<?php endif; ?>
    		</p>
            <p class="dtstart">
	            <span class='value-title' title='<?php comment_date("Y-m-d").comment_time("TH:i:sO"); ?>'></span>
                posted on <?php comment_date('M d, Y'); ?>:
            </p>
			<div class="entry-content">
				<?php comment_text() ?>
			</div>
		</li>
		<!-- /.hentry -->
	<?php endforeach; ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>
