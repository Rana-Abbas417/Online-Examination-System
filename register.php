<?php 
include 'db.php';
if(isset($_POST['register'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users (fullname, email, phone, age, password) VALUES ('$name', '$email', '$phone', '$age', '$pass')";
    if(mysqli_query($conn, $sql)) { echo "<script>alert('Success!'); window.location='login.php';</script>"; }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="card" style="max-width: 500px; margin: auto;">
            <h2>Candidate Registration</h2>
            <form method="POST" onsubmit="return validateForm()">
                <input type="text" name="fullname" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone Number" required>
                <input type="number" name="age" placeholder="Age" required>
                <input type="password" id="pass" name="password" placeholder="Password" required>
                <input type="password" id="cpass" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="register" class="btn">Register</button>
            </form>
            <p style="margin-top: 15px; text-align: center;">
                Already have an account? <a href="login.php" style="color: #3498db; text-decoration: none; font-weight: 600;">Login</a>
            </p>
        </div>
    </div>
    <script>
        function validateForm() {
            let p = document.getElementById('pass').value;
            let cp = document.getElementById('cpass').value;
            if (p !== cp) { alert("Passwords do not match!"); return false; }
            return true;
        }
    </script>
</body>
</html>