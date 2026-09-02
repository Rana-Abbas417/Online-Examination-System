<?php
include 'db.php';
session_start();

if ($_POST) {
    $exam_id = $_POST['exam_id'];
    $user_id = $_SESSION['user_id'];
    $score = 0;
    $total = 0;

    $questions = mysqli_query($conn, "SELECT id, correct_option FROM questions WHERE exam_id = $exam_id");
    while ($q = mysqli_fetch_assoc($questions)) {
        $total++;
        $ans = $_POST['q' . $q['id']] ?? '';
        if ($ans == $q['correct_option']) {
            $score++;
        }
    }

    $percentage = ($score / $total) * 100;
    mysqli_query($conn, "INSERT INTO results (user_id, exam_id, score, total_marks, percentage) 
                        VALUES ($user_id, $exam_id, $score, $total, $percentage)");

    header("Location: result_view.php?score=$score&total=$total&perc=$percentage");
}
?>