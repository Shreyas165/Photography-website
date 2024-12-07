<?php
session_start();

if (isset($_GET['token']) && $_GET['token'] === $_SESSION['reset_token']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newPassword = $_POST['new_password'];
        echo 'Password updated successfully.';
    }
} else {
    echo 'Invalid or expired token.';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form method="post">
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
