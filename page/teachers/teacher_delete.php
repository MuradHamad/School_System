<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include('../../config.php');
    $row = $_GET['rowid'];
    if (!empty($_GET['rowid'])) {
        echo $_GET['rowid'];
        $sql = "delete from teachers where Id = $row;";
        $conn->query($sql);
    } else {
        header('location:teacher_report.php?err=1');
    }
    $conn->close();
    header("location:teacher_report.php");
    ?>
</body>

</html>