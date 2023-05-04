<?php
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>
</head>
<body>
    <section>
        <div class="content">
            <h1>Welcome to our website</h1>
            <p>Create an account to stay up on date with our products</p>
            <div class="registration">
                <form action="signup.php" method="POST">
                    <ol>
                        <li>
                            <p>name:</p>
                            <input type="text" name="username">
                            <?php
                            if(isset($_SESSION['e-username'])){
                                echo '<h4>'.$_SESSION['e-username'].'</h4>';
                                unset($_SESSION['e-username']);
                            }
                            ?>
                        </li>
                        <li>
                            <p>password:</p>
                            <input type="password" name="password">
                            <?php
                            if(isset($_SESSION['e-password'])){
                                echo '<h4>'.$_SESSION['e-password'].'</h4>';
                                unset($_SESSION['e-password']);
                            }
                            ?>
                        </li>
                        <li>
                            <p>email:</p>
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
                </form>
                <p>
                    <a href="index.php">Sign In</a>
                </p>
            </div>
        </div>
    </section>
</body>
</html>