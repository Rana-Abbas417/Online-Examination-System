<?php

include '../config/db.php';

session_start();

if (isset($_POST['admin_login'])) {

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = $_POST['password'];

    // Specifically check for role 'admin'
    $result = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE email='$email'
         AND role='admin'"
    );

    $admin = mysqli_fetch_assoc($result);

    if ($admin && $password === $admin['password']) {

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_name'] = $admin['fullname'];

        header("Location: admin.php");
        exit();

    } else {

        echo "
        <script>
            alert('Access Denied: Invalid Admin Credentials');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Login</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

    <div class="container">

        <div
            class="card"
            style="
                max-width: 400px;
                margin: 100px auto;
                border-top: 5px solid #f1c40f;
            "
        >

            <h2>Admin Login</h2>

            <form method="POST">

                <input
                    type="email"
                    name="email"
                    placeholder="Admin Email"
                    required
                >

                <input
                    type="password"
                    name="password"
                    placeholder="Password"
                    required
                >

                <button
                    type="submit"
                    name="admin_login"
                    class="btn"
                    style="background: #2c3e50;"
                >
                    Login
                </button>

            </form>

            <a
                href="../index.php"
                style="
                    color: #3498db;
                    text-decoration: none;
                    font-weight: 600;
                "
            >
                Back to Home
            </a>

        </div>

    </div>

</body>

</html>