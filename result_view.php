<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Result</title>
</head>
<body>
    <div class="container" style="text-align: center;">
        <div class="card">
            <h2>Exam Completed!</h2>
            <p>Score: <?php echo $_GET['score']; ?> / <?php echo $_GET['total']; ?></p>
            <h1>Percentage: <?php echo $_GET['perc']; ?>%</h1>
            <a href="dashboard.php" class="btn" style="text-decoration:none; display:inline-block;">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>