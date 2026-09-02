<?php
include 'db.php';

session_start();

// Block access if not logged in as admin
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Logic for deleting exam
if(isset($_GET['delete_exam'])){
    $id = $_GET['delete_exam'];
    mysqli_query($conn, "DELETE FROM exams WHERE id=$id");
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Admin Dashboard</title>
    <nav>
        <h2>Admin Management</h2>
        <a href="logout.php" class="btn btn-delete" style="padding: 5px 15px; text-decoration: none; font-size: 14px;">Logout</a>
    </nav>
</head>
<body>
    <div class="container">
        <div class="card">
            <h3>Add New Exam</h3>
            <form action="manage_exams.php" method="POST">
                <input type="text" name="exam_name" placeholder="Exam Title" required>
                <button type="submit" name="add_exam" class="btn">Create Exam</button>
            </form>
        </div>

        <div class="card">
            <h3>Existing Exams</h3>
            <table>
                <tr><th>ID</th><th>Exam Name</th><th>Action</th></tr>
                <?php
                $res = mysqli_query($conn, "SELECT * FROM exams");
                while($row = mysqli_fetch_assoc($res)){
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['exam_name']}</td>
                        <td>
                            <a href='manage_exams.php?edit_id={$row['id']}' class='btn btn-manage' style='padding:5px; text-decoration:none;'>Manage Questions</a>
                            <a href='admin.php?delete_exam={$row['id']}' class='btn btn-delete' style='padding:5px; text-decoration:none;'>Delete Exam</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>
        </div>

        <div class="card">
            <h3>Registered Candidates</h3>
            <table>
                <tr><th>Name</th><th>Email</th><th>Age</th><th>Phone</th></tr>
                <?php
                $users = mysqli_query($conn, "SELECT * FROM users WHERE role='candidate'");
                while($u = mysqli_fetch_assoc($users)){
                    echo "<tr>
                        <td>{$u['fullname']}</td>
                        <td>{$u['email']}</td>
                        <td>{$u['age']}</td>
                        <td>{$u['phone']}</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>