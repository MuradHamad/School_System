<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade & Subject Report</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>
<?php include("../../config.php"); ?>

<body>

    <table>
        <h2>Grades & Subjects <a type="button" class="action-btn insert" href="grade_subject_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>grade</th>
            <th>subject</th>
            <th>Delete/Update</th>
        </tr>
        <?php



        $sql = "SELECT id , (SELECT name from grades WHERE grades_subjects.grade = grades.id) grade , (SELECT name from subjects WHERE grades_subjects.subject = subjects.id) subject FROM grades_subjects;";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['grade']}</td>
                            <td>{$row['subject']}</td>
                            <td>
                                <a class='action-btn delete' href='grade_subject_delete.php?rowid={$row['id']}'>delete</a>
                                <a class='action-btn update' href='grade_subject_update.php?rowid={$row['id']}'>update</a>
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