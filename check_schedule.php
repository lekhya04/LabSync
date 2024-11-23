<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lab";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$dayOfWeek = '';
$computers = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];

    if (DateTime::createFromFormat('Y-m-d', $date) !== FALSE) {
        $timestamp = strtotime($date);
        $dayOfWeek = date('l', $timestamp);  

        $sql1 = "
            SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6
            FROM block1 b
            JOIN faculty_lab f ON b.lab_name = f.lab_no
            WHERE b.day_of_week='$dayOfWeek'
        ";
        $sql2 = "
            SELECT b.lab_name, b.period_1, b.period_2, b.period_3, b.period_4, b.period_5, b.period_6
            FROM block2 b
            JOIN faculty_lab f ON b.lab_name = f.lab_no
            WHERE b.day_of_week='$dayOfWeek'
        ";
        $result1 = $conn->query($sql1);
        $result2 = $conn->query($sql2);
    } else {
        echo "<h2>Invalid date format. Please enter a date in YYYY-MM-DD format.</h2>";
        exit();
    }
} else {
    header("Location: input_date.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Schedule for <?php echo $dayOfWeek; ?></title>
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
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 1200px;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
            margin-bottom: 50px;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .back-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Lab Schedule for <?php echo $dayOfWeek; ?></h2>

    <h2>Block 1</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Lab Name</th>
                <th>Period 1</th>
                <th>Period 2</th>
                <th>Period 3</th>
                <th>Period 4</th>
                <th>Period 5</th>
                <th>Period 6</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result1->num_rows > 0) {
                $lab_names = [];
                while ($row = $result1->fetch_assoc()) {
                    if (!in_array($row['lab_name'], $lab_names)) {
                        $lab_names[] = $row['lab_name'];
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['lab_name']) . '</td>';
                        echo '<td>' . ($row['period_1'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_2'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_3'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_4'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_5'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_6'] == 'F' ? 'F' : '-') . '</td>';
                        echo '</tr>';
                    }
                }
            } else {
                echo '<tr><td colspan="7">No schedules found for Block 1 on this day.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <h2>Block 2</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Lab Name</th>
                <th>Period 1</th>
                <th>Period 2</th>
                <th>Period 3</th>
                <th>Period 4</th>
                <th>Period 5</th>
                <th>Period 6</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result2->num_rows > 0) {
                $lab_names = [];
                while ($row = $result2->fetch_assoc()) {
                    if (!in_array($row['lab_name'], $lab_names)) {
                        $lab_names[] = $row['lab_name'];
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['lab_name']) . '</td>';
                        echo '<td>' . ($row['period_1'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_2'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_3'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_4'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_5'] == 'F' ? 'F' : '-') . '</td>';
                        echo '<td>' . ($row['period_6'] == 'F' ? 'F' : '-') . '</td>';
                        echo '</tr>';
                    }
                }
            } else {
                echo '<tr><td colspan="7">No schedules found for Block 2 on this day.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <a href="date.php" class="back-link">Back</a>
</div>

</body>
</html>