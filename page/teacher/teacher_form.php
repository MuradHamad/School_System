<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Form</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");
    buildBreadcrumb('teacher_form.php');
    if (isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['subject'])) {
        $sql = "insert into teachers 
            (first_name , last_name , subject) values ('{$_GET['first_name']}','{$_GET['last_name']}','{$_GET['subject']}');";
        if ($conn->query($sql) === true) {
            header('location:teacher_report.php');
        } else {
            echo '<h1 style= "color = red;">0 rows inserted</h1>';
        }
    }
    ?>
    <form>
        <h2>Teachers Form</h2>
        <label>Enter teacher first name: <input required type="text" name="first_name"></label>
        <label>Enter teacher last name: <input required type="text" name="last_name"></label>
        Select subject:
        <select required name="subject">
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