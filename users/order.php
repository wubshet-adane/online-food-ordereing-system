<?php
    session_start(); //session start
    require '../include/connection.php'; //include connection

    //check weather if the user is loggedin or not......if not loggedin redirect to login page.
    if(!isset($_SESSION['user_loggedin']) || !isset($_SESSION['user_id'])){
        header('location: login.php');
        exit();
    }
    else{
        echo 'add somthing here';
    }
?>