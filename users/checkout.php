<?php
    session_start();
    include '../include/connection.php';

    if(!isset($_SESSION['user_loggedin']) || !isset($_SESSION['user_id'])){
        header('location: login.php');
        exit();
    }
    else{
    ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>checkout</title>
            <link rel="stylesheet" href="../styles.css">
            <style>
                
            </style>
        </head>
        <body style="text-align:center;">
            <p><img src="<?php echo $_SESSION['image'];?>" alt="profile imag"></p>
            <p> Hello <?php echo $_SESSION['firstName'];?></p>
            <a href="../index.html">Back to home</a>
        </body>
        </html>
       
    <?php
    }
?>
