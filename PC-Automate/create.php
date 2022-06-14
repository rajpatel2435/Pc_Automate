<?php

session_start();

unset($_SESSION['pr']);
unset($_SESSION['cat']);
unset($_SESSION['temPr']);

require_once 'Model/database.php';
require_once 'Model/products.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Welcome</title>

    <link rel="stylesheet" href="css/main.css">

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
                    <a class="nav-link active" aria-current="page" href="#">Make your PC</a>
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
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <h2 class="m-3">Select the components of your PC</h2>
            </div>
            <div class="col-sm-4 m-auto">
                <?php

                if (isset($_SESSION['id'])) {
                    if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) && isset($_SESSION['c10'])) {
                        echo '<button type="button" class="btn btn-success col-sm-6" onclick="share()">Share this template!</button>';
                        echo '<button type="button" class="btn btn-outline-warning col-sm-6" onclick="reset()">RESET</button>';
                    }
                    }else {
                if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) && isset($_SESSION['c10']) ) {
                    echo '<button type="button" class="btn btn-warning col-sm-8" onclick="login()">Login to Share this template!</button>';

                }}
                ?>
            </div>
        </div>
        <br />

        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Component</th>
                <th scope="col">Product</th>
                <th colspan="3" scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Remove</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Processor</th>
                <?php
                if (isset($_SESSION['c1'])){

                    $datebasec1 = new database();

                    $idc1 = $_SESSION['c1'];

                    $c1 = $datebasec1->findProduct("$idc1");
                    ?>
                    <td><?= $c1->getName()?></td>
                    <td colspan="3"><?= $c1->getDescription()?></td>
                    <td id="propr"><?= $c1->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c1')"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('processor')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Motherboard</th>
                <?php
                if (isset($_SESSION['c2'])){

                    $datebasec2 = new database();

                    $idc2 = $_SESSION['c2'];

                    $c2 = $datebasec2->findProduct("$idc2");
                    ?>
                    <td><?= $c2->getName()?></td>
                    <td colspan="3"><?= $c2->getDescription()?></td>
                    <td id="motpr"><?= $c2->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c2')"></button></td>
                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('motherboard')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">CPU Cooler</th>
                <?php
                if (isset($_SESSION['c3'])){

                    $datebasec3 = new database();

                    $idc3 = $_SESSION['c3'];

                    $c3 = $datebasec3->findProduct("$idc3");

                    ?>

                    <td><?= $c3->getName()?></td>
                    <td colspan="3"><?= $c3->getDescription()?></td>
                    <td id="coolpr"><?= $c3->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c3')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('cooler')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Case</th>
                <?php
                if (isset($_SESSION['c4'])){


                    $datebasec4 = new database();

                    $idc4 = $_SESSION['c4'];

                    $c4 = $datebasec4->findProduct("$idc4");

                    ?>

                    <td><?= $c4->getName()?></td>
                    <td colspan="3"><?= $c4->getDescription()?></td>
                    <td id="capr"><?= $c4->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c4')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('case')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">GPU</th>
                <?php
                if (isset($_SESSION['c5'])){

                    $datebasec5 = new database();

                    $idc5 = $_SESSION['c5'];

                    $c5 = $datebasec5->findProduct("$idc5");

                    ?>
                    <td><?= $c5->getName()?></td>
                    <td colspan="3"><?= $c5->getDescription()?></td>
                    <td id="gpr"><?= $c5->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c5')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('gpu')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">RAM</th>
                <?php
                if (isset($_SESSION['c6'])){

                    $datebasec6 = new database();

                    $idc6 = $_SESSION['c6'];

                    $c6 = $datebasec6->findProduct("$idc6");

                    ?>
                    <td><?= $c6->getName()?></td>
                    <td colspan="3"><?= $c6->getDescription()?></td>
                    <td id="rpr"><?= $c6->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c6')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('ram')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Storage</th>
                <?php
                if (isset($_SESSION['c7'])){

                    $datebasec7 = new database();

                    $idc7= $_SESSION['c7'];

                    $c7 = $datebasec7->findProduct("$idc7");
                    ?>

                    <td><?= $c7->getName()?></td>
                    <td colspan="3"><?= $c7->getDescription()?></td>
                    <td id="stopr"><?= $c7->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c7')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('storage')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Power Supply</th>
                <?php
                if (isset($_SESSION['c8'])){

                    $datebasec8 = new database();

                    $idc8 = $_SESSION['c8'];

                    $c8 = $datebasec8->findProduct("$idc8");
                    ?>

                    <td><?= $c8->getName()?></td>
                    <td colspan="3"><?= $c8->getDescription()?></td>
                    <td id="pospr"><?= $c8->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c8')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('power')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Monitor</th>
                <?php
                if (isset($_SESSION['c9'])){

                    $datebasec9 = new database();

                    $idc9 = $_SESSION['c9'];

                    $c9 = $datebasec9->findProduct("$idc9");

                    ?>
                    <td><?= $c9->getName()?></td>
                    <td colspan="3"><?= $c9->getDescription()?></td>
                    <td id="monpr"><?= $c9->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c9')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('monitor')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <th scope="row">Operating System</th>
                <?php
                if (isset($_SESSION['c10'])){

                    $datebasec9 = new database();

                    $idc10 = $_SESSION['c10'];

                    $c10 = $datebasec9->findProduct("$idc10");

                    ?>
                    <td><?= $c10->getName()?></td>
                    <td colspan="3"><?= $c10->getDescription()?></td>
                    <td id="ospr"><?= $c10->getPrice()?></td>
                    <td><button type="button" class="btn-close" aria-label="Close" onclick="removeProduct('c10')"></button></td>

                    <?php
                } else{
                    ?>
                    <td colspan="6"><button type="button" class="btn btn-secondary" onclick="search('os')">ADD</button></td>
                    <?php
                }
                ?>
            </tr>
            <tfoot>
            <tr>
                <th scope="col" colspan="5">Total</th>
                <th scope="col" id="sum"></th>
                <th scope="col"></th>

                <?php

                if (isset($_SESSION['id'])){
                    if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) && isset($_SESSION['c10']) ) {
                        echo '<th scope="col"><button type="button" class="btn btn-success" onclick="share()">BUY!</button></th>';
                    }
                    }else{
                if (isset($_SESSION['c1']) && isset($_SESSION['c2']) && isset($_SESSION['c3']) && isset($_SESSION['c4']) && isset($_SESSION['c5']) && isset($_SESSION['c6']) && isset($_SESSION['c7']) && isset($_SESSION['c8']) && isset($_SESSION['c9']) && isset($_SESSION['c10'])) {
                    echo '<th scope="col"><button type="button" class="btn btn-warning" onclick="login()">Login to BUY!</button></th>';
                }
                }

                ?>

            </tr>
            </tfoot>
            </tbody>
        </table>
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

    function search(x){
        location.href = 'search-product.php?category=' + x;

    }

    function removeProduct(x){
        location.href = 'Controller/remove-product.php?pid=' + x;
    }

    function share(){
        location.href = 'Controller/share-template.php';
    }


    function reset(){
        location.href = 'Controller/reset-create.php';
    }
    window.onload = addition();

    function addition(){

        let propr = document.getElementById("propr");
        if (!propr){
            propr = 0;
        }else{
            propr = propr.innerHTML.valueOf();
        }


        let motpr = document.getElementById("motpr");
        if (!motpr){
            motpr = 0;
        }else{
            motpr = motpr.innerHTML.valueOf();
        }


        let coolpr = document.getElementById("coolpr");
        if (!coolpr){
            coolpr = 0;
        }else{
            coolpr = coolpr.innerHTML.valueOf();
        }


        let capr = document.getElementById("capr");
        if (!capr){
            capr = 0;
        }else{
            capr = capr.innerHTML.valueOf();
        }


        let gpr = document.getElementById("gpr");
        if (!gpr){
            gpr = 0;
        }else{
            gpr = gpr.innerHTML.valueOf();
        }


        let rpr = document.getElementById("rpr");
        if (!rpr){
            rpr = 0;
        }else{
            rpr = rpr.innerHTML.valueOf();
        }


        let stopr = document.getElementById("stopr");
        if (!stopr){
            stopr = 0;
        }else{
            stopr = stopr.innerHTML.valueOf();
        }


        let pospr = document.getElementById("pospr");
        if (!pospr){
            pospr = 0;
        }else{
            pospr = pospr.innerHTML.valueOf();
        }


        let monpr = document.getElementById("monpr");
        if (!monpr){
            monpr = 0;
        }else{
            monpr = monpr.innerHTML.valueOf();
        }

        let ospr = document.getElementById("ospr");
        if (!ospr){
            ospr = 0;
        }else{
            ospr = ospr.innerHTML.valueOf();
        }

        let sum = Number(propr) + Number(motpr) + Number(coolpr) + Number(capr) + Number(gpr) + Number(rpr) + Number(stopr) + Number(pospr) + Number(monpr) + Number(ospr);

        document.getElementById("sum").innerHTML = '$' + sum;

        console.log(document.cookie = "price=" + sum);

    }






</script>
</body>
</html>


