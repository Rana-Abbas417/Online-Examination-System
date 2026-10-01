<?php
include '../config/db.php';

session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if (isset($_GET['delete_exam'])) {

    $id = (int) $_GET['delete_exam'];

    mysqli_query(
        $conn,
        "DELETE FROM exams WHERE id=$id"
    );

    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <nav class="dashboard-nav">

        <h2>
            Admin Management
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

        <!-- Add New Exam -->
        <div class="card">

            <h3>
                Add New Exam
            </h3>

            <form
                action="manage_exams.php"
                method="POST"
            >

                <input
                    type="text"
                    name="exam_name"
                    placeholder="Exam Title"
                    required
                >

                <button
                    type="submit"
                    name="add_exam"
                    class="btn"
                >
                    Create Exam
                </button>

            </form>

        </div>


        <!-- Existing Exams -->
        <div class="card existing-exams-card">

            <h3>
                Existing Exams
            </h3>

            <table class="responsive-table">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Exam Name</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    $res = mysqli_query(
                        $conn,
                        "SELECT * FROM exams"
                    );

                    while ($row = mysqli_fetch_assoc($res)):

                    ?>

                        <tr>

                            <td data-label="ID">

                                <?php
                                echo htmlspecialchars(
                                    $row['id']
                                );
                                ?>

                            </td>

                            <td data-label="Exam Name">

                                <?php
                                echo htmlspecialchars(
                                    $row['exam_name']
                                );
                                ?>

                            </td>

                            <td data-label="Action">

                                <div class="table-actions">

                                    <a
                                        href="manage_exams.php?edit_id=<?php echo (int) $row['id']; ?>"
                                        class="btn btn-manage"
                                        style="text-decoration: none;"
                                    >
                                        Manage Questions
                                    </a>

                                    <a
                                        href="admin.php?delete_exam=<?php echo (int) $row['id']; ?>"
                                        class="btn btn-delete"
                                        style="text-decoration: none;"
                                    >
                                        Delete Exam
                                    </a>

                                </div>

                            </td>

                        </tr>

                    <?php endwhile; ?>

                </tbody>

            </table>

        </div>


        <!-- Registered Candidates -->
        <div class="card">

            <h3>
                Registered Candidates
            </h3>

            <table class="responsive-table">

                <thead>

                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Phone</th>
                    </tr>

                </thead>

                <tbody>

                    <?php

                    $users = mysqli_query(
                        $conn,
                        "SELECT * FROM users WHERE role='candidate'"
                    );

                    while ($u = mysqli_fetch_assoc($users)):

                    ?>

                        <tr>

                            <td data-label="Name">

                                <?php
                                echo htmlspecialchars(
                                    $u['fullname']
                                );
                                ?>

                            </td>

                            <td data-label="Email">

                                <?php
                                echo htmlspecialchars(
                                    $u['email']
                                );
                                ?>

                            </td>

                            <td data-label="Age">

                                <?php
                                echo htmlspecialchars(
                                    $u['age']
                                );
                                ?>

                            </td>

                            <td data-label="Phone">

                                <?php
                                echo htmlspecialchars(
                                    $u['phone']
                                );
                                ?>

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