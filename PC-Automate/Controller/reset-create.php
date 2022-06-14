<?php

session_start();

unset($_SESSION['c1']);
unset($_SESSION['c2']);
unset($_SESSION['c3']);
unset($_SESSION['c4']);
unset($_SESSION['c5']);
unset($_SESSION['c6']);
unset($_SESSION['c7']);
unset($_SESSION['c8']);
unset($_SESSION['c9']);
unset($_SESSION['c10']);

header("Location: ../create.php");

