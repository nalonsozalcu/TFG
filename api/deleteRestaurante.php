<?php
	require_once '../config.php';
	
	$id = $_GET['id'];
	if(Restaurante::delete_by_id($id))
		header("location: ../dashboard/adminData.php?content=restaurantes&ok=true");
	else
		header("location: ../dashboard/adminData.php?content=restaurantes&ok=false");
	
	
?>