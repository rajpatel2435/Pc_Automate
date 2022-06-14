<?php

session_start();

require_once '../Model/database.php';
require_once '../Model/products.php';
require_once '../Model/templates.php';
require_once '../Model/users.php';
require_once '../Model/orders.php';

if (isset($_POST['submit'])){

$cnumber = $_POST['cnumber'];
$emonth = $_POST['emonth'];
$eyear = $_POST['eyear'];
$cvv = $_POST['cvv'];

$database = new database();

$uid = $_SESSION['id'];

$buyUser = $database->findID("$uid");

if (($buyUser->getCNumber() == $cnumber) && ($buyUser->getEMonth() == $emonth) && ($buyUser->getEYear() == $eyear) && ($buyUser->getCVV() == $cvv)){

    if (isset($_SESSION['buyproduct'])){

        $order = $_SESSION['buyproduct'];

        $type = 'product';

    }elseif (isset($_SESSION['buytemplate'])){

        $order = $_SESSION['buytemplate'];

        $type = 'template';

    }

    $database1 = new database();

    $newOrder = new orders(null, "$uid", "$order", "$type");

    $database1->insertOrders($newOrder);

    if ($database1) {
        $_SESSION['alert'] = "<script>alert('Order Placed!')</script>";
        header("Location: ../index.php");
    }else{
        $_SESSION['alert'] = "<script>alert('There was some error placing your order!')</script>";
        header("Location: ../index.php");
    }
}else{

    if (isset($_SESSION['buyproduct'])){

        $pid = $_SESSION['buyproduct'];
        $_SESSION['alert'] = "<script>alert('Entered details are incorrect!')</script>";
        header("Location: ../cart.php?pid=$pid");

    }elseif (isset($_SESSION['buytemplate'])){

        $tid = $_SESSION['buytemplate'];

        $_SESSION['alert'] = "<script>alert('Entered details are incorrect!')</script>";
        header("Location: ../cart.php?tid=$tid");

    }

}

}