<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Update</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>

<body>
    <?php
    include('../../config.php');
    buildBreadcrumb('teacher_update.php');

    $sql = "select * from teachers where teachers.id = {$_GET['rowid']};";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form method="post">
                <h2>Teachers Update</h2>
                <label>Enter teacher first name : <input required type="text" name="first_name"
                        value="<?php echo $row["first_name"] ?>"></label>
                <label>Enter teacher last name : <input required type="text" name="last_name"
                        value="<?php echo $row["last_name"] ?>"></label>
                <label>Select subject

                    <select required name="subject">
                        <?php
                        $sql = "select * from subjects";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                echo "<option value='{$inRow["id"]}'" . (($row["subject"] == $inRow["id"]) ? "selected" : "") . ">{$inRow["name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                </label>


                <input type="hidden" name="edited" value="1">
                <input type="submit">
            </form>

            <?php
            if (isset($_POST["edited"])) {
                $sql = "update teachers
            set  first_name = '{$_POST["first_name"]}' , last_name = '{$_POST["last_name"]}' ,subject = '{$_POST["subject"]}'  
            where id = {$row["id"]}";
                $conn->query($sql);
                $conn->close();
                header("location:teacher_report.php");

            }

        }

    }
    ?>


</body>

</html>