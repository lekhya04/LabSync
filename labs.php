<!DOCTYPE html>
<html>
<head>
    <title>Free/Not Free for Selected Lab</title>
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
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin: 0 0 20px 0;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .home-button {
            display: block;
            width: 100px;
            padding: 10px;
            margin: 20px auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .home-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "lab";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $lab = $_POST["lab"];
        $block=$_POST["block"];

        
            $sql = "SELECT day_of_week,period_1, period_2, period_3, period_4, period_5, period_6
                    FROM $block
                    WHERE lab_name = '$lab' ";
            $result = $conn->query($sql);

            echo "<h2>Availability status of $lab </h2>";
        echo "<table>";
        echo "<tr><th>Day</th><th>Period 1</th><th>Period 2</th><th>Period 3</th><th>Period 4</th><th>Period 5</th><th>Period 6</th></tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["day_of_week"] . "</td>";
                echo "<td>" . $row["period_1"] . "</td>";
                echo "<td>" . $row["period_2"] . "</td>";
                echo "<td>" . $row["period_3"] . "</td>";
                echo "<td>" . $row["period_4"] . "</td>";
                echo "<td>" . $row["period_5"] . "</td>";
                echo "<td>" . $row["period_6"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data available</td></tr>";
        }
        echo "</table>";

        $conn->close();
        ?>
        <a class="home-button" href="index.php">Home</a>
    </div>
</body>
</html>
