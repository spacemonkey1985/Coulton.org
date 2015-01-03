<?php 
	if (!isset($_SESSION)) {
    	session_start();
	}
	
	if(isset($_SESSION['bingoItems'])) {
		echo json_encode($_SESSION['bingoItems']);
	}
?>