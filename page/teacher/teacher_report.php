<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Report</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>
<?php include("../../config.php");
    buildBreadcrumb('teacher_report.php');

?>

<body>

    <table>
        <h2>Teachers <a type="button" class="action-btn insert" href="teacher_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>subject</th>
            <th>Delete/Update</th>
        </tr>
        <?php



        $sql = "SELECT id , first_name , last_name , (select name from subjects where subjects.id = teachers.subject) subject  FROM teachers;";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['subject']}</td>
                            <td>
                                <a class='action-btn delete' href='teacher_delete.php?rowid={$row['id']}' onclick='return confirmDelete()'>delete</a>
                                <a class='action-btn update' href='teacher_update.php?rowid={$row['id']}'>update</a>
                            </td>

                        </tr>";
            }
        }

        $conn->close();
        ?>
    </table>
    <br>


    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>

</body>

</html>