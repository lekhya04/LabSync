<?php
$block = $_GET['block'];
$lab = $_GET['lab'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lab Periods Change</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            margin-top: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        label {
            display: block;
            font-size: 18px;
            color: #555;
            margin-bottom: 5px;
        }

        select {
            width: 200px;
            padding: 10px;
            margin: 10px 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"],
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

        input[type="submit"]:hover,
        .home-button:hover {
            background-color: #45a049;
        }

        .periods-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .periods-row {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .periods-row label {
            margin-right: 10px;
        }

        .home-button {
            margin-top: 20px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .button-container button {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <h2>Lab Periods Change</h2>
    <p><strong>Block Number:</strong> <?php echo $block; ?></p>
    <p><strong>Lab Number:</strong> <?php echo $lab; ?></p>
    <form action="lab_update.php" method="post">
        <label for="day">Select Day:</label>
        <select id="day" name="day">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
        </select><br><br>
        <input type="hidden" name="block" value="<?php echo $block; ?>">
        <input type="hidden" name="lab" value="<?php echo $lab; ?>">

        <div class="periods-container">
            <div class="periods-row">
                <label for="period1">Period 1:</label>
                <select id="period1" name="period1">
                </select>

                <label for="period2">Period 2:</label>
                <select id="period2" name="period2">
                </select>

                <label for="period3">Period 3:</label>
                <select id="period3" name="period3">
                </select>
            </div>

            <div class="periods-row">
                <label for="period4">Period 4:</label>
                <select id="period4" name="period4">
                </select>

                <label for="period5">Period 5:</label>
                <select id="period5" name="period5">
                </select>

                <label for="period6">Period 6:</label>
                <select id="period6" name="period6">
                </select>
            </div>
        </div><br>
        <input type="submit" value="Submit">
    </form>
    <div class="button-container">
        <button class="home-button" onclick="window.location.href='index.php'">Home</button>
    </div>

    <script>
        const labClasses = {
            lab1: ["F", "II CSE A OS & ALP LAB", "II CSE B OS & ALP LAB","II CSE C OS & ALP LAB","II CSE D OS & ALP LAB","II CSE E OS & ALP LAB",
            "II CSE F OS & ALP LAB","II CSE G OS & ALP LAB"],
            lab2: ["F","III A CSE IOT LAB", "III B CSE IOT LAB","III C CSE IOT LAB","III D CSE IOT LAB","III E CSE IOT LAB"
                ,"II A ECE OOP LAB","II B ECE OOP LAB"],
            lab3: ["F","II CSE A WT LAB","II CSE B WT LAB","II CSE C WT LAB","II CSE D WT LAB","II CSE E WT LAB","II CSE F WT LAB","II CSE G WT LAB"],
            lab4: ["F","II CSE A DAA LAB","II CSE B DAA LAB","II CSE C DAA LAB","II CSE D DAA LAB","II CSE E DAA LAB","II CSE F DAA LAB","II CSE G DAA LAB"],
            lab5: ["F","III A CSE SML LAB","III B CSE SML LAB","III C CSE SML LAB","III D CSE SML LAB","III E CSE SML LAB",
                "II C ECE OOP LAB","II D ECE OOP LAB"],
            lab6: ["class12", "class13"],
            lab7: ["class14", "class15"],
            elcs: ["class16", "class17"],
            chem: ["class18", "class19"],
            phy: ["class20", "class21"],
            ml: ["class22", "class23"],
            lab8: ["class24", "class25"]
        };

        function populatePeriodDropdowns() {
            const selectedLab = "<?php echo $lab; ?>";
            const periods = ["period1", "period2", "period3", "period4", "period5", "period6"];
            const classes = labClasses[selectedLab] || [];

            periods.forEach(function(period) {
                const selectElement = document.getElementById(period);
                selectElement.innerHTML = "";
                classes.forEach(function(className) {
                    const option = document.createElement("option");
                    option.value = className;
                    option.textContent = className;
                    selectElement.appendChild(option);
                });
            });
        }

        populatePeriodDropdowns();
    </script>
</body>
</html>
