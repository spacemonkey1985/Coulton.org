<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta name="keywords" content="digital photography portfolio, digital photography, photography, portfolio" />
<meta name="description" content="Ian Coulton's Digital Photography Portfolio." />
<title>Ian Coulton's Digital Photography Portfolio - Portfolio</title>
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

			<img src="images/home_title.png" alt="My Portfolio" class="portfolio-title" />
            <br />
            <h3>Recently taken photo's</h3>
        
        </div>
        
        <div class="portfolio-cols">
        	<div style="margin-left: -62px;">
            <?php
			
			
				require_once("includes/phpFlickr.php");
				$f = new phpFlickr("c4a547dae2fa533a736d60c868938945", "2a80db10210fa483");
				
				$recent = $f->people_getPublicPhotos("75325635@N02");
				
				//print_r($recent);
				
				foreach ($recent ['photos']['photo'] as $photo) {
					echo "<div class='photo-thumb-border'>";
					echo "<div class='photo-thumb'>";
					echo "<a href='portfolio_photo.php?id=" . $photo['id']  . "'><img src=\"" . $f->buildPhotoURL($photo, "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
					echo "</div>";
					echo "</div>";
				}
				
			?>
            </div>
        </div>
        
        <div class="cleaner" style="height: 30px;">&nbsp;</div>
            
        <div class="footer">
        
        	<?php include('includes/footer.php'); ?> 
        
        </div>
    
    </div>

</body>
</html>
