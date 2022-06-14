<?php

require_once 'config.php';
require_once '../Model/database.php';
require_once '../Model/users.php';


session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $database = new database();

    $result = $database->login($email,$password);                    //to check the username and password is right

    if (!empty($result)) {

        $_SESSION['id'] = $result->getID();
        $_SESSION['name'] = $result->getName();
        $_SESSION['email'] = $result->getEmail();
        $_SESSION['password'] = $result->getPassword();
        $_SESSION['role'] = $result->getRole();
        $_SESSION['cnumber'] = $result->getCNumber();
        $_SESSION['emonth'] = $result->getEMonth();
        $_SESSION['eyear'] = $result->getEYear();
        $_SESSION['cvv'] = $result->getCVV();
        header("Location: ../index.php");
    } else {
        $_SESSION['alert'] = "<script>alert('Whoops! Username or Password is Incorrect!')</script>";
        header("Location: ../login.php");

}}

