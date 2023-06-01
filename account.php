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
    <link href="https://fonts.googleapis.com/css2?family=Nova+Mono&family=Playfair:wght@400;700&display=swap" rel="stylesheet">
    <title>Account</title>
</head>
<body>
    <nav>
        <div class="header">
            <div class="brand">BrandName</div>
        </div>
    </nav>
    <main>
        <section>
            <div class="content">
                <h1>my account</h1>
                <div class="user-input">
                    <p>
                        <a href="logout.php">Logout</a>
                    </p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer">
            <div class="footer-copy">&copy; 2023</div>
            <div class="footer-content">Developed by Jakub Hawrylkowicz</div>
        </div>
    </footer>
</body>
</html>