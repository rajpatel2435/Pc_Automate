<?php

session_start();

unset($_SESSION['pr']);
unset($_SESSION['cat']);
unset($_SESSION['temPr']);

require_once 'Model/database.php';
require_once 'Model/products.php';
require_once 'Model/templates.php';
require_once 'Model/users.php';


if (isset($_SESSION['alert'])){
    echo $_SESSION['alert'];
    unset($_SESSION['alert']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Cart</title>

    <link rel="stylesheet" href="css/main.css">

    <style>

        body{
            background-color: #fcf6c5;

        }

        .left{
            float:left;
            position: fixed;
            width: 20%;
            height: 50vh;
            background-color: #00377a;
            color: #fcf6c5;
        }

        .right{
            float:right;
            width:70%;
            min-height: 100vh;
            overflow: hidden;

        }


    </style>

</head>

<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/logo1.png" alt="logo" width="75" height="75" class="d-inline-block align-text-top">
            </a>
            <?php
            if (isset($_SESSION['id'])){
                echo '<button class="btn btn-danger col-2 m-2" type="button" onclick="logout()">Logout</button>';
            }else{
                echo '<button class="btn btn-success col-2 m-2 ms-auto" type="button"  onclick="login()">Login</button>';
                echo '<button class="btn btn-warning col-2 m-2" type="button" onclick="register()">Register</button>';
            }
            ?>
        </div>
    </nav>
</header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="another">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PC Automate</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Make your PC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="templates.php">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="account.php">My Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-inline">

    <?php

    if (isset($_SESSION['id'])) {

    ?>
    <div class="left">
        <h3 class="m-2">Enter card details:</h3>
        <form method='POST' class="mx-4" action='Controller/buy.php' id='buy' name='buy'>
            <div class="mb-3">
                <label for="cnumber" class="form-label">Card Number</label><br />
                <input type="number" class="form-number" id="cnumber" name="cnumber" required>
            </div>
            <div class="row mb-3">
                <label for="emonth" class="col-sm-6 form-label">Expiry Month</label>
                <div class="col-sm-6">
                    <select class="form-select" id="emonth" name="emonth" required>
                        <option value="1" selected>1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="edate" class="col-sm-6 form-label">Expiry Date</label>
                <div class="col-sm-6">
                    <select class="form-select" id="eyear" name="eyear" required>
                        <option value="2021" selected>2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="cvv" class="col-sm-6 form-label">CVV</label><br />
                <div class="col-sm-6">
                <input type="number" class="col-sm-6 form-number" id="cvv" name="cvv" required>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-success col-sm-5" >PAY!</button>
        </form>

    </div>

    <div class="right">

    <?php


        if (isset($_GET['tid'])) {

            $tid = $_GET['tid'];

            $_SESSION['buytemplate'] = $tid;

            $database = new database();

            $buyProduct = $database->findTemplate("$tid");

            $buyProduct->buyTemplate();


        } elseif (isset($_GET['pid'])) {

            $pid = $_GET['pid'];

            $_SESSION['buyproduct'] = $pid;

            $database1 = new database();

            $buyProduct = $database1->findProduct("$pid");

            $buyProduct->buyProduct();

        }

    }else {

        echo '<h1 class="m-5" style="text-align: center;">You need to Login to BUY!</h1>';
    }

?>

    </div>

</div>

<script>
    function logout(){
        location.href = 'Controller/logout.php';
    }

    function  login(){
        location.href = 'login.php';
    }

    function register(){
        location.href = 'register.php';
    }
</script>
</body>
</html>

