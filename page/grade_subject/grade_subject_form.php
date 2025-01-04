<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade & Subject Form</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");
    buildBreadcrumb('grade_subject_form.php');
    if (isset($_GET['grade']) && isset($_GET['subject'])) {
        $sql = "insert into grades_subjects 
            (grade , subject) values ('{$_GET['grade']}','{$_GET['subject']}');";
            try {
                if ($conn->query($sql)) {
                    header('Location: grade_subject_report.php');
                }
            } catch (mysqli_sql_exception $e) {
                echo '<h1 style="color: red;">0 rows inserted. Error: Duplicate entry or invalid data.</h1>';
            }
    }
    ?>
    <form>
        <h2>Grade & Subject Form</h2>
        Select grade:
        <select name="grade" required>
            <option value="" selected disabled>--Select</option>
            <?php
            $sql = "select * from grades order by 1;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    if($_GET['grade']==$id){
                        echo "<option value=\"$id\" selected>$name</option>";
                    }
                    else{
                        echo "<option value=\"$id\">$name</option>";
                    }

                }
            }

            ?>
        </select>
        Select subject:
        <select name="subject" required>
            <option value="" selected disabled>--Select</option>
            <?php
            $sql = "select * from subjects;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    if($_GET['subject']==$id){
                        echo "<option value=\"$id\" selected>$name</option>";
                    }
                    else{
                        echo "<option value=\"$id\">$name</option>";
                    }

                }
            }

            ?>
        </select>

        <input type="submit">
    </form>
</body>

</html>