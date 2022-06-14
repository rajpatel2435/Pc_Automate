<?php

require_once '../Model/database.php';
require_once '../Model/products.php';
require_once '../Model/templates.php';

if (isset($_POST['submit'])) {
    $tid = $_GET['tid'];
    $comment = $_POST['comment'];

    $database = new database();

    $addComment = $database->addComment($comment, $tid);

    header("Location: ../templates.php");

}