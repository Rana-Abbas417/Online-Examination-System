<?php
include '../config/db.php';

session_start();


// Handle adding a new exam title
if (isset($_POST['add_exam'])) {

    $name = mysqli_real_escape_string(
        $conn,
        $_POST['exam_name']
    );

    mysqli_query(
        $conn,
        "INSERT INTO exams (exam_name)
         VALUES ('$name')"
    );

    header("Location: admin.php");
    exit();
}


// Handle adding a question
if (isset($_POST['add_question'])) {

    $exam_id = (int) $_POST['exam_id'];

    $q_text = mysqli_real_escape_string(
        $conn,
        $_POST['question_text']
    );

    $a = mysqli_real_escape_string(
        $conn,
        $_POST['opt_a']
    );

    $b = mysqli_real_escape_string(
        $conn,
        $_POST['opt_b']
    );

    $c = mysqli_real_escape_string(
        $conn,
        $_POST['opt_c']
    );

    $correct = mysqli_real_escape_string(
        $conn,
        $_POST['correct']
    );

    $sql = "
        INSERT INTO questions
        (
            exam_id,
            question_text,
            option_a,
            option_b,
            option_c,
            correct_option
        )
        VALUES
        (
            '$exam_id',
            '$q_text',
            '$a',
            '$b',
            '$c',
            '$correct'
        )
    ";

    mysqli_query(
        $conn,
        $sql
    );

    header(
        "Location: manage_exams.php?edit_id=$exam_id"
    );

    exit();
}


// Handle deleting a question
if (isset($_GET['delete_q'])) {

    $q_id = (int) $_GET['delete_q'];

    $ex_id = (int) $_GET['ex_id'];

    mysqli_query(
        $conn,
        "DELETE FROM questions WHERE id=$q_id"
    );

    header(
        "Location: manage_exams.php?edit_id=$ex_id"
    );

    exit();
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

    <title>Manage Exam Questions</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

    <div class="container">

        <?php if (isset($_GET['edit_id'])): ?>

            <?php

            $exam_id = (int) $_GET['edit_id'];

            $exam_res = mysqli_query(
                $conn,
                "SELECT exam_name
                 FROM exams
                 WHERE id=$exam_id"
            );

            $exam_data = mysqli_fetch_assoc(
                $exam_res
            );

            ?>

            <?php if ($exam_data): ?>

                <h2
                    class="manage-exam-title"
                    style="color: green;"
                >
                    Managing:
                    <?php
                    echo htmlspecialchars(
                        $exam_data['exam_name']
                    );
                    ?>
                </h2>


                <!-- Add Questions -->
                <div class="card">

                    <h3>
                        Add New Question
                    </h3>

                    <form method="POST">

                        <input
                            type="hidden"
                            name="exam_id"
                            value="<?php echo $exam_id; ?>"
                        >

                        <input
                            type="text"
                            name="question_text"
                            placeholder="Enter Question"
                            required
                        >

                        <input
                            type="text"
                            name="opt_a"
                            placeholder="Option A"
                            required
                        >

                        <input
                            type="text"
                            name="opt_b"
                            placeholder="Option B"
                            required
                        >

                        <input
                            type="text"
                            name="opt_c"
                            placeholder="Option C"
                            required
                        >

                        <select name="correct">

                            <option value="A">
                                A
                            </option>

                            <option value="B">
                                B
                            </option>

                            <option value="C">
                                C
                            </option>

                        </select>

                        <button
                            type="submit"
                            name="add_question"
                            class="btn"
                        >
                            Add Question
                        </button>

                    </form>

                </div>


                <!-- Current Questions -->
                <div class="card questions-card">

                    <h3>
                        Current Questions
                    </h3>

                    <table class="responsive-table">

                        <thead>

                            <tr>
                                <th>Question</th>
                                <th>Correct</th>
                                <th>Action</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $qs = mysqli_query(
                                $conn,
                                "SELECT *
                                 FROM questions
                                 WHERE exam_id=$exam_id"
                            );

                            while (
                                $row = mysqli_fetch_assoc($qs)
                            ):

                            ?>

                                <tr>

                                    <td data-label="Question">

                                        <?php
                                        echo htmlspecialchars(
                                            $row['question_text']
                                        );
                                        ?>

                                    </td>

                                    <td data-label="Correct">

                                        <?php
                                        echo htmlspecialchars(
                                            $row['correct_option']
                                        );
                                        ?>

                                    </td>

                                    <td data-label="Action">

                                        <div class="table-actions">

                                            <a
                                                href="manage_exams.php?delete_q=<?php echo (int) $row['id']; ?>&ex_id=<?php echo $exam_id; ?>"
                                                class="btn btn-delete"
                                                style="text-decoration: none;"
                                            >
                                                Delete
                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        </tbody>

                    </table>

                </div>


                <a
                    href="admin.php"
                    class="manage-back-link"
                    style="
                        display: inline-block;
                        margin-top: 20px;
                        color: #3498db;
                        text-decoration: none;
                        font-weight: 600;
                    "
                >
                    Back to Admin Panel
                </a>

            <?php else: ?>

                <div class="card">

                    <h3>
                        Exam Not Found
                    </h3>

                    <a
                        href="admin.php"
                        class="btn"
                        style="text-decoration: none;"
                    >
                        Back to Admin Panel
                    </a>

                </div>

            <?php endif; ?>

        <?php else: ?>

            <div class="card">

                <h3>
                    No Exam Selected
                </h3>

                <a
                    href="admin.php"
                    class="btn"
                    style="text-decoration: none;"
                >
                    Back to Admin Panel
                </a>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>