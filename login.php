<?php
include 'db.php';
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND role='candidate'");
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];
        
        header("Location: " . ($user['role'] == 'admin' ? "admin.php" : "dashboard.php"));
    } else {
        echo "<script>alert('Invalid Credentials');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="card" style="max-width: 400px; margin: 100px auto;">
            <h2>Login</h2>
            <form method="POST">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="login" class="btn">Login</button>
            </form>
            <p style="margin-top: 15px; text-align: center;">
                New here? <a href="register.php" style="color: #3498db; text-decoration: none; font-weight: 600;">Register</a>
            </p>
        </div>
    </div>
</body>
</html>