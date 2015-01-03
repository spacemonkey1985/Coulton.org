<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="keywords" content="digital photography portfolio, digital photography, photography, portfolio" />
<meta name="description" content="Ian Coulton's Digital Photography Portfolio." />
<title>Ian Coulton's Digital Photography Portfolio - Contact</title>
<link type="text/css" href="stylesheets/common.css" rel="stylesheet" />
</head>

<body oncontextmenu="return false;">

	<div class="wrapper">
    
    	<div class="header">
        
        	<a href="http://ian.coulton.org"><img src="images/logo.png" alt="Ian Coulton" class="logo" /></a>
            <div class="cleaner"></div>
            <div class="tag-line">Me, Myself and My Camera. Digital photography by <b>Ian Coulton</b>&nbsp;&nbsp;&nbsp;&nbsp;</div>
            
            <div class="menu">
            	<?php include('includes/menu.php'); ?>
            </div>
            
        	<div class="cleaner"></div>
            
        </div>
        
        <div class="contact">

			<img src="images/contact_title.png" alt="Hey there" class="contact-title" />
        
        </div>
        
        <div class="contact-cols">
        	
            <div class="contact-col">
            	<h4>Why not say hello or drop me a line via my social networks?</h4>
            	
 				<p>
                	You can message me directly at <a href="mailto:ian@coulton.org">ian@coulton.org</a> or using the form opposite.
                    <br /><br />
                    If you'd like to more about the photo's I take, purchase any of them for you own use or just to ask a general question then please feel free to use the contact form to message me directly. I will try and reply as soon as I can, so please be patient as I may not be able to get back to you straight away.
                    <br /><br />
                    Alternatively you can stay in touch or just say hi via one of the many social networks I belong to. Feel free to add me as a friend, join my groups or just message me on either <a href="http://www.facebook.com/ian.coulton.79" target="_blank">Facebook</a>, <a href="http://www.flickr.com/photos/rafcolt2012" target="_blank">Flickr</a> or <a href="http://uk.linkedin.com/pub/ian-coulton/9/47a/8aa" target="_blank">LinkedIn</a>.
                    <br /><br />
                    <div style="text-align: center; margin-top: 80px;">
                    	<a href="http://www.facebook.com/ian.coulton.79" target="_blank"><img src="images/facebook_logo.png" alt="Facebook" style="float: left; margin-left: 20px; margin-right: 30px;" /></a>
                        <a href="http://www.flickr.com/photos/rafcolt2012" target="_blank"><img src="images/flickr_logo.png" alt="Flickr" style="float: left; margin-right: 30px;" /></a>
                        <a href="http://uk.linkedin.com/pub/ian-coulton/9/47a/8aa" target="_blank"><img src="images/linked_in_logo.png" alt="LinkedIn" style="float: left;" /></a>
                    </div>
                </p>
                
            </div>
            
            <div class="contact-col" style="margin-right: 0px;">
            	<h2>Thanks! Your message is on its way. Before you go...</h2>
            	Thank you, your message has been received and I'll reply as soon as I can. Before you head off why not check out my writings at my <a href="blog/">blog</a>? You may find something of interest.
                <?php
					// Get the last 3 posts.
					require('blog/wp-blog-header.php');
				?>
				
				<ul>
				<?php 
					$posts = get_posts('numberposts=5&order=DESC&orderby=the_date');
					foreach ($posts as $post) : start_wp(); ?>
					<li style="border-bottom: 1px dotted #000; margin-bottom: 15px;"><b><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></b><br />    
					<?php the_excerpt(); ?></li>
					<?php
					endforeach;
				?>
				</ul>
            </div>
            
        </div>
        
        <div class="cleaner" style="height: 30px;">&nbsp;</div>
            
        <div class="footer">
        
        	<?php include('includes/footer.php'); ?> 
        
        </div>
    
    </div>

</body>
</html>
