	<?php get_header(); ?>

	<!-- main -->
    
    <div class="blog-cols">
        
        <div style="margin-left: -18px;">
        <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
        
            <div class="post">
                
                <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
                
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumb">
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <?php endif; ?>
                
                <?php the_excerpt(); ?>
                
                <div class="post-meta">
                    <?php the_time('F jS, Y') ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php the_category(', ') ?>
                </div>
                
            </div>
        
        <?php endwhile; ?>
        
        <!-- <div class="back-btn"><?php next_posts_link('Older') ?></div>&nbsp;&nbsp;<div class="next-ntn"><?php next_posts_link('Newer') ?></div> -->
            
        <?php else : ?>
        
            <h2>Nothing Found</h2>
            <p>Sorry, but there are no current blogs to be found here.</p>
            <p><a href="<?php echo get_option('home'); ?>">Return to the homepage</a></p>
        
        <?php endif; ?>	
            
        <div class="cleaner" style="height: 30px;">&nbsp;</div>

        </div>
    </div>
    
    <!-- end main -->
    
    <?php get_footer(); ?>