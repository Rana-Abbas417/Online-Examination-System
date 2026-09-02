<?php
include 'db.php';
session_start();
$exam_id = $_GET['id'];
$questions = mysqli_query($conn, "SELECT * FROM questions WHERE exam_id = $exam_id");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Take Exam</title>
</head>
<body>
    <div class="container">
    <h2 style="margin: 20px 0;">Attempt Exam</h2>
    <form action="submit_exam.php" method="POST">
        <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>">
        
        <?php 
        $i = 1; // Question counter
        while($q = mysqli_fetch_assoc($questions)): 
        ?>
            <div class="question-card">
                <p class="question-text">
                    <strong>Q<?php echo $i++; ?>.</strong> <?php echo $q['question_text']; ?>
                </p>
                
                <label class="option-container">
                    <input type="radio" name="q<?php echo $q['id']; ?>" value="A" required> 
                    <span><strong>A.</strong> <?php echo $q['option_a']; ?></span>
                </label>
                
                <label class="option-container">
                    <input type="radio" name="q<?php echo $q['id']; ?>" value="B"> 
                    <span><strong>B.</strong> <?php echo $q['option_b']; ?></span>
                </label>
                
                <label class="option-container">
                    <input type="radio" name="q<?php echo $q['id']; ?>" value="C"> 
                    <span><strong>C.</strong> <?php echo $q['option_c']; ?></span>
                </label>
            </div>
        <?php endwhile; ?>
        
        <button type="submit" class="btn" style="margin-bottom: 50px;">Submit Answers</button>
    </form>
    </div>
</body>
</html>