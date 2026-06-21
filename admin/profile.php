<?php
require_once 'includes/header.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Check if new username exists for other users
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ? AND id != ?");
    $stmt->execute([$username, $_SESSION['admin_id']]);
    if ($stmt->fetchColumn() > 0) {
        $error = "Username already exists! Please choose another.";
    } else {
        if (!empty($password)) {
            if ($password !== $confirm_password) {
                $error = "Passwords do not match!";
            } elseif (strlen($password) < 6) {
                $error = "Password must be at least 6 characters!";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("UPDATE admin_users SET username = ?, password = ? WHERE id = ?");
                if ($stmt->execute([$username, $hashed_password, $_SESSION['admin_id']])) {
                    $success = "Profile updated successfully! (Username & Password)";
                    // Update header name
                    $admin_name = $username;
                } else {
                    $error = "Failed to update profile.";
                }
            }
        } else {
            // Update username only
            $stmt = $pdo->prepare("UPDATE admin_users SET username = ? WHERE id = ?");
            if ($stmt->execute([$username, $_SESSION['admin_id']])) {
                $success = "Profile updated successfully! (Username only)";
                $admin_name = $username;
            } else {
                $error = "Failed to update profile.";
            }
        }
    }
}
?>

<div class="page-header">
    <h1>Update Profile</h1>
</div>

<div class="card" style="max-width: 600px;">
    <div class="card-body">
        <?php if ($error): ?>
            <div style="background: rgba(241, 65, 108, 0.1); color: var(--danger); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-triangle-exclamation"></i> <?= $error ?>
            </div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div style="background: rgba(80, 205, 137, 0.1); color: var(--success); padding: 10px; border-radius: 6px; margin-bottom: 20px; font-weight: 500;">
                <i class="fa-solid fa-check-circle"></i> <?= $success ?>
            </div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Username <span style="color: var(--danger);">*</span></label>
                <div style="position: relative;">
                    <i class="fa-solid fa-user" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="text" name="username" class="form-control" style="padding-left: 45px;" value="<?= htmlspecialchars($admin_name) ?>" required>
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <p style="color: var(--text-muted); font-size: 13px; margin-bottom: 15px;">Leave passwords blank if you don't want to change it.</p>
            
            <div class="form-group">
                <label>New Password</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="password" name="password" class="form-control" style="padding-left: 45px;" placeholder="Enter new password">
                </div>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <div style="position: relative;">
                    <i class="fa-solid fa-lock" style="position: absolute; left: 15px; top: 15px; color: #a1a5b7;"></i>
                    <input type="password" name="confirm_password" class="form-control" style="padding-left: 45px;" placeholder="Confirm new password">
                </div>
            </div>
            
            <hr style="border: 0; border-top: 1px dashed var(--border-color); margin: 25px 0;">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i> Save Changes</button>
        </form>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
