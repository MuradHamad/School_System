<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Report</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>
<?php include("../../config.php"); ?>

<body>

    <table>
        <h2>Students <a type="button" class="action-btn insert" href="student_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>grade</th>
            <th>gender</th>
            <th>birth</th>
            <th>Delete/Update</th>
        </tr>
        <?php



        $sql = "SELECT id , first_name , last_name , (select name from grades where grades.id = students.grade) grade , gender , dob FROM students;";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $gender = $row['gender'] == 1 ? "Male" : 'Female';
                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['grade']}</td>
                            <td>$gender</td>
                            <td>{$row['dob']}</td>
                            <td>
                                <a class='action-btn delete' href='student_delete.php?rowid={$row['id']}'>delete</a>
                                <a class='action-btn update' href='student_update.php?rowid={$row['id']}'>update</a>
                            </td>

                        </tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    <br>



</body>

</html>