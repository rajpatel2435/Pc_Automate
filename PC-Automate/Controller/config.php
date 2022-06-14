<?php

session_start();

const serverName = "localhost";
const database = "pcautomate";
const username = "root";
const password = "";

const connectionString = "mysql:host=" . serverName . ";dbname=" . database;

try {
    $connection = new PDO(connectionString, username, password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exception) {
    die("Connection failed: {$exception->getMessage()}");
}
?>