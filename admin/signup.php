<?php
// admin/signup.php
include('includes/database.php');
include('includes/config.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';
    if ($username && $password && $confirm) {
        if ($password !== $confirm) {
            $error = 'Passwords do not match.';
        } else {
            $stmt = mysqli_prepare($connect, 'SELECT id FROM admins WHERE username = ?');
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $error = 'Username already exists.';
            } else {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $stmt = mysqli_prepare($connect, 'INSERT INTO admins (username, password) VALUES (?, ?)');
                mysqli_stmt_bind_param($stmt, 'ss', $username, $hash);
                mysqli_stmt_execute($stmt);
                header('Location: login.php');
                exit;
            }
        }
    } else {
        $error = 'Please fill in all fields.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Sign Up</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Admin Sign Up</h2>
    <?php if ($error): ?><p style="color:red;"> <?= htmlspecialchars($error) ?> </p><?php endif; ?>
    <form method="post">
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Confirm Password: <input type="password" name="confirm" required></label><br>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
