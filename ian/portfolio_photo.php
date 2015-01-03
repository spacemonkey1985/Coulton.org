<?php
	
	require_once("includes/phpFlickr.php");
	$f = new phpFlickr("c4a547dae2fa533a736d60c868938945", "2a80db10210fa483");
	
	//$f->enableCache("fs", "cache");
	
	function curPageURL() {
		if (!empty($_SERVER['REQUEST_URI'])) { 
			$uri = $_SERVER['REQUEST_URI']; 
   		} 
		else { 
      		$uri = $_SERVER['SCRIPT_NAME']; 
      		if (!empty($_SERVER['QUERY_STRING'])) { 
         		$uri .= '?'.$_SERVER['QUERY_STRING']; 
      		} 
      		$_SERVER['REQUEST_URI'] = $uri;  
   		}
   		
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$uri;
		} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$uri;
		}
		
		return $pageURL;
	}
	
?>
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
        
        <div class="portfolio">

			<div style="float: left;">
                <img src="images/home_title.png" alt="My Portfolio" class="portfolio-title" />
                <br />
                <?php
                	if(isset($_GET['set'])){
						$set_title = $f->photosets_getInfo(0, $_GET['set']);
						echo "<h3>" . $set_title['title'] . "</h3>";
					}
					else{
						echo "<h3>All my photo's</h3>";
					}
				?>
        	</div>

        	<div class="sets">
            	<h3>My sets</h3>
                <?php
					$setpage = isset($_GET['setpage']) ? $_GET['setpage'] : 1;
					
					$sets = $f->photosets_getList("75325635@N02", $setpage, 7);

					foreach($sets['photoset'] as $set){
						echo "<div class='set'>";
						echo "<a href='portfolio.php?set=" . $set['id'] . "'>" . $set['title'] . "</a>";
						echo "</div>";
					}
				
					$next_setpage = $setpage + 1;
					$prev_setpage = $setpage - 1;
					
					$setpages = $sets['pages'];
					
					echo "<div class='set-navigation'>";
					
					if($setpages > 1){
						if(strpos(curPageURL(),'setpage') === false){
							if($setpage == 1){
								if(strpos(curPageURL(),'?') === false){ 
									echo "<a href='" . curPageURL() . "?setpage=2'>Next &raquo;</a>"; 
								}
								else{ 
									echo "<a href='" . curPageURL() . "&setpage=2'>Next &raquo;</a>";	
								}
							}
							else if($setpage == $setpages){
								if(strpos(curPageURL(),'?') === false){ 
									echo "<a href='" . curPageURL() . "?setpage=" . $prev_setpage . "'>&laquo; Prev</a>";
								}
								else{
									echo "<a href='" . curPageURL() . "&setpage=" . $prev_setpage . "'>&laquo; Prev</a>";
								}
							}
							else{
								if(strpos(curPageURL(),'?') === false){
									echo "<a href='" . curPageURL() . "?setpage=" . $prev_setpage . "'>&laquo; Prev</a>&nbsp;&nbsp;<a href='" . curPageURL() . "?setpage=" . $next_setpage . "'>Next &raquo;</a>";
								}
								else{
									echo "<a href='" . curPageURL() . "&setpage=" . $prev_setpage . "'>&laquo; Prev</a>&nbsp;&nbsp;<a href='" . curPageURL() . "&setpage=" . $next_setpage . "'>Next &raquo;</a>";
								}
							}				
						}
						else{
							if($setpage == 1){
								echo "<a href='" . str_replace("setpage=" . $setpage, "setpage=" . $next_setpage, curPageURL()) . "'>Next &raquo;</a>";
							}
							else if($setpage == $setpages){
								echo "<a href='" . str_replace("setpage=" . $setpage, "setpage=" . $prev_setpage, curPageURL()) . "'>&laquo; Prev</a>";
							}
							else{
								echo "<a href='" . str_replace("setpage=" . $setpage, "setpage=" . $prev_setpage, curPageURL()) . "'>&laquo; Prev</a>&nbsp;&nbsp;<a href='" . str_replace("setpage=" . $setpage, "setpage=" . $next_setpage, curPageURL()) . "'>Next &raquo;</a>";
							}
						}
					}
					
					echo "</div>";
				?>
            </div>
        
        </div>
        
        <div class="portfolio-cols">
        	<?php
				$id = isset($_GET['id']) ? $_GET['id'] : NULL;
				
				// access the getInfo method, passing in the photo's id
				$photo = $f->photos_getInfo("$id");
				
				// pass the photo's id to the getSizes method to get the dimensions of our image
				$photosize = $f->photos_getSizes("$id");
				
				// we want the dimensions of the medium size which we get from the $photosize array in the previous line
				$size = $photosize[6];
				
				// again passing the photo's id through we get the context, which tells us which photos are before and after the current id
				if(isset($_GET['set'])){
					$context = $f->photosets_getContext($id, $_GET['set']);
				}
				else{
					$context = $f->photos_getContext("$id");
				}
				
				//  the buildPhotoURL method does pretty much what you'd expect - build the  photo URL, we pass in $photo and the size we require to return the  image URL e.g.  http://farm4.static.flickr.com/3108/3175330082_0bf4b22e47.jpg
				$photoUrl = $f->buildPhotoURL($photo['photo'], "Large");
				
				// This tells us who the owner of the photo is.
				// This is an important part to include as we want our gallery to show  only our photos and not pull in other users' photos - more of an  explanation about this in the notes at the end
				$owner = $photo["owner"]["username"];
				
				echo "<div class='photo-large-border'>";
				echo"<img src=\"$photoUrl\" width=\"$size[width]\" height=\"$size[height]\" alt=\"$photo[title]\" style='photo-large' />";
				echo "</div>";
				
				echo "<div class='photo-info'>";
				echo "<h2>" . $photo['photo']['title'] . "</h2>";
				echo "<b>Date taken: </b>" . $photo['photo']['dates']['taken'] . "<br /><br />";
				echo "<b>Description: </b><br />" . $photo['description'];
				echo "</div>";
				
				echo "<div class='cleaner'>&nbsp;</div>";
				echo "<hr />";
				
				echo "<div style='margin-left: -62px;'>";
				
				$photo_prev = $f->photos_getInfo($context['prevphoto']['id']);
				$photo_next = $f->photos_getInfo($context['nextphoto']['id']);
				
				if(isset($_GET['set'])){
					$context_prev = $f->photosets_getContext($context['prevphoto']['id'], $_GET['set']);
					$context_next = $f->photosets_getContext($context['nextphoto']['id'], $_GET['set']);
				}
				else{
					$context_prev = $f->photos_getContext($context['prevphoto']['id']);
					$context_next = $f->photos_getContext($context['nextphoto']['id']);
				}
				
				$photo_prevprev = $f->photos_getInfo($context_prev['prevphoto']['id']);
				$photo_nextnext = $f->photos_getInfo($context_next['nextphoto']['id']);
				
				if($context_prev['prevphoto']['id'] != 0 || $context_prev['prevphoto']['id'] != '')
				{
					echo "<div class='photo-thumb-border'>";
					echo "<div class='photo-thumb'>";
					echo isset($_GET['set']) ? "<a href='portfolio_photo.php?id=" . $context_prev['prevphoto']['id'] . "&set=" . $_GET['set'] . "'><img src=\"" . $f->buildPhotoURL($photo_prevprev['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>" : "<a href='portfolio_photo.php?id=" . $context_prev['prevphoto']['id']  . "'><img src=\"" . $f->buildPhotoURL($photo_prevprev['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
					echo "</div>";
					echo "</div>";
				}
				
				if($context['prevphoto']['id'] != 0 || $context['prevphoto']['id'] != ''){
					echo "<div class='photo-thumb-border'>";
					echo "<div class='photo-thumb'>";
					echo isset($_GET['set']) ? "<a href='portfolio_photo.php?id=" . $context['prevphoto']['id']  . "&set=" . $_GET['set'] . "'><img src=\"" . $f->buildPhotoURL($photo_prev['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>" : "<a href='portfolio_photo.php?id=" . $context['prevphoto']['id']  . "'><img src=\"" . $f->buildPhotoURL($photo_prev['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
					echo "</div>";
					echo "</div>";				
				}
				
				if($context['nextphoto']['id'] != 0 || $context['nextphoto']['id'] != ''){
					echo "<div class='photo-thumb-border'>";
					echo "<div class='photo-thumb'>";
					echo isset($_GET['set']) ? "<a href='portfolio_photo.php?id=" . $context['nextphoto']['id']  . "&set=" . $_GET['set'] . "'><img src=\"" . $f->buildPhotoURL($photo_next['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>" : "<a href='portfolio_photo.php?id=" . $context['nextphoto']['id']  . "'><img src=\"" . $f->buildPhotoURL($photo_next['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
					echo "</div>";
					echo "</div>";
				}
				
				if($context_next['nextphoto']['id'] != 0 || $context_next['nextphoto']['id'] != ''){
					echo "<div class='photo-thumb-border'>";
					echo "<div class='photo-thumb'>";
					echo isset($_GET['set']) ? "<a href='portfolio_photo.php?id=" . $context_next['nextphoto']['id']  . "&set=" . $_GET['set'] . "'><img src=\"" . $f->buildPhotoURL($photo_nextnext['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>" : "<a href='portfolio_photo.php?id=" . $context_next['nextphoto']['id']  . "'><img src=\"" . $f->buildPhotoURL($photo_nextnext['photo'], "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
					echo "</div>";
					echo "</div>";
				}
				
				echo "</div>";
				
				echo "<div class='cleaner'>&nbsp;</div>";
				
				echo "<div style='margin-top: 30px; float: right; text-align: right;'>";
				
				if($context['prevphoto']['id'] == 0 || $context['prevphoto']['id'] == ''){
					echo isset($_GET['set']) ? "<div class='next-btn' style='margin-right: 0px;'><a href='portfolio_photo.php?id=" . $context['nextphoto']['id'] . "&set=" . $_GET['set'] . "'>Next</a></div>" : "<div class='next-btn' style='margin-right: 0px;'><a href='portfolio_photo.php?id=" . $context['nextphoto']['id'] . "'>Next</a></div>";
				}
				else if($context['nextphoto']['id'] == 0 || $context['nextphoto']['id'] == ''){
					echo isset($_GET['set']) ? "<div class='back-btn' style='margin-left: 15px;'><a href='portfolio_photo.php?id=" . $context['prevphoto']['id'] . "&set=" . $_GET['set'] . "'>Prev</a></div>" : "<div class='back-btn' style='margin-left: 15px;'><a href='portfolio_photo.php?id=" . $context['prevphoto']['id'] . "'>Prev</a></div>";
				}
				else{
					echo isset($_GET['set']) ? "<div class='back-btn'><a href='portfolio_photo.php?id=" . $context['prevphoto']['id'] . "&set=" . $_GET['set'] . "'>Prev</a></div><div class='next-btn'><a href='portfolio_photo.php?id=" . $context['nextphoto']['id'] . "&set=" . $_GET['set'] . "'>Next</a></div>" : "<div class='back-btn'><a href='portfolio_photo.php?id=" . $context['prevphoto']['id'] . "'>Prev</a></div><div class='next-btn'><a href='portfolio_photo.php?id=" . $context['nextphoto']['id'] . "'>Next</a></div>";
				}
				
				echo "<div class='cleaner'>&nbsp;</div>";
				
				echo "</div>";
			?>
        </div>
        
        <div class="cleaner" style="height: 30px;">&nbsp;</div>
            
        <div class="footer">
        
        	<?php include('includes/footer.php'); ?> 
        
        </div>
    
    </div>

</body>
</html>
