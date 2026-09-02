<?php
include 'db.php';
session_start();

// Handle adding a new exam title
if (isset($_POST['add_exam'])) {
    $name = mysqli_real_escape_string($conn, $_POST['exam_name']);
    mysqli_query($conn, "INSERT INTO exams (exam_name) VALUES ('$name')");
    header("Location: admin.php");
}

// Handle adding a question to a specific exam
if (isset($_POST['add_question'])) {
    $exam_id = $_POST['exam_id'];
    $q_text = mysqli_real_escape_string($conn, $_POST['question_text']);
    $a = mysqli_real_escape_string($conn, $_POST['opt_a']);
    $b = mysqli_real_escape_string($conn, $_POST['opt_b']);
    $c = mysqli_real_escape_string($conn, $_POST['opt_c']);
    $correct = $_POST['correct'];

    $sql = "INSERT INTO questions (exam_id, question_text, option_a, option_b, option_c, correct_option) 
            VALUES ('$exam_id', '$q_text', '$a', '$b', '$c', '$correct')";
    mysqli_query($conn, $sql);
    header("Location: manage_exams.php?edit_id=$exam_id");
}

// Handle deleting a question
if (isset($_GET['delete_q'])) {
    $q_id = $_GET['delete_q'];
    $ex_id = $_GET['ex_id'];
    mysqli_query($conn, "DELETE FROM questions WHERE id=$q_id");
    header("Location: manage_exams.php?edit_id=$ex_id");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Manage Exam Questions</title>
</head>
<body>
    <div class="container">
        <?php if (isset($_GET['edit_id'])): 
            $exam_id = $_GET['edit_id'];
            $exam_res = mysqli_query($conn, "SELECT exam_name FROM exams WHERE id=$exam_id");
            $exam_data = mysqli_fetch_assoc($exam_res);
        ?>
            <h2 style="color: green;">Managing: <?php echo $exam_data['exam_name']; ?></h2>
            
            <!-- Form to Add Questions -->
            <div class="card">
                <h3>Add New Question</h3>
                <form method="POST">
                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
                    <input type="text" name="question_text" placeholder="Enter Question" required>
                    <input type="text" name="opt_a" placeholder="Option A" required>
                    <input type="text" name="opt_b" placeholder="Option B" required>
                    <input type="text" name="opt_c" placeholder="Option C" required>
                    <select name="correct">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                    </select>
                    <button type="submit" name="add_question" class="btn">Add Question</button>
                </form>
            </div>

            <!-- List of Current Questions -->
            <div class="card">
                <h3>Current Questions</h3>
                <table>
                    <tr><th>Question</th><th>Correct</th><th>Action</th></tr>
                    <?php
                    $qs = mysqli_query($conn, "SELECT * FROM questions WHERE exam_id=$exam_id");
                    while($row = mysqli_fetch_assoc($qs)){
                        echo "<tr>
                            <td>{$row['question_text']}</td>
                            <td>{$row['correct_option']}</td>
                            <td>
                                <a href='manage_exams.php?delete_q={$row['id']}&ex_id=$exam_id' class='btn btn-delete' style='padding:5px; text-decoration:none;'>Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
            <br>
            <a href="admin.php" style="color: #3498db; text-decoration: none; font-weight: 600;">Back to Admin Panel</a>
        <?php endif; ?>
    </div>
</body>
</html>