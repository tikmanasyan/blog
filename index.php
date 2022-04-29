<style>
    table, th, tr, td {
        border:1px solid #02445f;
        border-collapse: collapse;
    }
    td {
        padding:10px;
    }
    thead {
        background-color: aquamarine;
    }
</style>
<?php
    $template = "";
    $template .= "<table>";
        $template .= "<thead>";
            $template .= "<tr>";
                $template .= "<th>#</th>";
                $template .= "<th>Name</th>";
                $template .= "<th>Price</th>";
                $template .= "<th>Qt</th>";
            $template .= "</tr>";
        $template .= "</thead>";
        $template .= "<tbody>";
            $template .= "<tr>";
                $template .= "<td>1</th>";
                $template .= "<td>Asus</td>";
                $template .= "<td>185.000</td>";
                $template .= "<td>13</td>";
            $template .= "</tr>";
            $template .= "<tr>";
                $template .= "<td>2</th>";
                $template .= "<td>Acer</td>";
                $template .= "<td>285.000</td>";
                $template .= "<td>8</td>";
            $template .= "</tr>";
        $template .= "</tbody>";
    $template .= "</table>";

    echo $template;


    $header = "Content-type:text/html;charset=UTF-8";

    mail("manasyan.tigran@mail.ru", "Test Mail", "սդսդ");

//
//CREATE TABLE users (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    name VARCHAR(40),
//    birth_date DATE,
//    avatar VARCHAR(100),
//    email VARCHAR(60) UNIQUE,
//    password VARCHAR(100),
//    role_id INT,
//    is_verify BOOLEAN,
//    is_active BOOLEAN,
//    reagistrerd_at TIMESTAMP,
//    verify_at TIMESTAMP,
//    last_login_at TIMESTAMP,
//    FOREIGN KEY(role_id) REFERENCES roles(id)
//);