<?php

session_start();
$filter = $_GET['filter'];

switch ($filter){

    case 'shop':
        unset($_SESSION['pr']);
        unset($_SESSION['cat']);

        header("Location: ../shop.php");

        break;

    case 'template':
        unset($_SESSION['temPr']);

        header("Location: ../templates.php");

        break;
}