<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "lab"; 
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$block = $_GET['block'];
$lab = $_GET['lab'];
$faculty_id = $_GET['faculty_id'];
$faculty_name = $_GET['faculty_name'];
$faculty_mobile = $_GET['faculty_mobile'];


$sql = "INSERT INTO faculty_lab (block_no, lab_no, faculty_id, faculty_name, faculty_mobile, faculty_password)
        VALUES ('$block', '$lab', '$faculty_id', '$faculty_name', $faculty_mobile, '$faculty_id')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('lab faculty updated successfully');
            document.location.href='faculty_details.php';
    </script>
        ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
