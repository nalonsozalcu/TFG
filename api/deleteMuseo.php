<?php
	require_once '../config.php';
	
	$id = $_GET['id'];
	if(Museo::delete_by_id($id))
		header("location: ../dashboard/adminData.php?content=museos&ok=true");
	else
		header("location: ../dashboard/adminData.php?content=museos&ok=false");
	
	
?>