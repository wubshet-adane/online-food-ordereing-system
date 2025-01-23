<?php
session_start();

//call database connection
    include "../include/connection.php";

// Handle login
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (empty($username) || empty($password)) {
        $message = 'Username and password are required.';
    } else {
        // Fetch user
        $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            // Verify password
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_loggedin'] =  true;
                $_SESSION['user_id'] =   $user['id'];
                $_SESSION['username'] =  $username;
                $_SESSION['firstName'] = $user['first_name'];
                $_SESSION['image'] =     $user['profileimage'];
                $_SESSION['lastName'] =  $user['last_name'];
                $_SESSION['email'] =     $user['email'];
                $_SESSION['password'] =  $user['password_hash'];
                $_SESSION['age'] =       $user['age'];
                $_SESSION['sex'] =       $user['sex'];
                $_SESSION['job'] =       $user['job'];
                header("Location: ../index.php?" . SID);
                exit;
            } else {
                $message = 'Invalid password.';
            }
        } else {
            $message = 'Invalid username or password.';
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
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background-image: url('https://z-p3-scontent.fadd2-1.fna.fbcdn.net/v/t39.30808-6/258410053_2942779072642419_6780024242328252411_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=cc71e4&_nc_ohc=TvTF0Eyxh1EQ7kNvgG3JTBQ&_nc_zt=23&_nc_ht=z-p3-scontent.fadd2-1.fna&_nc_gid=AsErKKj4ZLsxDSGK4-G7IE5&oh=00_AYCNZX7dFLxpDjqYh_NRh6L3ZMnjH7B00waAdCr-bcpdCw&oe=676F2556');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #FFCC00FF;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
        }
        .login-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .input-group-text {
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>
    <div class="login-container">
    <h2 class="login-title text-center text-uppercase fw-bold text-primary mb-4">
        <i class="bi bi-shop me-2"></i><br> 
        Debre Markos University Café Ordering System
    </h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger text-center"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="showPassword" style="border:1px solid blue;">
                    <label class="form-check-label" for="showPassword">Show password</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p>there is no created account<a href="register.php">click here</a></p>
        </form>
    </div>
    <script src="../javascript/passwords.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>