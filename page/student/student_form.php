<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");
    buildBreadcrumb('student_form.php');
    if (isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['grade']) && isset($_GET['dob']) && isset($_GET['gender'])) {
        $sql = "insert into students 
            (first_name , last_name , grade , dob , gender) values ('{$_GET['first_name']}','{$_GET['last_name']}','{$_GET['grade']}','{$_GET['dob']}','{$_GET['gender']}');";
        if ($conn->query($sql) === true) {
            header('location:student_report.php');
        } else {
            echo '<h1 style= "color = red;">0 rows inserted</h1>';
        }
    }
    ?>
    <form>
        <h2>Student Form</h2>
        <label>Enter student first name: <input type="text" name="first_name" required></label>
        <label>Enter student last name: <input type="text" name="last_name" required></label>
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

        Select gender:
        <select name="gender" required>
            <option value="" selected>--Select</option>
            <option value="1">male</option>
            <option value="0">female</option>
        </select>

        <label>Enter date of birth: <input type="date" name="dob" required></label>


        <input type="submit">
    </form>
</body>

</html>