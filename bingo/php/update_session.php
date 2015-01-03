<?php 
	if (!isset($_SESSION)) {
    	session_start();
	}
	
	if(isset($_GET['id']) && isset($_GET['value'])) {
		if(isset($_SESSION['bingoItems'])) {
			$items = $_SESSION['bingoItems'];
			
			$items[$_GET['id']][2] = $_GET['value'];
			
			$_SESSION['bingoItems'] = $items;
			
			echo json_encode($_SESSION['bingoItems']);
		}
	}
?>