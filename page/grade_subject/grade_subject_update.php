<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade & Subject Update</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>

<body>
    <?php
    include('../../config.php');
    buildBreadcrumb('grade_subject_update.php');
    $sql = "select * from grades_subjects where grades_subjects.id = {$_GET['rowid']};";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form method="post">
                <h2>Grades & Subjects Update</h2>
                <label>Select grade
                    <select required name="grade">
                        <?php
                        $sql = "select * from grades";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                echo "<option value='{$inRow["id"]}'" . (($row["grade"] == $inRow["id"]) ? "selected" : "") . ">{$inRow["name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                </label>

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
                $sql = "update grades_subjects
            set  grade = '{$_POST["grade"]}' , subject = '{$_POST["subject"]}'
            where id = {$row["id"]}";
                $conn->query($sql);
                $conn->close();
                header("location:grade_subject_report.php");

            }

        }

    }
    ?>


</body>

</html>