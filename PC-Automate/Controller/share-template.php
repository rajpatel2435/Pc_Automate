<?php

session_start();
require_once '../Model/database.php';
require_once '../Model/templates.php';

$database = new database();

$processor = $_SESSION['c1'];
$motherboard = $_SESSION['c2'];
$cooler = $_SESSION['c3'];
$cpucase = $_SESSION['c4'];
$gpu = $_SESSION['c5'];
$ram = $_SESSION['c6'];
$storage = $_SESSION['c7'];
$power = $_SESSION['c8'];
$monitor = $_SESSION['c9'];
$os = $_SESSION['c10'];
$price = $_COOKIE['price'];

$newTemplate = new templates(null, "$processor", "$motherboard", "$cooler", "$cpucase", "$gpu", "$ram", "$storage", "$power","$monitor","$os" ,"$price","Add a comment!");

$database->insertTemplates($newTemplate);

unset($_COOKIE['price']);

if ($database) {
    $_SESSION['alert'] = "<script>alert('Template shared Successfully!')</script>";
    header("Location: ../templates.php");

}else{
    $_SESSION['alert'] = "<script>alert('Some error occurred!')</script>";
    header("Location: ../templates.php");
}
