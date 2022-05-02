<?php
    require($_SERVER['DOCUMENT_ROOT'] . "/server/app/Database.php");
    class User {
        protected $conn;
        public function __construct() {
            $mysql = new Database();
            $this->conn = $mysql->connect();
        }

        public function email_unique($email) {
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $result = $this->conn->query($sql);
            return ($result->num_rows > 0) ? true : false;
        }

        public function register($data) {
            $email = $this->conn->real_escape_string($data['email']);

            if(!$this->email_unique($email)) {
                $name = $this->conn->real_escape_string($data['name']);
                $birth_date = $this->conn->real_escape_string($data['birth_date']);
                $avatar = $this->conn->real_escape_string($data['avatar']);
                $password = $this->conn->real_escape_string($data['password']);

                $sql = "INSERT INTO `users` (
                     `name`, 
                     `birth_date`, 
                     `avatar`, 
                     `email`, 
                     `password`, 
                     `role_id`, 
                     `is_verify`, 
                     `is_active`,
                     `created_at`
                     ) VALUES (
                        '$name',
                        '$birth_date',
                        '$avatar',
                        '$email',
                        '$password',
                        1,
                        0,
                        0,
                        now()
                     )";
                $result = $this->conn->query($sql);
                if($result) {
                    $_SESSION['msg'] = 'Account has been created!';
                    $this->verify_email([
                        'name' => $name,
                        'email' => $email
                    ]);
                    header("location:http://blog.loc/views/auth/login.php");
                } else {
                    $_SESSION['msg'] = 'Register failed!';
                    $_SESSION['query'] = $sql;
                    header("location:http://blog.loc/views/auth/register.php");
                }
            } else {
                $_SESSION['msg'] = 'Account exists!';
                header("location:http://blog.loc/views/auth/register.php");
            }
        }

        public function login($data) {
            $email = $this->conn->real_escape_string($data['email']);
            $password = $this->conn->real_escape_string($data['password']);
            $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
            $result = $this->conn->query($sql);
            $user = $result->fetch_assoc();
           if($user['is_verify'] == 1) {
               $_SESSION['user'] = $user;
               header("location:http://blog.loc/views/home.php");
           }
        }

        public function verify_email($data) {
            $name = $data['name'];
            $email = $data['email'];
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $result = $this->conn->query($sql);
            $user = $result->fetch_assoc();
            $user_id = base64_encode($user['id']);
            $template = "";
            $template .= "
                <div>
                    <h2>Hello dear {$name}</h2>
                    <a href='http://blog.loc/server/routes/web.php?action=verify_email&user_id=$user_id'>Click To Verify</a>
                </div>
            ";
            $headers = "";
            $headers .= "Content-Type: text/html; charset=utf-8 \r\n";
            $headers .= "From: Blog \r\n";
            mail($email, "Verify account", $template, $headers);
        }

        public function verify_update($user_id) {
            $sql = "UPDATE `users` SET `is_verify` = 1 WHERE `id` = $user_id";
            $result = $this->conn->query($sql);
            $_SESSION['msg'] = 'Account has been activated!';
            header("location:http://blog.loc/views/auth/login.php");
        }

        public function logout() {
        }
    }

    /*$user = new User();
    $user->verify_email([
        'name' => "John",
        'email' => 'manasyan.tigran@mail.ru'
    ]);*/