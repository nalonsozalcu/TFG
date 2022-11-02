<?php
require_once '../config.php';

$type = $_GET['type'];
$data_file = isset($_FILES['data']) ? $_FILES["data"] : null;

if($data_file && $data_file['name']!= ""){

    $file_name = $data_file['name'];
    $file_size =$data_file['size'];
    $file_tmp =$data_file['tmp_name'];
    $file_type=$data_file['type'];
    $file_ext=strtolower(end(explode('.',$file_name)));

    $extensions= array("csv","xlsx");

    if(in_array($file_ext,$extensions)=== false){
        header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&ext=false");
        exit(1);
    }

    if($file_size > 2097152){
        header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&tam=false");
        exit(1);
    }

    $dir="../files/data/";

    mkdir($dir);

    move_uploaded_file($file_tmp,$dir.$file_name);

    header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&ok=true");
 }else{
    header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&file=false");
 }



