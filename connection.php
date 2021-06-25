<?php
        define('DB_NAME', 'biblioteka');
        define('DB_USER', 'root');
        define('DB_PASSWORD', '1qazXSW@');
        define('DB_HOST', 'localhost');

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
?>