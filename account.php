<?php
session_start();
if(!isset($_SESSION['login'])){
    header('Location: index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Account</title>
</head>
<body>
<section>
        <div class="content">
            <h1>Welcome to yout account</h1>
            <p>Check for new features</p>
            <div class="login">
                <p>
                    <a href="logout.php">Logout</a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>