
<?php
    // Database connection
    $host = 'localhost'; //server name is localhost.
    $db = 'onlineFoodOrderingSystem'; // created database name is onlineFoodOrderingSystem.
    $user = 'root';  //database user name is root.
    $pass = '';     //empty password.
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }

