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
    <title>Homepage</title>
</head>
<body>
    <section>
        <div class="content">
            <h1>Welcome to our website</h1>
            <p>Sign in to Your account</p>
            <div class="login">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                    <ol>
                        <li>
                            <p>email:</p>
                            <input type="text" name="login_email">
                        </li>
                        <li>
                            <p>password:</p>
                            <input type="password" name="login_password">
                        </li>
                    </ol>
                    <?php
                    if(isset($_SESSION['e-login'])){
                        echo '<h4>'.$_SESSION['e-login'].'</h4>';
                        unset($_SESSION['e-login']);
                    }
                    ?>
                    <button type="submit" name="signin">sign in</button>
                </form>
                <p>
                    <a href="signuppage.php">Create Account</a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>