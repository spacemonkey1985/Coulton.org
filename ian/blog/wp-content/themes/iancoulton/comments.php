<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comment.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
		
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
    <?php
		return;
	}
?>
	<hr />
    
	<div id="comments" class="comments">
    <h3><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></h3>
    
    <?php if (have_comments()) : ?>
	
    <ol class="commentlist">
    	<?php wp_list_comments('avatar_size=64&type=comment'); ?>
        <div class="cleaner"></div>
	</ol>
    
    <?php if ($wp_query->max_num_pages > 1) : ?>
	<div class="pagination">
    	<ul>
        	<li class="older"><?php previous_comments_link('Older') ?></li>
            <li class="newer"><?php next_comments_link('Newer') ?></li>
		</ul>
    </div>
    <?php endif; ?>
	
    <?php endif; ?>
	
	</div>
    
    <?php if (comments_open ) : ?>
                
    <div id="respond" class="respond">	
        <h2>Leave a Comment</h2>
    
    	<div class="cleaner"></div>
    
    	<div style="margin-top: 40px; width: 560px; border: none;">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" style="border: none;">
        	<fieldset style="border: none;">
            	<label for="author">Name</label>
                <div class="cleaner"></div>
                <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" />
                <div class="cleaner"></div>
                <label for="email">Email</label>
                <div class="cleaner"></div>
                <input type="text" name="email" id="email" value="<?php $comment_author_email; ?>" />
                <div class="cleaner"></div>
                <label for="url">Website</label>
                <div class="cleaner"></div>
                <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" />
                <div class="cleaner"></div>
                <label for="comment">Message</label>
                <div class="cleaner"></div>
                <textarea name="comment" id="comment" rows="" cols=""></textarea>
                <div class="cleaner"></div>
                <input type="submit" src="<?php bloginfo('template_url'); ?>/images/send_btn.png" class="commentsubmit" value="Submit Comment" />
                
                <?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</fieldset>
		</form>
        </div>
        <p class="cancel"><?php cancel_comment_reply_link('Cancel Reply'); ?></p>
	</div>
    	<?php else: ?>
        	<h3>Comments are now closed.</h3>
	<?php endif; ?>
<!-- Comments -->
    