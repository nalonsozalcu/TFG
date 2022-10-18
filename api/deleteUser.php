<?php
	require_once '../config.php';
	
	$id = $_GET['id'];

	if(Usuario::delete_by_id($id))
		header("location: ../dashboard/adminPage.php?content=users&ok=true");
	else
		header("location: ../dashboard/adminPage.php?content=users&ok=false");
?>