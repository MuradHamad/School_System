<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "school";
        $conn = new mysqli($server,$user,$pass,$database);
        if($conn->connect_error){
            die("connection failed.");
        }
    ?>
</body>
</html>