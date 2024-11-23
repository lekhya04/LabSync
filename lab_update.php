<?php
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
$day = $_POST["day"];
$period1 = $_POST["period1"];
$period2 = $_POST["period2"];
$period3 = $_POST["period3"];
$period4 = $_POST["period4"];
$period5 = $_POST["period5"];
$period6 = $_POST["period6"];

if(!empty($period1)){
    $sql= "UPDATE $block SET period_1='$period1' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
 
}
if(!empty($period2)){
    $sql= "UPDATE $block SET period_2='$period2' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
   
}
if(!empty($period3)){
    $sql= "UPDATE $block SET period_3='$period3' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
  
}
if(!empty($period4)){
    $sql= "UPDATE $block SET period_4='$period4' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
    
}
if(!empty($period5)){
    $sql= "UPDATE $block SET period_5='$period5' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
}
if(!empty($period6)){
    $sql= "UPDATE $block SET period_6='$period6' WHERE lab_name='$lab' AND day_of_week='$day'";
    if ($conn->query($sql) !== TRUE) {
        echo "Error updating mobile number: " . $conn->error;
    }
}
echo "<script>
            alert('lab period updated successfully');
            document.location.href='lab_change.php';
    </script>
        ";
$conn->close();

?>
