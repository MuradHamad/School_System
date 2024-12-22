<!DOCTYPE html>
<html lang="en">
<?php include("../../config.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Report</title>
    <link rel="stylesheet" href="../../styles/report.css">
    <link rel="stylesheet" href="../../styles/input.php">
</head>

<body>

    <table>
        <h2>Subjects <a type="button" class="action-btn insert" href="subject_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>Delete/Update</th>
        </tr>
        <?php



        $sql = "SELECT id , name FROM subjects;";


        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>
                                <a class='action-btn delete' href='subject_delete.php?rowid={$row['id']}'>delete</a>
                                <a class='action-btn update' href='subject_update.php?rowid={$row['id']}'>update</a>
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