<?php
$host = "sql213.infinityfree.com";
$user = "if0_42788133";
$pass = "examsystem78";
$dbname = "if0_42788133_exam_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>