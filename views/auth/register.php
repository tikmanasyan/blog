<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create account</title>
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
                        echo "<p>" . $_SESSION['query'] . "</p>";
                        unset( $_SESSION['msg']);
                    }
                ?>
            </div>
            <form action="http://blog.loc/server/routes/web.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="John Smith">
                </div>

                <div class="mb-3">
                    <label for="birth_date" class="form-label">Birth Date</label>
                    <input type="date" class="form-control" id="birth_date" name="birth_date">
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">User Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.ru">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">User Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="****">
                </div>

                <button class="btn btn-success w-100" name="action" value="register">Sign Up</button>
            </form>
            <p style="text-align: center">Account exists? <a href="http://blog.loc/views/auth/login.php">Sign In</a></p>
        </div>
    </div>
</body>
</html>