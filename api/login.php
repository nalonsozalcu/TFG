<?php

require_once '../config.php';

login();

if($_SESSION["login"] == true) {
    header("location: ../dashboard/index.php");

} else{
    header("location: ../dashboard/loginPage.php?pass=false");
}


?>