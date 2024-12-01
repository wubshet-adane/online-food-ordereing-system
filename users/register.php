<?php
session_start();

// Include database connection
include "../include/connection.php";

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $age = trim($_POST['age']);
    $sex = trim($_POST['sex']);
    $job = trim($_POST['job']);
    
    // Profile image handling
    $profile_image = null;
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["profile_image"]["name"]);
        $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image file type
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($image_file_type, $valid_extensions)) {
            if (move_uploaded_file($_FILES["profile_image"]["tmp_name"], $target_file)) {
                $profile_image = $target_file; // Save the uploaded file path
            } else {
                $message = 'Error uploading image.';
            }
        } else {
            $message = 'Invalid image format. Allowed formats are jpg, jpeg, png, gif.';
        }
    }

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($age) || empty($sex) || empty($job)) {
        $message = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Invalid email format.';
    } elseif ($password !== $confirm_password) {
        $message = 'Passwords do not match.';
    } else {
        // Check if username or email already exists
        $stmt = $conn->prepare('SELECT id FROM users WHERE username = ? OR email = ?');
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $message = 'Username or email already exists.';
        } else {
            // Hash the password
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // Insert user into the database
            $stmt = $conn->prepare('INSERT INTO users (first_name, last_name, username, email, password_hash, age, sex, profileimage, job) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bind_param('sssssssss', $first_name, $last_name, $username, $email, $password_hash, $age, $sex, $profile_image, $job);
            
            if ($stmt->execute()) {
                $message = 'Registration successful. You can now login.';
                header('Location: login.php');
                exit;
            } else {
                $message = 'Error registering user.';
            }
        }
        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .register-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }
        .register-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .input-group-text {
            background-color: #f1f3f5;
        }
        .custom-file-input {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2 class="register-title text-center text-uppercase fw-bold text-success mb-4">
            <i class="bi bi-person-plus me-2"></i> Register for Debre Markos University Café Ordering System 
        </h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-info text-center text-danger"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="register.php" enctype="multipart/form-data" id="registerForm">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter your first name" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter your last name" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Choose a username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <select class="form-select" id="sex" name="sex" required>
                    <option value="">Select your gender:</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="job" class="form-label">Job</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                    <input type="text" class="form-control" id="job" name="job" placeholder="Enter your job" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="profile_image" class="form-label">Profile Image</label>
                <input type="file" class="form-control" id="profile_image" name="profile_image">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100">Register</button>
        </form>
    </div>

    <script>
        // Basic validation script
        document.getElementById('registerForm').addEventListener('submit', function(event) {
            let password = document.getElementById('password').value;
            let confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
