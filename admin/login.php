<?php
session_start();
require_once '../config/db.php';

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Login - FurnishHut Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body class="auth-body">
    <div class="auth-overlay"></div>
    <div class="auth-card">
        <h2><i class="fa-solid fa-crown" style="color: var(--primary); margin-right: 10px;"></i>FurnishHut</h2>
        <p class="subtitle">Sign in to your admin panel</p>
        
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; text-align: center; margin-bottom: 20px; font-weight: 500;">
                <?= $error ?>
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
            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; font-size: 15px; margin-top: 10px;">Sign In</button>
        </form>
        <div style="text-align: center; margin-top: 25px;">
            <a href="register.php" style="color: var(--text-muted); font-size: 13px;">Don't have an account? <span style="color: var(--primary); font-weight: 600;">Register Here</span></a>
        </div>
    </div>
</body>
</html>
