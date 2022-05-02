<?php session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In</title>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/inc/bootstrap.inc.php"); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/views/inc/styles.inc.php"); ?>
</head>
<body>
    <div class="auth-wrapper">
    <div class="auth-form">
        <div class="msg">
            <?php
            if(isset($_SESSION['msg'])) {
                echo "<p>" . $_SESSION['msg'] . "</p>";
                unset( $_SESSION['msg']);
            }
            echo $_SESSION['temp'];
            ?>
        </div>
        <form action="http://blog.loc/server/routes/web.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">User Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.ru">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">User Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="****">
            </div>

            <button class="btn btn-primary w-100" name="action" value="login">Sign In</button>
        </form>
        <p style="text-align: center">Create account? <a href="http://blog.loc/views/auth/register.php">Sign Up</a></p>
    </div>
</div>
</body>
</html>