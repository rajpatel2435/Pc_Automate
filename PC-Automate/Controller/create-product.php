<?php

require_once 'config.php';
require_once '../Model/database.php';
require_once '../Model/products.php';
require_once '../Model/users.php';

$id = htmlspecialchars($_SESSION['id']);
$name = htmlspecialchars($_POST['name']);
$price = htmlspecialchars($_POST['price']);
$category = htmlspecialchars($_POST['category']);
if (isset($_POST['submit'])) {

    if ($_FILES['image']['error'] != 4) {
        $description = htmlspecialchars(trim($_POST['description']));
        $image = $_FILES['image'];

        $database1 = new database();
        $newID = $database1->getLastID();
        $updateID = $newID + 1;
        $imageName = "{$updateID}product.png";

        $allowedImg = array(IMAGETYPE_PNG);
        $stringImg = implode( " ", $image['tmp_name']);
        $givenImg = exif_imagetype($stringImg);
        $foundInAllowedTypes = in_array($givenImg, $allowedImg);

        if ($foundInAllowedTypes) {
            move_uploaded_file($stringImg, './../images/products/' . $updateID . 'product.png');
            $database = new database();

            $newProducts = new products (null, "$name", "$imageName", "$description","$category", "$price");

            $database->insertProducts($newProducts);//to add a new product


            $_SESSION['alert'] = "<script>alert('Product Added Successfully!')</script>";
            header("Location: ../account.php");
        } else {
            $_SESSION['alert'] = "<script>alert('Image Type Not Allowed!')</script>";
            header("Location: ../add-product.php");
        }
    } else {
        $_SESSION['alert'] = "<script>alert('Please select a file to upload')</script>";
        header("Location: ../add-product.php");
    }
}