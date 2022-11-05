<?php
require_once '../config.php';
require_once '../classes/Museo.php';
require_once '../classes/Restaurante.php';
require_once '../classes/Evento.php';
require_once '../classes/Monumento.php';

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

    require_once '../classes/PHPExcel.php';
    $archivo = $dir.$file_name;
    $inputFileType = PHPExcel_IOFactory::identify($archivo);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($archivo);
    $sheet = $objPHPExcel->getSheet(0); 
    $highestRow = $sheet->getHighestRow();
    
    if($type === "Museos"){
        for ($row = 2; $row <= $highestRow; $row++){
            if($sheet->getCell("A".$row)->getValue() != "")
                Museo::registrar($sheet->getCell("A".$row)->getValue(), $sheet->getCell("B".$row)->getValue(), 
                $sheet->getCell("C".$row)->getValue(),  $sheet->getCell("D".$row)->getValue(),  $sheet->getCell("E".$row)->getValue(), 
                $sheet->getCell("F".$row)->getValue(), $sheet->getCell("G".$row)->getValue(),  $sheet->getCell("H".$row)->getValue(),  
                $sheet->getCell("I".$row)->getValue(),  $sheet->getCell("J".$row)->getValue(),  $sheet->getCell("K".$row)->getValue(),  
                $sheet->getCell("L".$row)->getValue(), $sheet->getCell("M".$row)->getValue(), false);
        }
    }else if($type === "Restaurantes"){
        for ($row = 2; $row <= $highestRow; $row++){
            if($sheet->getCell("A".$row)->getValue() != "")
                Restaurante::registrar($sheet->getCell("A".$row)->getValue(), $sheet->getCell("B".$row)->getValue(), 
                $sheet->getCell("C".$row)->getValue(),  $sheet->getCell("D".$row)->getValue(),  $sheet->getCell("E".$row)->getValue(), 
                $sheet->getCell("F".$row)->getValue(), $sheet->getCell("G".$row)->getValue(),  $sheet->getCell("H".$row)->getValue(),  
                $sheet->getCell("I".$row)->getValue(),  $sheet->getCell("J".$row)->getValue(),  $sheet->getCell("K".$row)->getValue(), 
                $sheet->getCell("L".$row)->getValue(), false);
        }

    }else if($type === "Monumentos"){
        for ($row = 2; $row <= $highestRow; $row++){
            if($sheet->getCell("A".$row)->getValue() != "")
                Monumento::registrar($sheet->getCell("A".$row)->getValue(), $sheet->getCell("B".$row)->getValue(), 
                $sheet->getCell("C".$row)->getValue(),  $sheet->getCell("D".$row)->getValue(),  $sheet->getCell("E".$row)->getValue(), 
                $sheet->getCell("F".$row)->getValue(), $sheet->getCell("G".$row)->getValue(),  $sheet->getCell("H".$row)->getValue(),  
                $sheet->getCell("I".$row)->getValue(),  $sheet->getCell("J".$row)->getValue(),  $sheet->getCell("K".$row)->getValue(),  
                $sheet->getCell("L".$row)->getValue(), $sheet->getCell("M".$row)->getValue(), false);
        }

    }else if($type === "Eventos"){
        for ($row = 2; $row <= $highestRow; $row++){
            if($sheet->getCell("A".$row)->getValue() != "")
                Evento::registrar($sheet->getCell("A".$row)->getValue(), $sheet->getCell("B".$row)->getValue(), 
                $sheet->getCell("C".$row)->getValue(),  $sheet->getCell("D".$row)->getValue(),  $sheet->getCell("E".$row)->getValue(), 
                $sheet->getCell("F".$row)->getValue(), $sheet->getCell("G".$row)->getValue(),  $sheet->getCell("H".$row)->getValue(),  
                $sheet->getCell("I".$row)->getValue(),  $sheet->getCell("J".$row)->getValue(),  $sheet->getCell("K".$row)->getValue(),  
                $sheet->getCell("L".$row)->getValue(), $sheet->getCell("M".$row)->getValue(), $sheet->getCell("N".$row)->getValue(),
                $sheet->getCell("O".$row)->getValue(), $sheet->getCell("P".$row)->getValue(), $sheet->getCell("Q".$row)->getValue(),
                $sheet->getCell("R".$row)->getValue(), $sheet->getCell("S".$row)->getValue(),$sheet->getCell("O".$row)->getValue(),
                $sheet->getCell("P".$row)->getValue(), false);
        }
    }
    unlink($dir.$file_name);

    header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&ok=true");
 }else{
    header("location: ../dashboard/adminPage.php?content=up_massive&type=$type&file=false");
 }
 ?>




