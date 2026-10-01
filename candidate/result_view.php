<?php

$score = $_GET['score'] ?? 0;

$total = $_GET['total'] ?? 0;

$percentage = $_GET['perc'] ?? 0;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Result</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

    <div
        class="container"
        style="text-align: center;"
    >

        <div class="card">

            <h2>
                Exam Completed!
            </h2>


            <p>

                Score:

                <?php echo $score; ?>

                /

                <?php echo $total; ?>

            </p>


            <h1>

                Percentage:

                <?php echo $percentage; ?>%

            </h1>


            <a
                href="dashboard.php"
                class="btn"
                style="
                    text-decoration: none;
                    display: inline-block;
                "
            >
                Back to Dashboard
            </a>

        </div>

    </div>

</body>

</html>