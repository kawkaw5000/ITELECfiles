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
?>
    <a href="index.php">Home</a> |
    <a href="comments.php">Comments</a> |
    <a href="register.php">Register</a> |
    <a href="login.php">Login</a><br /><br />

    <form action="includes/register.inc.php" method="post">
        <div>
            <input type="text" name="username" placeholder="Username" <?= isset($_SESSION['errors']['username']) ? 'style="border: 1px solid red"' : '' ?> value="<?= !isset($_SESSION['errors']['username']) ? $_SESSION['inputs']['username'] : '' ?>" /></br>
            <?= isset($_SESSION['errors']['username']) ? $_SESSION['errors']['username'] : '' ?>
            </div>
        </div>
        <div>
            <input type="text" name="pwd" placeholder="Password" <?= isset($_SESSION['errors']['pwd']) ? 'style="border: 1px solid red"' : '' ?> /></br>
            <?= isset($_SESSION['errors']['pwd']) ? $_SESSION['errors']['pwd'] : '' ?>
            </div>
        </div>
        <div>
            <input type="text" name="email" placeholder="E-mail" <?= isset($_SESSION['errors']['email']) ? 'style="border: 1px solid red"' : '' ?> value="<?= !isset($_SESSION['errors']['email']) ? $_SESSION['inputs']['email'] : '' ?>" /></br>
            <?= isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : '' ?>
            </div>
        <button>Signup</button>
        
    </form>

    <?php
    unset($_SESSION['errors']);
    ?>

</body>

</html>