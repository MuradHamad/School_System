<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Form</title>
    <link rel="stylesheet" href="form.css">

</head>
<body>
    <?php
        include("config.php");
        
        if(isset($_GET['name'])){
            $name = $_GET['name'];
            $sql = "insert into Grades (name) values ('$name');";
            if($conn->query($sql)===true){
                header('location:GradeReport.php');
            }
            else{
                echo '<h1 style= "color = red;">0 rows inserted</h1>';
            }

        }
    ?>
    <form>
        <h2>Grades Form</h2>
        <label>Enter Grade Name : <input type="text"name ="name"></label><br>
        <input type="submit">
    </form>
</body>
</html>