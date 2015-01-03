<? ob_start(); ?>
<?php 
	include('connect/db_connection.php');
		
	mysql_query("INSERT INTO purchases (productId, email)
	VALUES (" . $_POST['id'] . ", '" . $_POST['email'] . "')");
	
	mysql_close($conn);
	
	header('Location: ' . $_POST['link']);
?>
<? ob_flush(); ?>