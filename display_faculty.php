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

$sql = "SELECT * FROM faculty_lab WHERE block_no = ? AND lab_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $block, $lab);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        a.home-button {
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #007BFF; 
            color: white;
            text-decoration:none; 
            border: none; 
            border-radius: 5px; 
            text-align: center; 
            cursor: pointer; 
        }
        a {
            text-decoration:none;
            color: inherit;
        }

    </style>
</head>
<body>
    <div class="container">
            <h2>Lab Details </h2>
            <p><strong>Block Number:</strong> <?php echo $block; ?></p>
            <p><strong>Lab Number:</strong> <?php echo $lab; ?></p>
            <table border="1">
                <thead>
                    <tr>
                        <th>Faculty ID</th>
                        <th>Faculty Name</th>
                        <th>Mobile</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['faculty_id']. '</td>';
                            echo '<td>' . $row['faculty_name'] . '</td>';
                            echo '<td>' . $row['faculty_mobile'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">No faculty details found for this block and lab.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <a class="home-button" href="lab_incharge.php">Home</a>
    </div>
    
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
