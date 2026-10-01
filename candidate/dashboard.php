<?php
include '../config/db.php';

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: ../auth/login.php");
    exit();

}

$user_id = (int) $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

    <nav class="dashboard-nav">

        <h2>
            Welcome,
            <?php
            echo htmlspecialchars(
                $_SESSION['user_name']
            );
            ?>
        </h2>

        <button
            type="button"
            class="menu-toggle"
            aria-label="Open navigation menu"
            aria-expanded="false"
        >
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="nav-links">

            <a
                href="../auth/logout.php"
                class="btn btn-delete"
                style="
                    padding: 8px 15px;
                    text-decoration: none;
                    font-size: 14px;
                "
            >
                Logout
            </a>

        </div>

    </nav>


    <div class="container">


        <!-- Available Exams -->
        <div class="card">

            <h2 style="color: green;">
                Available Exams
            </h2>

            <ul>

                <?php

                $exams = mysqli_query(
                    $conn,
                    "SELECT * FROM exams"
                );

                while (
                    $row = mysqli_fetch_assoc($exams)
                ):

                ?>

                    <li>

                        <span>
                            <?php
                            echo htmlspecialchars(
                                $row['exam_name']
                            );
                            ?>
                        </span>

                        <a
                            href="take_exam.php?id=<?php echo (int) $row['id']; ?>"
                            class="btn-small"
                        >
                            Start Exam
                        </a>

                    </li>

                <?php endwhile; ?>

            </ul>

        </div>


        <!-- Previous Results -->
        <div class="card results-card">

            <h3>
                My Previous Results
            </h3>

            <table class="responsive-table">

                <thead>

                    <tr>
                        <th>Exam</th>
                        <th>Score</th>
                        <th>Percentage</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    $results = mysqli_query(
                        $conn,
                        "
                        SELECT
                            r.*,
                            e.exam_name
                        FROM results r
                        JOIN exams e
                            ON r.exam_id = e.id
                        WHERE r.user_id = $user_id
                        "
                    );

                    while (
                        $res = mysqli_fetch_assoc($results)
                    ):

                    ?>

                        <tr>

                            <td data-label="Exam">

                                <?php
                                echo htmlspecialchars(
                                    $res['exam_name']
                                );
                                ?>

                            </td>

                            <td data-label="Score">

                                <?php
                                echo htmlspecialchars(
                                    $res['score']
                                );
                                ?>

                            </td>

                            <td data-label="Percentage">

                                <?php
                                echo htmlspecialchars(
                                    $res['percentage']
                                );
                                ?>%

                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>

    </div>


    <script src="../assets/js/validation.js"></script>

</body>

</html>