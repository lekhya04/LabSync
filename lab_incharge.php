<!DOCTYPE html>
<html>
<head>
    <title>Button Page</title>
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

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .button-container button {
            padding: 20px 40px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-container button:hover {
            background-color: #45a049;
        }

        h2 {
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="button-container">
        <div class="button-row">
            <button class="left-button" onclick="window.location.href='higher.php'">
                <h2>New Registration</h2>
            </button>
            <button class="right-button" onclick="window.location.href='faculty_update.php'">
                <h2>Faculty Update</h2>
            </button>
            <button class="left-button" onclick="window.location.href='faculty_view.php'">
                <h2>Faculty Details</h2>
            </button>
        </div>
        <br>
        <button class="right-button" onclick="window.location.href='index.php'">
            <h2>Home</h2>
        </button>
    </div>
</body>
</html>
