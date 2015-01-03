<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/images/favicion.ico" />

<script src="<?php bloginfo('template_url'); ?>/js/jquery.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentform").validate({
		rules: {
			author: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			comment: {
				required: true,
				minlength: 2
			}
		},
		messages: {
			author: "Required",
			email: "Required, valid",
			comment: ""
		}
	});
});
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>

<body>

	<!-- header part -->
    
	<div class="wrapper">
    
    	<div class="header">
        
        	<a href="http://ian.coulton.org"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="Ian Coulton" class="logo" /></a>
            <div class="cleaner"></div>
            <div class="tag-line">Me, Myself and My Camera. Digital photography by <b>Ian Coulton</b>&nbsp;&nbsp;&nbsp;&nbsp;</div>
            
            <div class="menu">
            	<ul>
                	<li><a href="../index.php">Home</a></li>
                    <li><a href="../bio.php">Bio</a></li>
                    <li><a href="../portfolio.php">Portfolio</a></li>
                    <li class="current"><a href="index.php">Blog</a></li>
                    <li><a href="../contact.php">Contact</a></li>
                </ul>
            </div>
            
        	<div class="cleaner"></div>
            
        </div>
        
        <div class="blog">

			<div style="float: left;">
                <img src="<?php bloginfo('template_url'); ?>/images/blog_title.png" alt="Writings" class="blog-title" />
                <br />
                <?php if (is_category()) { ?>
                    <h3><?php single_cat_title(); ?></h3>
                <?php } elseif (is_month()) { ?>
                    <h3><?php the_time('F, Y'); ?></h3>
                <?php } else { ?>
					<h3>My journal and blog</h3>
				<?php } ?>
        	</div>

        	<div class="categories">
            	<?php get_sidebar(); ?>
            </div>
            
            <div class="cleaner"></div>
            
        </div>
    
    <!-- end header part -->