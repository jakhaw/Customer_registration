<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('Location: account.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $_SESSION['login_email'] = $_POST['login_email'];
        $_SESSION['login_password'] = $_POST['login_password'];
        $_SESSION['signin'] = $_POST['signin'];
        header('Location: login.php');
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
    <title>Login</title>
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
                <h1>account login</h1>
                <h2>to login, please enter </br> your email and password</h2>
                <div class="user-input">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <ol>
                            <li>
                                <input type="text" name="login_email" placeholder="Email:">
                            </li>
                            <li>
                                <input type="password" name="login_password" placeholder="Password:">
                            </li>
                        </ol>
                        <?php
                        if(isset($_SESSION['e-login'])){
                            echo '<h4>'.$_SESSION['e-login'].'</h4>';
                            unset($_SESSION['e-login']);
                        }
                        ?>
                        <button type="submit" name="signin">sign in</button>
                        <a href="signuppage.php">Create Account</a>
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