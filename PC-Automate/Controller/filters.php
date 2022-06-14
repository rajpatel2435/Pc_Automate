<?php

session_start();

unset($_SESSION['pr']);
unset($_SESSION['cat']);

require_once "../Model/database.php";
require_once "../Model/users.php";
require_once "../Model/products.php";
require_once "../Model/templates.php";

$_SESSION['pr'] = $_POST['price'];

$_SESSION['cat'] = $_POST['category'];

if (isset($_POST['submit'])){

    if (isset($_POST['price'])) {

        if (isset($_POST['price']) && ($_POST['category'] != 'select')){

            header("Location: ../shop.php?filter=withCat");

        }else{

            header("Location: ../shop.php?filter=onPr");

        }

    }else {
        header("Location: ../shop.php?filter=noCat");

    }

}else{
    header("Location: ../shop.php");
}
?>