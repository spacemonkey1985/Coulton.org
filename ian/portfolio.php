<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	
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

			<div style="postion: relative; float: left;">
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
						
						if(strpos(curPageURL(),'set=') === false){
							if(strpos(curPageURL(),'?') === false){ 
								echo "<a href='" . curPageURL() . "?set=" . $set['id'] . "'>" . $set['title'] . "</a>";
							}
							else{
								echo "<a href='" . curPageURL() . "&set=" . $set['id'] . "'>" . $set['title'] . "</a>";
							}
						}
						else{
							echo "<a href='" . str_replace("set=" . $_GET['set'], "set=" . $set['id'], curPageURL()) . "'>" . $set['title'] . "</a>";
						}
						
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
        	<div style="margin-left: -62px;">
            <?php
			
				$page = isset($_GET['page']) ? $_GET['page'] : 1;
				$next_page = $page + 1;
				$prev_page = $page - 1;
				
				if(isset($_GET['set'])){
					$photos = $f->photosets_getPhotos($_GET['set'],NULL,NULL,20, $page);
					
					$pages = $photos[photoset][pages]; 
				
					foreach ($photos ['photoset']['photo'] as $photo) {
						echo "<div class='photo-thumb-border'>";
						echo "<div class='photo-thumb'>";
						echo "<a href='portfolio_photo.php?id=" . $photo['id']  . "&set=" . $_GET['set'] . "'><img src=\"" . $f->buildPhotoURL($photo, "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
						echo "</div>";
						echo "</div>";
					}
					
					echo "<div class='cleaner'>&nbsp;</div>";
				
					echo "<div style='margin-top: 30px; float: right; text-align: right;'>";
					
					if($pages > 1){
						if($page == 1){
							echo isset($_GET['setpage']) ? "<div class='next-btn' style='margin-left: 15px;'><a href='portfolio.php?set=" . $_GET['set'] ."&page=2&setpage=" . $_GET['setpage'] . "'>Next</a></div>" : "<div class='next-btn' style='margin-left: 15px;'><a href='portfolio.php?set=" . $_GET['set'] ."&page=2'>Next</a></div>";
						}
						else if($page == $pages){
							echo isset($_GET['setpage']) ? "<div class='back-btn' style='margin-left: 15px; margin-right: 0px;'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $prev_page . "&setpage=" . $_GET['setpage'] . "'>Prev</a></div>" : "<div class='back-btn' style='margin-left: 15px; margin-right: 0px;'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $prev_page . "'>Prev</a></div>";
						}
						else{
							echo isset($_GET['setpage']) ? "<div class='back-btn'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $prev_page . "&setpage=" . $_GET['setpage'] . "'>Prev</a></div><div class='next-btn'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $next_page ."&setpage=" . $_GET['setpage'] . "'>Next</a></div>" : "<div class='back-btn'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $prev_page . "'>Prev</a></div><div class='next-btn'><a href='portfolio.php?set=" . $_GET['set'] ."&page=" . $next_page . "'>Next</a></div>";
						}
					}
				}
				else{
					$photos = $f->people_getPublicPhotos("75325635@N02",NULL, NULL, 20, $page);
				
					$pages = $photos[photos][pages]; 
				
					foreach ($photos ['photos']['photo'] as $photo) {
						echo "<div class='photo-thumb-border'>";
						echo "<div class='photo-thumb'>";
						echo "<a href='portfolio_photo.php?id=" . $photo['id']  . "'><img src=\"" . $f->buildPhotoURL($photo, "Large_Square") .  "\" alt=\"$photo[title]\" style='height: 160px;'  /></a>";
						echo "</div>";
						echo "</div>";
					}
					
					echo "<div class='cleaner'>&nbsp;</div>";
				
					echo "<div style='margin-top: 30px; float: right; text-align: right;'>";
					
					if($pages > 1){
						if($page == 1){
							echo isset($_GET['setpage']) ? "<div class='next-btn' style='margin-left: 15px;'><a href='portfolio.php?page=2&setpage=" . $_GET['setpage'] . "'>Next</a></div>" : "<div class='next-btn' style='margin-left: 15px;'><a href='portfolio.php?page=2'>Next</a></div>";
						}
						else if($page == $pages){
							echo isset($_GET['setpage']) ? "<div class='back-btn' style='margin-left: 15px; margin-right: 0px;'><a href='portfolio.php?page=" . $prev_page . "&setpage=" . $_GET['setpage'] . "'>Prev</a></div>" : "<div class='back-btn' style='margin-left: 15px; margin-right: 0px;'><a href='portfolio.php?page=" . $prev_page . "'>Prev</a></div>";
						}
						else{
							echo isset($_GET['setpage']) ? "<div class='back-btn'><a href='portfolio.php?page=" . $prev_page . "&setpage=" . $_GET['setpage'] . "'>Prev</a></div><div class='next-btn'><a href='portfolio.php?page=" . $next_page . "&setpage=" . $_GET['setpage'] . "'>Next</a></div>" : "<div class='back-btn'><a href='portfolio.php?page=" . $prev_page . "'>Prev</a></div><div class='next-btn'><a href='portfolio.php?page=" . $next_page . "'>Next</a></div>";
						}
					}
				}
				
				echo "<div class='cleaner'>&nbsp;</div>";
				echo "<b>Page " . $page . " of " . $pages . "</b>";
				
				echo "</div>";
			
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
