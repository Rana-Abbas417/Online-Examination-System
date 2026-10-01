<?php

include '../config/db.php';

session_start();


// Make sure the candidate is logged in
if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");

    exit();
}


if ($_POST) {

    $exam_id = $_POST['exam_id'];

    $user_id = $_SESSION['user_id'];

    $score = 0;

    $total = 0;


    // Get all questions for this exam
    $questions = mysqli_query(
        $conn,
        "
        SELECT id, correct_option
        FROM questions
        WHERE exam_id = $exam_id
        "
    );


    while (
        $q = mysqli_fetch_assoc($questions)
    ) {

        $total++;


        $answer =
            $_POST['q' . $q['id']] ?? '';


        if (
            $answer ==
            $q['correct_option']
        ) {

            $score++;

        }

    }


    // Prevent division by zero
    if ($total > 0) {

        $percentage =
            ($score / $total) * 100;

    } else {

        $percentage = 0;

    }


    // Save result
    mysqli_query(
        $conn,
        "
        INSERT INTO results
        (
            user_id,
            exam_id,
            score,
            total_marks,
            percentage
        )
        VALUES
        (
            $user_id,
            $exam_id,
            $score,
            $total,
            $percentage
        )
        "
    );


    // Display result
    header(
        "Location: result_view.php?score=$score&total=$total&perc=$percentage"
    );

    exit();

}

?>