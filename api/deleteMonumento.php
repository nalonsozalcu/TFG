<?php
	require_once '../config.php';
	
	$id = $_GET['id'];
	if(Monumento::delete_by_id($id))
		header("location: ../dashboard/adminData.php?content=monumentos&ok=true");
	else
		header("location: ../dashboard/adminData.php?content=monumentos&ok=false");
	
	
?>