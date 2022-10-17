<?php

require_once '../config.php';

$email = isset($_POST["email"]) ? $_POST["email"] : null;
$contraseña = rand();

$usuario = Usuario::get_user_from_email($email);
if ($usuario) {
	$usuario->updatePassword($contraseña);
	$usuario->update();
}

if (isset($_POST['email'])) {
	mail($email, 'Recuperación de contraseña', 'Su nueva contraseña es:' . $contraseña);
	header("location: ../dashboard/index.php");
}

?>