<?php
include '../include/connection.php';
session_start();
if (!isset($_SESSION['user_loggedin'])) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Page</title>
<!--external css-->
    <link rel="stylesheet" href="../css/userProfile.css">
    <!-- Custom CSS -->
    <style>
       
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Left Sidebar -->
        <div class="profile-sidebar">
            <a href="editUserProfile.php" class="edit-badge"><i> Edit</i></a>

            <img src="../<?php echo $_SESSION['image'];?>" alt="hhhhh">

            <?php
            //if user logged in
                if(isset($_SESSION['image'])){
                ?>
                    <img src="../<?php echo $_SESSION['image'];?>" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img' style="width: 50px; height: 50px; border-radius:50%;">
                <?php
                }
            //if user have not profile imaage
                else {
                    if($_SESSION['sex'] == 'Male'){
                        ?>
                            <img src="../images/male.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img1' style="width: 50px; height: 50px; border-radius:50%;">
                        <?php
                    }
                    else{
                        ?>
                            <img src="../images/female.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img2' style="width: 50px; height: 50px; border-radius:50%;">
                        <?php
                    }
                }
            ?>
            
            <h3><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></h3>
            <p class="user-role">Software Engineer</p>
            <div class="help-menu">
                <p>Need help updating your profile? <a href="../help.php#updateProfile" class="text-light"><i>help</i></a></p>
            </div>
        </div>
        <!-- Right Content -->
        <div class="profile-details">
            <form action="editUserProfile.php" class="profile-form" method="POST" enctype="multipart/form-data">
                <h4>Personal Information</h4>
                <p><strong>First Name:</strong> <input type="text"  value="<?php echo $_SESSION['firstName'];?>" disabled></p>
                <p><strong>Last Name:</strong> <input type="text" value="<?php echo $_SESSION['lastName'];?>" disabled></p>
                <p><strong>User Name:</strong> <input type="text" value="<?php echo $_SESSION['username'];?>" disabled></p>
                <p><strong>Email:</strong> <input type="email" value="<?php echo $_SESSION['email'];?>" disabled></p>
                <p><strong>Password:</strong> <input type="text" value="<?php echo  $_SESSION['password'];?>" disabled></p>
                <p><strong>Phone:</strong> <input type="text"></p>
                <p><strong>Sex:</strong> <?php echo $_SESSION['sex']; ?></p>
                <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
                <p><strong>Job:</strong> <?php echo $_SESSION['job']; ?></p>
                <p><strong>Username:</strong> </p>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS -->
</body>
</html>
