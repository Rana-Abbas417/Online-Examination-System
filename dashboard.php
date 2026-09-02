<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) header("Location: login.php");
$user_id = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav>
        <h2>Welcome, <?php echo $_SESSION['user_name']; ?></h2>
        <a href="logout.php" class="btn btn-delete" style="padding: 5px 15px; text-decoration: none; font-size: 14px;">Logout</a>
    </nav>
    <div class="container">
        <div class="card">
            <h2 style="color: green">Available Exams</h2>
            <ul>
                <?php
                $exams = mysqli_query($conn, "SELECT * FROM exams");
                while($row = mysqli_fetch_assoc($exams)) {
                    echo "<li>{$row['exam_name']} - <a href='take_exam.php?id={$row['id']}' class='btn-small'>Start Exam</a></li>";
                }
                ?>
            </ul>
        </div>

        <div class="card">
            <h3>My Previous Results</h3>
            <table>
                <tr><th>Exam</th><th>Score</th><th>Percentage</th></tr>
                <?php
                $results = mysqli_query($conn, "SELECT r.*, e.exam_name FROM results r JOIN exams e ON r.exam_id = e.id WHERE r.user_id = $user_id");
                while($res = mysqli_fetch_assoc($results)) {
                    echo "<tr>
                            <td>{$res['exam_name']}</td>
                            <td>{$res['score']}</td>
                            <td>{$res['percentage']}%</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>