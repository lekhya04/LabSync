<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $block_number = $_POST["block_number"];
    $lab_name = $_POST["lab_name"];
    $faculty_id = $_POST["faculty_id"];
    $new_mobile = $_POST["new_mobile"];
    $new_password = $_POST["new_password"];

    if (!empty($new_mobile)) {
        $sql = "UPDATE faculty_lab SET faculty_mobile='$new_mobile' WHERE faculty_id='$faculty_id' AND block_no='$block_number' AND lab_no='$lab_name'";
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating mobile number: " . $conn->error;
        }
    }

    if (!empty($new_password)) {
        $sql = "UPDATE faculty_lab SET faculty_password='$new_password' WHERE faculty_id='$faculty_id' AND block_no='$block_number' AND lab_no='$lab_name'";
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating password: " . $conn->error;
        }
    }
    echo "<script>alert('Faculty details updated successfully'); 
        window.location.href = 'faculty_update.php';
        </script>";
}

$conn->close();
?>
