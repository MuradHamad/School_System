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
        $id = $_GET['id'];
        $name = $_GET['name'];
        $address = $_GET['address'];
        $sql = "update students 
                set  student_name = '$name' , student_address = '$address'
                where student_id = $id";
        $conn->query($sql);
        header("location:report.php");
    ?>
</body>
</html>