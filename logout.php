<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}

session_unset();
session_destroy();
header('Location: index.php?logout=success');
