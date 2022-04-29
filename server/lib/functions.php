<?php
    function inp($value) {
        return trim(htmlspecialchars($value));
    }

    function upload($file) {
        $file_name = $file['name'];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = time() . "_" . rand(1,15) . "." . $ext;
        $upload = move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/server/public/uploads/" . $new_file_name);
        if($upload) {
            return $new_file_name;
        } else {
            return "";
        }
    }

    function hash_pass($password) {
        return md5($password);
    }

    function print_r_pre($array) {
        echo "<pre>";
            print_r($array);
        echo "</pre>";
    }
