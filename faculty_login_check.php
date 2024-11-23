<?php

// Your database connection code
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$block = $_POST["block"];
$lab = $_POST["lab"];
$faculty_id = $_POST["faculty_id"];
$password = $_POST["password"];

$sql = "SELECT * FROM faculty_lab WHERE block_no='$block' AND lab_no='$lab' AND faculty_id='$faculty_id' AND faculty_password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    header("Location: lab_change.php?block=$block&lab=$lab");    
    exit();
} else {
    header("Location: faculty_login.php?error=1");
    exit();
}

$conn->close();
?>
