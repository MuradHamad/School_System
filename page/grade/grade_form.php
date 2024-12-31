<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Form</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");
    buildBreadcrumb('grade_form.php');

    if (isset($_GET['name'])) {
        $sql = "insert into grades 
            (name) values ('{$_GET['name']}');";
        if ($conn->query($sql) === true) {
            header('location:grade_report.php');
        } else {
            echo '<h1 style= "color = red;">0 rows inserted</h1>';
        }
    }
    ?>
    <form>
        <h2>Grade Form</h2>
        <label>Enter grade name: <input required type="text" name="name"></label>
        <input type="submit">
    </form>
</body>

</html>