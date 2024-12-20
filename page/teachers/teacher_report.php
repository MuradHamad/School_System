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
        <h2>Teachers <a type="button" class="action-btn insert" href="teacher_form.php">+</a></h2>
        <tr>
            <th>id</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>subject</th>
            <th>Edit/Delete</th>
        </tr>
        <?php



        $sql = "SELECT teachers.id , first_name , last_name, subjects.name FROM teachers INNER JOIN subjects ON teachers.subject = subjects.id;";


        $result = $conn->query($sql);


        if ($result) {

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['first_name']}</td>
                            <td>{$row['last_name']}</td>
                            <td>{$row['name']}</td>
                            <td><a class='action-btn delete' href='teacher_delete.php?rowid={$row['id']}'>delete</a><a class='action-btn update' href='teacher_update.php?rowid={$row['id']}'>update</a></td>
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


    <?php
    if (isset($_GET['err']) && $_GET['err'] == 1) {
        echo "<h4 style =\"color :red;\">NO ID ENTERED</h4>";
    }
    ?>
    </form>
</body>

</html>