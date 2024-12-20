<!DOCTYPE html>
<html lang="en">
<?php include("../../config.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>

<body>

    <table>
        <h2>Students</h2>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>grade</th>
            <th>gender</th>
            <th>birth</th>
        </tr>
        <?php



        $sql = "SELECT id , first_name , last_name , (select name from grades where grades.id = students.grade) grade , gender , dob FROM students;";


        $result = $conn->query($sql);


        if ($result) {

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $grade = $row['grade'];
                    $gender = $row['gender'] == 1 ? "male" : 'female';
                    $dob = $row['dob'];
                    echo "<tr>
                            <td>$id</td>
                            <td>$first_name</td>
                            <td>$last_name</td>
                            <td>$grade</td>
                            <td>$gender</td>
                            <td>$dob</td>
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
            <button type="button" class="action-btn insert" onclick="submitForm('StuForm.php')">insert</button>
            <button type="button" class="action-btn update" onclick="submitForm('StuUpdate.php')">update</button>
            <button type="button" class="action-btn delete" onclick="submitForm('StuDelete.php')">delete</button>
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