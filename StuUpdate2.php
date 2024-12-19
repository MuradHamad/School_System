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
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $grade = $_GET['grade'];
        $gender = $_GET['gender']==1?"male":'female';
        $dob = $_GET['dob'];
        $sql = "update students 
                set  first_name = '$first_name' , last_name = '$last_name' ,grade = '$grade' ,gender = '$gender' ,dob = '$dob' 
                where id = $id";
        $conn->query($sql);
        header("location:StuReport.php");
    ?>
</body>
</html>