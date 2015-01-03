<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="keywords" content="digital photography portfolio, digital photography, photography, portfolio" />
<meta name="description" content="Ian Coulton's Digital Photography Portfolio." />
<title>Ian Coulton's Digital Photography Portfolio - Contact</title>
<link type="text/css" href="stylesheets/common.css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript">

$().ready(function() {
	// validate the comment form when it is submitted
	$("#contactForm").validate({
		rules: {
			name: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			message: {
				required: true,
				minlength: 2
			}
		},
		messages: {
			name: "Required",
			email: "Required, valid",
			message: ""
		}
	});
});
</script>
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
            	<h2>Send me a personal message</h2>
            	
                <div style="margin-top: 10px; margin-left: -10px;">
                <form action="includes/send_email.php" method="post" id="contactForm" style="border: none;">
                    <fieldset style="border: none;">
                        <label for="author">Name</label>
                        <div class="cleaner"></div>
                        <input type="text" name="name" id="name" />
                        <div class="cleaner"></div>
                        <label for="email">Email</label>
                        <div class="cleaner"></div>
                        <input type="text" name="email" id="email" />
                        <div class="cleaner"></div>
                        <label for="comment">Message</label>
                        <div class="cleaner"></div>
                        <textarea name="message" id="message" rows="" cols=""></textarea>
                        <div class="cleaner"></div>
                        <input type="submit" class="submit" value="Send Message" />
                    </fieldset>
                </form>
                </div>
            </div>
            
        </div>
        
        <div class="cleaner">&nbsp;</div>
            
        <div class="footer">
        
        	<?php include('includes/footer.php'); ?> 
        
        </div>
    
    </div>

</body>
</html>
