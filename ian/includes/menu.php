<?php
	$page = "";
	$page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	
	echo "<ul>";
    
	if(strtolower($page) == "index.php" || $page == ""){
		echo "<li class='current'><a href='index.php'>Home</a></li>";
	}
	else{
		echo "<li><a href='index.php'>Home</a></li>";
	}
	
    if(strtolower($page) == "bio.php"){
		echo "<li class='current'><a href='bio.php'>Bio</a></li>";
	}
	else{
		echo "<li><a href='bio.php'>Bio</a></li>";
	}
	
    if(stristr(strtolower($_SERVER["SCRIPT_NAME"]), 'portfolio') != ''){
		echo "<li class='current'><a href='portfolio.php'>Portfolio</a></li>";
	}
	else{
		echo "<li><a href='portfolio.php'>Portfolio</a></li>";
	}
	
	if(stristr(strtolower($_SERVER["SCRIPT_NAME"]), 'blog') != ''){
    	echo "<li class='current'><a href='blog/'>Blog</a></li>";
	}
	else{
		echo "<li><a href='blog/'>Blog</a></li>";
	}
	
	if(strtolower($page) == "contact.php" || strtolower($page) == "thankyou.php"){
    	echo "<li class='current'><a href='contact.php'>Contact</a></li>";
	}
	else{
		echo "<li><a href='contact.php'>Contact</a></li>";
	}
    
	echo "</ul>";

?>