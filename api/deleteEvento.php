<?php
	require_once '../config.php';
	
	$id = $_GET['id'];
	if(Evento::delete_by_id($id))
		header("location: ../dashboard/adminData.php?content=eventos&ok=true");
	else
		header("location: ../dashboard/adminData.php?content=eventos&ok=false");
	
	
?>