<?php

session_start();

unset($_SESSION['temPr']);
require_once "../Model/database.php";
require_once "../Model/users.php";
require_once "../Model/products.php";
require_once "../Model/templates.php";


if (isset($_POST['submit'])){

    $_SESSION['temPr'] = $_POST['price'];

    header("Location: ../templates.php?filter=filtered");

}else{
    header("Location: ../templates.php?filter=noFilter");
}
?>