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
    <!-- external JS -->
     <script src="../javascript/edit-profile.js"></script>
</head>

<body>
    <div class="profile-container">
        <!-- Left Sidebar -->
        <div class="profile-sidebar">
            <div class="user-img-container">
                <?php
                //if user logged in
                    if(isset($_SESSION['image'])){
                    ?>
                        <img class="user-img" src="../<?php echo $_SESSION['image'];?>" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img'>
                    <?php
                    }
                    //if user have not profile imaage
                    else {
                        if($_SESSION['sex'] == 'Male'){
                            ?>
                                <img class="user-img" src="../images/male.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img1'>
                            <?php
                        }
                        else{
                            ?>
                                <img class="user-img" src="../images/female.jpg" title="<?php echo $_SESSION['firstName'].' ' . $_SESSION['lastName']; ?>" alt='User Img2'>
                            <?php
                        }
                    }
                ?>
                <div class="edit-pen-container">
                    <button class="edit-pen-btn" id="edit-pen-btn" onclick="editImage()">edit</button>
                </div>
            </div>
            <!-- Upload Image -->
            <div class="upload-btn-wrapper">
                <form action="../include/upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="profile-img" id="profile-img" class="profile-img" accept="image/*">
                    <input type="submit" value="Upload" name="upload" class="upload-btn" id="upload-btn">
                </form>
            </div>
            
            <h3><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></h3>
            <p class="user-role">Software Engineer</p>
            <div class="help-menu">
                <p>Need help updating your profile? <a href="../help.php#updateProfile" class="help"><i>help</i></a></p>
            </div>
        </div>
        <!-- Right Content -->
        <div class="profile-details">
            <form action="<?php echo $_SERVER['PHP_SELF']?>" class="profile-form" method="POST" enctype="multipart/form-data">
                <h4>Personal Information</h4>
                <p><strong>First Name:</strong> <input class="input-feild" type="text" name="first-name"  value="<?php echo $_SESSION['firstName'];?>" disabled></p>
                <p><strong>Last Name:</strong> <input class="input-feild" type="text" name="last-name" value="<?php echo $_SESSION['lastName'];?>" disabled></p>
                <p><strong>User Name:</strong> <input class="input-feild" type="text" name="user-name" value="<?php echo $_SESSION['username'];?>" disabled></p>
                <p><strong>Email:</strong> <input class="input-feild" type="email" name="email" value="<?php echo $_SESSION['email'];?>" disabled></p>
                <p><strong>Password:</strong> <input class="input-feild" type="text" name="password" value="<?php echo  $_SESSION['password'];?>" disabled></p>
                <p><strong>Phone:</strong> <input class="input-feild" type="text" name="phone" value="<?php echo  'phone';?>" disabled></p>
                <p><strong>Sex:</strong> <input class="input-feild" type="text" name="sex" value="<?php echo $_SESSION['sex'];?>" disabled></p>
                <p><strong>Age:</strong> <input class="input-feild" type="text" name="age" value="<?php echo $_SESSION['age'];?>" disabled></p>
                <p><strong>Job:</strong> <input class="input-feild" type="text" name="job" value="<?php echo $_SESSION['job'];?>" disabled></p>
                <input type="submit" value="Update" id="update-btn" class="update-btn">
            </form>
            <button name="edit-profile" id="edit-btn" class="edit-badge" onclick="edit()">Edit</button>

        </div>
    </div>
    <!-- external JS -->
</body>
</html>
