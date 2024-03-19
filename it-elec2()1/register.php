<?php
require_once "includes/config.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php

echo $_SESSION["username"];
?>
    <a href="index.php">Home</a> |
    <a href="comments.php">Comments</a> |
    <a href="register.php">Register</a> |
    <a href="login.php">Login</a><br /><br />

    <form action="includes/register.inc.php" method="post">
        <div>
            <input type="text" name="username" placeholder="Username" />
        </div>
        <div>
            <input type="password" name="pwd" placeholder="Password" />
        </div>
        <div>
            <input <?= isset($_SESSION['errorEmail']) ? 'style="border: 1px solid red;"' : '' ?> type="text" name="email" placeholder="E-mail" /></br>
            <?= isset($_SESSION['errorEmail']) ? $_SESSION['errorEmail'] : '' ?>
            </div>
        <button>Signup</button>
        
    </form>

    <?php
    unset($_SESSION['errorUsername']);
    unset($_SESSION['errorPassword']);
    unset($_SESSION['errorEmail']);
    ?>

</body>

</html>