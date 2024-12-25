<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Update</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>

<body>
    <?php
    include('../../config.php');
    $sql = "select * from subjects where subjects.id = {$_GET['rowid']};";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form method="post">
                <h2>Subjects Form</h2>
                <label>Enter subject name : <input required type="text" name="name" value="<?php echo $row["name"] ?>"></label>
                <input type="hidden" name="edited" value="1">
                <input type="submit">
            </form>

            <?php
            if (isset($_POST["edited"])) {
                $sql = "update subjects
                        set  name = '{$_POST["name"]}' 
                        where id = {$row["id"]}";
                $conn->query($sql);
                $conn->close();
                header("location:subject_report.php");

            }

        }

    }
    ?>


</body>

</html>