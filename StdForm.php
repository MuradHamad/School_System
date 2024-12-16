<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleForm.css">
</head>
<body>
    <?php
        include("config.php");
        
        if(isset($_GET['name'])&&isset($_GET['address'])){
            $name = $_GET['name'];
            $address = $_GET['address'];
            $sql = "insert into students (student_name , student_address) values ('$name','$address')";
            if($conn->query($sql)===true){
                header('location:report.php');
            }
            else{
                echo '0 rows inserted';
            }

        }
    ?>
    <form>
        <h2>Students Form</h2>
        <label>Enter student name : <input type="text"name ="name"></label><br>
        <label>Enter address <textarea name="address"></textarea></label><br>
        <input type="submit">
    </form>
</body>
</html>