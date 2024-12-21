<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/form.css">

</head>

<body>
    <?php
    include('../../config.php');
    if (isset($_GET['rowid']) && !empty($_GET['rowid'])) {

        $id = $_GET['rowid'];
        $sql = "SELECT teachers.id , first_name , last_name, subjects.name FROM teachers INNER JOIN subjects ON teachers.subject = subjects.id;";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $newId = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $name = $row['name'];
                }
            } else {
                echo "No records found.";
            }
        } else {
            echo "<h1 style =\"color :red;\">Error: " . $conn->error . "</h1>";
        }



        ?>
        <form action="teacher_update2.php">
            <h2>Teachers Form</h2>
            <label><input type="hidden" name="id" value="<?php echo $newId ?>"></label><br>
            <label>Enter teacher first name : <input type="text" name="first_name"
                    value="<?php echo $first_name ?>"></label><br>
            <label>Enter teacher last name : <input type="text" name="last_name"
                    value="<?php echo $last_name ?>"></label><br>
            <label>Enter subject <br>

                <select name="subject">
                    <?php
                    $sql = "select * from subjects;";
                    $result = $conn->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                                echo "<option value=\"$id\">$name</option>";

                            }
                        }
                    }
                    ?>
                </select>

            </label><br>

            <input type="submit">
        </form>
        <?php
    } else {
        header('location:teacher_report.php?err=1');
    }
    ?>
</body>

</html>