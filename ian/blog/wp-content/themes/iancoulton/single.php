	<?php get_header(); ?>

	<!-- main -->
    
    <div class="blog-cols">
        
        <?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
        
            <div class="post-single">
                
                <h2 class="title"><?php the_title(); ?></h2>
                
                <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumb">
                    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <?php endif; ?>
                
                <?php the_content(); ?>
                
                <?php comments_template(); ?>
                
            </div>
        
        <?php endwhile; ?>
            
        <?php endif; ?>
            
        <div class="cleaner" style="height: 30px;">&nbsp;</div>

    </div>
    
    <!-- end main -->
    
    <?php get_footer(); ?>