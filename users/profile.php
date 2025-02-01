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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #f3f4f7, #e3e5ec);
        }

        .profile-container {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            gap: 20px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .profile-sidebar {
            width: 30%;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
            text-align: center;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .profile-sidebar img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid #fff;
            object-fit: cover;
        }

        .profile-sidebar h3 {
            margin-top: 10px;
            font-size: 24px;
            font-weight: bold;
        }

        .profile-sidebar p.user-role {
            font-size: 16px;
            font-style: italic;
        }

        .edit-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            background: #ff5a5f;
            padding: 10px;
            border-radius: 50%;
            text-decoration: none;
        }

        .help-menu p {
            font-size: 14px;
            margin-top: 20px;
        }

        .profile-details {
            width: 70%;
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .profile-details h4 {
            font-size: 20px;
            color: #333;
            border-bottom: 2px solid #2575fc;
            padding-bottom: 5px;
        }

        .profile-details p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }

        .skills, .experience {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .skills h4, .experience h4 {
            font-size: 18px;
            color: #2575fc;
        }

        .skills ul, .experience ul {
            list-style: none;
            padding: 0;
        }

        .skills ul li, .experience ul li {
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Left Sidebar -->
        <div class="profile-sidebar">
            <a href="editUserProfile.php" class="edit-badge"><i class="bi bi-pencil-fill"></i></a>
            <img src="../<?php echo $_SESSION['image']; ?>" alt="User-img">
            <h3><?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?></h3>
            <p class="user-role">Software Engineer</p>
            <div class="help-menu">
                <p>Need help updating your profile? <a href="../help.php" class="text-light"><i class="bi bi-question-circle"></i></a></p>
            </div>
        </div>
        <!-- Right Content -->
        <div class="profile-details">
            <h4>Contact Information</h4>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Phone:</strong> ........</p>
            <p><strong>Sex:</strong> <?php echo $_SESSION['sex']; ?></p>
            <p><strong>Age:</strong> <?php echo $_SESSION['age']; ?></p>
            <p><strong>Job:</strong> <?php echo $_SESSION['job']; ?></p>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
