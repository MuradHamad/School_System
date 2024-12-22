<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Update</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>

<body>
    <?php
    include('../../config.php');
    $sql = "select * from marks where marks.id = {$_GET['rowid']};";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form method="post">
                <h2>Marks Update</h2>
                <label>Select student:

                    <select name="student_id">
                        <?php
                        $sql = "select * from students";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                $name = $inRow['first_name'] . " " . $inRow['last_name'];
                                echo "<option value='{$inRow["id"]}'" . (($row["student_id"] == $inRow["id"]) ? "selected" : "") . ">$name</option>";
                            }
                        }
                        ?>
                    </select>

                </label>
                <label>Select subject:

                    <select name="subject">
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

                <label>Enter year: <input type="number" name="year" value="<?php echo $row["year"] ?>"></label>

                <label>Select semester:

                    <select name="semester">
                        <?php
                        $sql = "select * from semesters";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                echo "<option value='{$inRow["id"]}'" . (($row["semester"] == $inRow["id"]) ? "selected" : "") . ">{$inRow["name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                </label>

                <label>Select month:

                    <select name="month">
                        <?php
                        $sql = "select * from months";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                echo "<option value='{$inRow["id"]}'" . (($row["month"] == $inRow["id"]) ? "selected" : "") . ">{$inRow["name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                </label>

                <label>Enter mark: <input type="number" name="mark" max="100" value="<?php echo $row["mark"] ?>"></label>

                <input type="hidden" name="edited" value="1">
                <input type="submit">
            </form>

            <?php
            if (isset($_POST["edited"])) {
                $sql = "update marks
            set  student_id = '{$_POST["student_id"]}' , subject = '{$_POST["subject"]}' ,year = '{$_POST["year"]}' ,semester = '{$_POST["semester"]}' ,month = '{$_POST["month"]}',mark = {$_POST["mark"]} 
            where id = {$row["id"]}";
                $conn->query($sql);
                $conn->close();
                header("location:mark_report.php");

            }

        }

    }
    ?>


</body>

</html>