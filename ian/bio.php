<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="keywords" content="digital photography portfolio, digital photography, photography, portfolio" />
<meta name="description" content="Ian Coulton's Digital Photography Portfolio." />
<title>Ian Coulton's Digital Photography Portfolio - Bio</title>
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
        
        <div class="bio">

			<img src="images/bio_title.png" alt="My Bio" class="bio-title" />
        
        </div>
        
        <div class="bio-cols">
        	
            <div class="bio-col">
            
            	<?php
					require('blog/wp-blog-header.php');
				?>
                
                <?php 
					// 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
					$page_id = 2; 
				
					// You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
					$page_data = get_page( $page_id ); 
					
					// echo the title
					echo '<h1>'. $page_data->post_title .'</h1>';
				
					// echo the content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
					echo apply_filters('the_content', $page_data->post_content); 
				?>
 
            </div>
            
            <div class="bio-col" style="margin-right: 0px;">
            
            	<?php 
					// 123 should be replaced with a specific Page's id from your site, which you can find by mousing over the link to edit that Page on the Manage Pages admin page. The id will be embedded in the query string of the URL, e.g. page.php?action=edit&post=123.
					$page_id = 6; 
				
					// You must pass in a variable to the get_page function. If you pass in a value (e.g. get_page ( 123 ); ), WordPress will generate an error. By default, this will return an object.
					$page_data = get_page( $page_id ); 
					
					// echo the title
					echo '<h1>'. $page_data->post_title .'</h1>';
				
					// echo the content and retain Wordpress filters such as paragraph tags. Origin from: http://wordpress.org/support/topic/get_pagepost-and-no-paragraphs-problem
					echo apply_filters('the_content', $page_data->post_content); 
				?>
                
            </div>
            
        </div>
        
        <div class="cleaner">&nbsp;</div>
            
        <div class="footer">
        
        	<?php include('includes/footer.php'); ?> 
        
        </div>
    
    </div>

</body>
</html>
