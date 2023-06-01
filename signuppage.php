<?php
session_start();
if(isset($_SESSION['login'])){
    header('Location: account.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['submit'] = $_POST['submit'];
    header('Location: signup.php');
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
    <title>Register</title>
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
                <h1>create account</h1>
                <h2>to create an account, </br> please enter your details</h2>
                <div class="user-input">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <ol>
                            <li>
                                <h5>name *</h5>
                                <input type="text" name="username">
                                <?php
                                if(isset($_SESSION['e-username'])){
                                    echo '<h4>'.$_SESSION['e-username'].'</h4>';
                                    unset($_SESSION['e-username']);
                                }
                                ?>
                            </li>
                            <li>
                                <h5>password *</h5>
                                <input type="password" name="password">
                                <?php
                                if(isset($_SESSION['e-password'])){
                                    echo '<h4>'.$_SESSION['e-password'].'</h4>';
                                    unset($_SESSION['e-password']);
                                }
                                ?>
                            </li>
                            <li>
                                <h5>email *</h5>
                                <input type="text" name="email">
                                <?php
                                if(isset($_SESSION['e-email'])){
                                    echo '<h4>'.$_SESSION['e-email'].'</h4>';
                                    unset($_SESSION['e-email']);
                                }
                                ?>
                            </li>
                        </ol>
                        <button type="submit" name="submit">create account</button>
                        <a href="index.php">Sign In</a>
                    </form>
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