<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Report</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>
<?php include("../../config.php"); ?>

<body>

    <table>
        <h2>Marks <a type="button" class="action-btn insert" href="mark_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>student_id</th>
            <th>subject</th>
            <th>year</th>
            <th>semester</th>
            <th>month</th>
            <th>mark</th>
            <th>Delete/Update</th>
        </tr>
        <?php



        $sql = "SELECT id , 
                student_id , 
                (select name from subjects where marks.subject = subjects.id) subject ,
                year ,
                (select name from semesters where marks.semester = semesters.id) semester,
                (select name from months where marks.month = months.id) month,
                mark
                FROM marks;";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['student_id']}</td>
                            <td>{$row['subject']}</td>
                            <td>{$row['year']}</td>
                            <td>{$row['semester']}</td>
                            <td>{$row['month']}</td>
                            <td>{$row['mark']}</td>
                            <td>
                                <a class='action-btn delete' href='mark_delete.php?rowid={$row['id']}'>delete</a>
                                <a class='action-btn update' href='mark_update.php?rowid={$row['id']}'>update</a>
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