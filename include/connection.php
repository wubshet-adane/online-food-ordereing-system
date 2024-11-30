<?php
    // Database connection
    $host = 'localhost';
    $db = 'onlineFoodOrderingSystem';
    $user = 'root';
    $pass = '';
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die('Database connection failed: ' . $conn->connect_error);
    }
?>