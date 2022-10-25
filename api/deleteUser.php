<?php
	require_once '../config.php';
	if($_GET['id'] == "session"){
		$id = $_SESSION["idUsuario"];
		if(Usuario::delete_by_id($id))
			header("location: logout.php");
		else
			header("location: ../dashboard/profilePage.php?delete=false");
	}else{
		$id = $_GET['id'];
		if(Usuario::delete_by_id($id))
			header("location: ../dashboard/adminPage.php?content=users&ok=true");
		else
			header("location: ../dashboard/adminPage.php?content=users&ok=false");
	}
	
?>