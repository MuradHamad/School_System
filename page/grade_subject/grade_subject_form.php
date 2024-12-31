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
        if ($conn->query($sql) === true) {
            header('location:grade_subject_report.php');
        } else {
            echo '<h1 style= "color = red;">0 rows inserted</h1>';
        }
    }
    ?>
    <form>
        <h2>Grade & Subject Form</h2>
        Select grade:
        <select name="grade" required>
            <option value="" selected disabled>--Select</option>
            <?php
            $sql = "select * from grades;";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    $name = $row['name'];
                    echo "<option value=\"$id\">$name</option>";

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
                    echo "<option value=\"$id\">$name</option>";

                }
            }

            ?>
        </select>

        <input type="submit">
    </form>
</body>

</html>