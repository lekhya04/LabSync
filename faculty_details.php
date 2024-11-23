<!DOCTYPE html>
<html>
<head>
    <title>Faculty Details</title>
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

        .form-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
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
            margin-bottom: 5px;
        }

        select,
        input[type="text"] {
            width: 300px;
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
    <div class="form-container">
        <h2>Faculty Details</h2>
        <form action="insert_faculty.php" method="GET">
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

            <label for="faculty_id">Faculty Id:</label>
            <input type="text" id="faculty_id" name="faculty_id">

            <label for="faculty_name">Faculty Name:</label>
            <input type="text" id="faculty_name" name="faculty_name">

            <label for="faculty_mobile">Faculty Mobile:</label>
            <input type="text" id="faculty_mobile" name="faculty_mobile">

            <input type="submit" value="Submit">
            <a class="home-button" href="lab_incharge.php">Home</a>
        </form>
    </div>

    <script>
        const blockLabs = {
            block1: ["lab1", "lab2", "lab3", "lab4", "lab5"],
            block2: ["lab1", "lab2", "lab3", "lab4", "lab5"],
            block3: ["elcs", "lab7"],
            block4: ["chem", "phy"],
            block5: ["ml", "lab8"],
        };

        function populateLabDropdown() {
            const blockSelect = document.getElementById("block");
            const labSelect = document.getElementById("lab");
            const selectedBlock = blockSelect.options[blockSelect.selectedIndex].value;
            labSelect.innerHTML = "";
            blockLabs[selectedBlock].forEach(function (lab) {
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
