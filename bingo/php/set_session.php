<?php 
	if (!isset($_SESSION)) {
    	session_start();
	}
	
	if(isset($_GET['bingoItems'])) {
		$_SESSION['bingoItems'] = $_GET['bingoItems'];
	}
?>