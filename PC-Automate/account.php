<?php

session_start();

unset($_SESSION['pr']);
unset($_SESSION['cat']);
unset($_SESSION['temPr']);

require_once 'Model/database.php';
require_once 'Model/users.php';


$database = new Database();

$role = 'user';
if (isset($_SESSION['id'])){
$id = $_SESSION['id'];
$foundUser = $database->findID("$id");

$name = $foundUser->getName();
$password = $foundUser->getPassword();
$role = $foundUser->getRole();

}

if (isset($_SESSION['alert'])) {
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

    <title>My Account</title>

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
                    <a class="nav-link active" aria-current="page" href="#">My Account</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container-inline">
<?php

    switch ($role){
        case 'admin' :
            echo '<div class="container">';
            echo '<h1 class="m-5">Welcome, admin</h1>';
            echo '<p class="mx-5 mb-5">So, what you wanna do today?!</p>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-2" onclick="addProduct()">Add a Product</button>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-2" onclick="editProduct()">Edit a product</button>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-2" onclick="makepc()">Create a template</button>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-2" onclick="showOrders()">Show Orders</button>';
            echo '</div>';

            break;

        case 'builder' :
            echo '<div class="container">';
            echo '<h1 class="m-5">Welcome,'.$name.'</h1>';
            echo '<p class="mx-5 mb-5">So, what you wanna do today?!</p>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-2" onclick="makepc()">Create a template</button>';
            echo '</div>';

            break;

        case 'user' :
            echo '<div class="container">';
            echo '<h1 class="m-5">You are not Logged In</h1>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-4" onclick="login()">Login</button>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-4" onclick="register()">Register</button>';
            echo '</div>';

            break;

        default :
            echo '<div class="container">';
            echo '<h1 class="m-5">You are not Logged In now</h1>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-4" onclick="login()">Login</button>';
            echo '<button type="button" class="btn btn-info col-sm-5 mx-5 my-4" onclick="register()">Register</button>';
            echo '</div>';

            break;

}?>
</div>

<script>
    function login(){
        location.href = 'login.php'
    }

    function register (){
        location.href = 'register.php'
    }

    function logout(){
        location.href = 'Controller/logout.php'
    }

    function makepc(){
        location.href = 'create.php'
    }

    function addProduct(){
        location.href = 'add-product.php'
    }

    function  editProduct(){
        location.href = 'edit-product.php'
    }

    function showOrders(){
        location.href = 'orders.php'
    }
</script>
</body>
</html>


