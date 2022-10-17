<?php
	require_once '../config.php';
	
	$id = $_GET['id'];

	if(Usuario::delete_by_id($id))
		header("location: ../dashboard/adminUsersPage.php?ok=true");
	else
		header("location: ../dashboard/adminUsersPage.php?ok=false");
?>