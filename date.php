<!DOCTYPE html>
<html>
<head>
    <title>Lab Schedule Checker</title>
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

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        label {
            display: block;
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="date"] {
            width: 300px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button[type="submit"],
        .home-button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover,
        .home-button:hover 
        {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enter a Date to Check Lab Schedules</h2>
        <form action="check_schedule.php" method="POST">
            <label for="date">Date (YYYY-MM-DD):</label>
            <input type="date" id="date" name="date" required>
            <button type="submit">Submit</button>
            <a href="index.php" class="home-button">Home</a>

        </form>
    </div>
</body>
</html>
