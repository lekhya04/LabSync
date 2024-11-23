<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Block and Lab</title>
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
            text-align: center;
        }

        .form-header {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            color: #555;
        }

        select {
            width: 200px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h2>Select Block and Lab</h2>
        </div>
        <form action="labs.php" method="POST">
            <label for="block">Select Block:</label>
            <select id="block" name="block">
                <option value="-1">---select---</option>
                <option value="block1">Block 1</option>
                <option value="block2">Block 2</option>
                <option value="block3">Block 3</option>
                <option value="block4">Block 4</option>
                <option value="block5">Block 5</option>
            </select>

            <label for="lab">Select Lab:</label>
            <select id="lab" name="lab">
            </select>
            <input type="submit" value="Submit">
        </form>
    </div>

    <script>
        const blockLabs = {
            block1: ["lab1", "lab2", "lab3", "lab4","lab5"],
            block2: ["lab1", "lab2", "lab3", "lab4","lab5"],
            block3: ["elcs","lab7"],
            block4: ["chem","phy"],
            block5: ["ml","lab8"],
        };

        function populateLabDropdown() {
            const blockSelect = document.getElementById("block");
            const labSelect = document.getElementById("lab");
            const selectedBlock = blockSelect.options[blockSelect.selectedIndex].value;
            labSelect.innerHTML = ""; 
            blockLabs[selectedBlock].forEach(function(lab) {
                const option = document.createElement("option");
                option.value = lab;
                option.textContent = lab;
                labSelect.appendChild(option);
            });
        }

        document.getElementById("block").addEventListener("change", populateLabDropdown);

        populateLabDropdown();
    </script>
</body>
</html>
