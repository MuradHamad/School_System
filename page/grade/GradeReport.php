<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <style>
        /* General styles for input */
        input[type="text"] {
            padding: 10px 15px;
            font-size: 1em;
            border: 2px solid #ddd;
            border-radius: 5px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Force buttons to display side by side */
        .button-container {
            display: flex;
            justify-content: flex-start;
            /* Align buttons to the left */
            gap: 10px;
            /* Space between buttons */
        }

        .action-btn {
            display: inline-block;
            /* Ensure buttons don’t expand */
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: capitalize;
            transition: background-color 0.3s, transform 0.2s;
            text-align: center;
            width: auto;
            /* Remove any inherited full-width styling */
        }

        .insert {
            background-color: #007bff;
            /* Blue */
        }

        .update {
            background-color: #28a745;
            /* Green */
        }

        .delete {
            background-color: #dc3545;
            /* Red */
        }

        .action-btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }

        .action-btn:active {
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <table>
        <h2>Grades</h2>
        <tr>
            <th>id</th>
            <th>name</th>
        </tr>
        <?php
        include("../../config.php");


        $sql = "SELECT * FROM grades;";


        $result = $conn->query($sql);


        if ($result) {

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<tr>
                            <td>$id</td>
                            <td>$name</td>
                        </tr>";
                }
            } else {
                echo "No records found.";
            }
        } else {
            echo "Error: " . $conn->error;
        }


        $conn->close();
        ?>
    </table>
    <br>
    <form id="myForm">
        <div class="action-container">
            <label for="rowId" style="font-size: 1.2em; font-weight: bold; color: #333;">Enter row id:</label>
            <input type="text" name="rowid" id="rowId" placeholder="Enter row ID" style="margin-left: 10px;" />
            <button type="button" class="action-btn insert" onclick="submitForm('GradeForm.php')">insert</button>
            <button type="button" class="action-btn update" onclick="submitForm('GradeUpdate.php')">update</button>
            <button type="button" class="action-btn delete" onclick="submitForm('GradeDelete.php')">delete</button>
        </div>
        <?php
        if (isset($_GET['err']) && $_GET['err'] == 1) {
            echo "<h4 style =\"color :red;\">NO ID ENTERED</h4>";
        }
        ?>
    </form>

    <script>
        function submitForm(action) {
            if (action === 'StuDelete.php') {
                if (!confirm('Are you sure you want to delete this row?')) {
                    return;
                }
            }

            const form = document.getElementById('myForm');
            form.action = action;
            form.method = 'GET';
            form.submit();
        }
    </script>
</body>

</html>