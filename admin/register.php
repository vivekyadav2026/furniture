<?php
session_start();
require_once '../config/db.php';

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    if ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters!";
    } else {
        // Check if username exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $error = "Username already exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO admin_users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashed_password])) {
                $success = "Registration successful! You can now sign in.";
            } else {
                $error = "Registration failed. Please try again.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Registration - FurnishHut Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="auth-body">
    <div class="auth-overlay"></div>
    <div class="auth-card">
        <h2><i class="fa-solid fa-crown" style="color: var(--primary); margin-right: 10px;"></i>FurnishHut</h2>
        <p class="subtitle">Create a new admin account</p>
        
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; text-align: center; margin-bottom: 20px; font-weight: 500;">
                <?= $error ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div style="background: rgba(80, 205, 137, 0.1); color: var(--success); padding: 10px; border-radius: 6px; text-align: center; margin-bottom: 20px; font-weight: 500;">
                <?= $success ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Username</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-user" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="text" name="username" class="form-control" style="padding-left: 45px;" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="password" name="password" class="form-control" style="padding-left: 45px;" required>
                </div>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="password" name="confirm_password" class="form-control" style="padding-left: 45px;" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 15px; margin-top: 10px;">Register Account</button>
        </form>
        <div style="text-align: center; margin-top: 25px;">
            <a href="login.php" style="color: var(--text-muted); font-size: 13px;">Already have an account? <span style="color: var(--primary); font-weight: 600;">Sign In Here</span></a>
        </div>
    </div>
</body>
</html>
