<?php
require_once 'config.php';
require_once '../Model/database.php';
require_once '../Model/users.php';


session_start();


if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $role = 'builder';
    $cnumber = htmlspecialchars($_POST['cnumber']);
    $emonth = htmlspecialchars($_POST['emonth']);
    $eyear = htmlspecialchars($_POST['eyear']);
    $cvv = htmlspecialchars($_POST['cvv']);

    $database = new database();

    $checkName = $database->checkName("$name");
    if (empty($checkName)) {
        $checkEmail = $database->checkEmail("$email");
        if (empty($checkEmail)) {
            $newUser = new users (null, "$name", "$email", "$password", "$role", "$cnumber" , "$emonth", "$eyear", "$cvv");
            $database->insertUser($newUser);

            if ($database) {
                $_SESSION['alert'] = "<script>alert('Registration Successful! Please Login to continue!')</script>";
                header("Location: ../login.php");
            } else {
                $_SESSION['alert'] = "<script>alert('Whoops! Something Went Wrong!')</script>";
                header("Location: ../register.php");
            }
        } else {
            $_SESSION['alert'] = "<script>alert('Whoops! Email Already Exists.')</script>";
            header("Location: ../register.php");
        }
    }else{
        $_SESSION['alert'] = "<script>alert('Username already taken!')</script>";
        header("Location: ../register.php");
}










}
