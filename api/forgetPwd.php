<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

require_once '../config.php';

$email = isset($_POST["email"]) ? $_POST["email"] : null;
$contraseña = rand();

$usuario = Usuario::get_user_from_email($email);
if ($usuario) {
	$usuario->updatePassword($contraseña);
	$usuario->update();
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'neverainteligente2022@gmail.com';                     //SMTP username
    $mail->Password   = 'ycegjhxhpaimbhgo';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('neverainteligente2022@gmail.com', 'PlanWays');
    $mail->addAddress($email, );     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Recuperacion de contrasena';
    $mail->Body    = 'Se ha generado una nueva contraseña para que puedas iniciar sesión con tu correo en la aplicación de PlanWays. <br><br>' . 'Su nueva contraseña es:  ' . $contraseña;
    //$mail->AltBody = 'Se ha generado una nueva contraseña para que puedas iniciar sesión con tu correo en la aplicación de PlanWays';

    $mail->send();
	header("location: ../dashboard/index.php");
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>