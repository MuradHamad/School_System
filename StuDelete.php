<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('config.php');
        $row = $_GET['rowid'];
        $sql = "delete from students where Id = $row;";
        $conn->query($sql);
        header("location:StuReport.php");
    ?>
</body>
</html>