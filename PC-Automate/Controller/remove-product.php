<?php

session_start();

require_once "../Model/database.php";
require_once "../Model/users.php";
require_once "../Model/products.php";

$pid = $_GET['pid'];

switch ($pid){

    case 'c1' :

        unset($_SESSION['c1']);

        header("Location: ../create.php");

        break;


    case 'c2' :

        unset($_SESSION['c2']);

        header("Location: ../create.php");

        break;



    case 'c3' :

        unset($_SESSION['c3']);

        header("Location: ../create.php");

        break;



    case 'c4' :

        unset($_SESSION['c4']);

        header("Location: ../create.php");

        break;




    case 'c5' :

        unset($_SESSION['c5']);

        header("Location: ../create.php");


        break;


    case 'c6' :

        unset($_SESSION['c6']);

        header("Location: ../create.php");

        break;



    case 'c7' :

        unset($_SESSION['c7']);

        header("Location: ../create.php");

        break;


    case 'c8' :

        unset($_SESSION['c8']);

        header("Location: ../create.php");

        break;


    case 'c9' :

        unset($_SESSION['c9']);

        header("Location: ../create.php");

        break;

    case 'c10' :

        unset($_SESSION['c10']);

        header("Location: ../create.php");

        break;



}


?>