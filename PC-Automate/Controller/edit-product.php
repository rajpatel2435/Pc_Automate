<?php


require_once 'config.php';
require_once '../Model/database.php';
require_once '../Model/products.php';


if (isset($_POST['submit'])) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);
    $pid = $_SESSION['pid'];

    $database = new database();

    $updateProduct = $database->updateProducts("$pid", "$name", "$description","$category" ,"$price");

    $_SESSION['alert'] = "<script>alert('Product Updated Successfully!')</script>";
    header("Location: ../account.php");
}else{
    $_SESSION['alert'] = "<script>alert('Something went wrong!')</script>";
    header("Location: ../account.php");

}




?>

