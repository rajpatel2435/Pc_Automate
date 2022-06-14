<?php

session_start();

require_once "../Model/database.php";
require_once "../Model/users.php";
require_once "../Model/products.php";

$pid = $_GET['id'];

$database = new database();

$product = $database->findProduct("$pid");

$category = $product->getCategory();


switch ($category){

    case 'processor' :

        $_SESSION['c1'] = $pid;

        header("Location: ../create.php");

        break;


    case 'motherboard' :

        $_SESSION['c2'] = $pid;

        header("Location: ../create.php");

        break;



    case 'cooler' :

        $_SESSION['c3'] = $pid;

        header("Location: ../create.php");

        break;



    case 'case':

        $_SESSION['c4'] = $pid;

        header("Location: ../create.php");

        break;




    case 'gpu' :

        $_SESSION['c5'] = $pid;

        header("Location: ../create.php");


        break;


    case 'ram' :

        $_SESSION['c6'] = $pid;

        header("Location: ../create.php");

        break;




    case 'storage' :


        $_SESSION['c7'] = $pid;

        header("Location: ../create.php");

        break;

    case 'power' :

        $_SESSION['c8'] = $pid;

        header("Location: ../create.php");

        break;

    case 'monitor' :


        $_SESSION['c9'] = $pid;

        header("Location: ../create.php");

        break;

    case 'os' :

        $_SESSION['c10'] = $pid;

        header("Location: ../create.php");

        break;


}















?>