<?php

session_start();

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

<div class="container">

    <h1 class="login-text m-3">Add a New Product</h1>

    <form action="Controller/create-product.php" enctype="multipart/form-data" id="addProduct" method="POST"
          onsubmit="return validate()">
        <div class="form-group row m-2">
            <label for="name" class="col-sm-4 col-form-label">Name</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="image" class="col-sm-4 col-form-label">Image</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" name="image[]" id="image">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="description" class="col-sm-4 col-form-label">Description</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="price" class="col-sm-4 col-form-label">Price</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" name="price" id="price">
            </div>
        </div>
        <div class="form-group row m-2">
            <label for="category" class="col-sm-4 col-form-label">Category</label>
            <div class="col-sm-8">
            <select class="form-control" aria-label="category" name="category" id="category">
                <option value="headphone" selected>Headphones</option>
                <option value="keyboard">Keyboards</option>
                <option value="mouse">Mouse</option>
                <option value="speaker">Speakers</option>
                <option value="processor">Processor</option>
                <option value="motherboard">Motherboard</option>
                <option value="cooler">CPU Cooler</option>
                <option value="case">Case</option>
                <option value="gpu">GPU</option>
                <option value="ram">RAM</option>
                <option value="storage">Storage</option>
                <option value="power">Power Supply</option>
                <option value="monitor">Monitor</option>
                <option value="os">Operating System</option>
            </select>
            </div>
        </div>
        <div class="form-group row m-2">
            <button type="submit" name="submit" class="btn btn-primary m-2">Add to Stock!</button>
        </div><br />
    </form>


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


    function validate(){
        let a = document.forms['addProduct']['name'].value;
        let b = document.forms['addProduct']['image'].value;
        let c = document.forms['addProduct']['description'].value;
        let d = document.forms['addProduct']['price'].value;

        if ((a == "" || a == null) || (b == "" || b == null) || (c == "" || c == null) || (d == "" || d == null)){
            alert("Please enter all the details to add the product!");
            return false;
        }

    }


</script>



</body>
</html>
