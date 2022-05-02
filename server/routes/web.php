<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/lib/functions.php");
    //Require Models
    require_once($_SERVER['DOCUMENT_ROOT'] . "/server/app/User.php");


    $action = "";
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else if(isset($_POST['action'])) {
        $action = $_POST['action'];
    }

    $user = new User();

    if($action === "register") {

        if(isset($_FILES['avatar'])) {
            $avatar = upload($_FILES['avatar']);
            if(isset($_POST['name']) && isset($_POST['birth_date']) && isset($_POST['email']) && isset($_POST['password'])) {
                $name = inp($_POST['name']);
                $birth_date = inp($_POST['birth_date']);
                $email = inp($_POST['email']);
                $password = inp(hash_pass($_POST['password']));

                $user->register([
                    'name' => $name,
                    'birth_date' => $birth_date,
                    'email' => $email,
                    'password' => $password,
                    'avatar' => $avatar
                ]);
            }
        }

    } else if($action === "login") {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $email = inp($_POST['email']);
            $password = inp(hash_pass($_POST['password']));

            $user->login([
                'email' => $email,
                'password' => $password
            ]);
        }
    } else if($action === "verify_email") {
        $id = base64_decode($_GET['user_id']);
        $user->verify_update($id);
    }