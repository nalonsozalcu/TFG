<?php

require_once '../config.php';

$username = $_POST["username"] != "" ? $_POST["username"] : null;
$email = $_POST["email"] != "" ? $_POST["email"] : null;
$password = $_POST["password"] != "" ? $_POST["password"] : null;
$password2 = $_POST["password2"] != "" ? $_POST["password2"] : null;
$nombre = $_POST["nombre"] != "" ? $_POST["nombre"] : null;
$apellidos = $_POST["apellidos"] != "" ? $_POST["apellidos"] : null;
$avatar = isset($_FILES['avatar']) ? $_FILES["avatar"] : null;
$cat_museo = ($_POST['cat_museo']) ? $_POST["cat_museo"] : null;
$cat_monumento = ($_POST['cat_monumento']) ? $_POST["cat_monumento"] : null;
$cat_restaurante = ($_POST['cat_restaurante']) ? $_POST["cat_restaurante"] : null;
$cat_evento = ($_POST['cat_evento']) ? $_POST["cat_evento"] : null;
$audiencia = ($_POST['audiencia']) ? $_POST["audiencia"] : null;




if($avatar && $avatar['name']!= ""){

   $file_name = $avatar['name'];
   $file_size = $avatar['size'];
   $file_tmp = $avatar['tmp_name'];
   $file_type = $avatar['type'];
   $file_ext = strtolower(end(explode('.',$file_name)));

   $extensions= array("jpeg","jpg","png");

   if(in_array($file_ext,$extensions)=== false){
       header("location: ../dashboard/signupPage.php?ext=false");
       exit(1);
   }

   if($file_size > 2097152){
       header("location: ../dashboard/signupPage.php?tam=false");
       exit(1);
   }

   $dir="../files/users/".$username."/";
   mkdir($dir);

   move_uploaded_file($file_tmp,$dir.$file_name);
}

if (Usuario::existeUsuario($email))
   header("location: ../dashboard/signupPage.php?userexists=true");
else if ($password != $password2)
   header("location: ../dashboard/signupPage.php?regpass=false");
else {
   if (Usuario::registrar($username, $email, $password, $nombre, $apellidos, $avatar['name'], $cat_museo, $cat_monumento, $cat_restaurante, $cat_evento, $audiencia))
      header("location: ../dashboard/loginPage.php");
}