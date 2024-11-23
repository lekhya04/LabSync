<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correct_username = "admin";
    $correct_password = "gcet@labs";

    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username === $correct_username && $password === $correct_password) {
        header("Location: faculty_details.php");
        exit();
    } else {
        header("Location: higher.php?error=1");
        exit();
    }
} else {
    header("Location: higher.php");
    exit();
}
?>
