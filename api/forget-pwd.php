<?php

require_once '../config.php';


echo '<script type="text/javascript">
alert("En breves te enviaremos una nueva contraseña");
window.location.href="../dashboard/index.php";
</script>';
$email = $_POST['email'];
$contr = rand();

$usuario = Usuario::get_user_from_email($_SESSION["email"]);
if ($usuario) {
    $usuario->updatePassword($const);
}

if (isset($_POST['email'])) {
mail($email, 'Recuperación de contraseña', 'Su nueva contraseña es:' + $contr);
header("location: ../dashboard/index.php");
}

?>