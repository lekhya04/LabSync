<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .button-container button {
            border: none;
            border-radius: 10px;
            padding: 25px 50px;
            background-color: #4CAF50;
            color: white;
            font-size: 24px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <div class="button-row">
            <button class="left-button" onclick="window.location.href='faculty_login.php'">
                <h2>Lab Change</h2>
            </button>
            <div style="width: 30px;"></div> 
            <button class="right-button" onclick="window.location.href='lab_incharge.php'">
                <h2>Lab Incharge</h2>
            </button>
            <div style="width: 30px;"></div> 
            <button class="right-button" onclick="window.location.href='date.php'">
                <h2>Lab Availability</h2>
            </button>
            <div style="width: 30px;"></div> 
            <button class="left-button" onclick="window.location.href='block.php'">
                <h2>Lab Time Table</h2>
             </button>
        </div>
    </div>
</body>
</html>
