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
        include('config.php');
        if(isset($_GET['rowid'])){
            $id = $_GET['rowid'];
            $sql = "select * from students where student_id = $id;";
            $result = $conn->query($sql);
            if ($result) {
                // Check if there are rows in the result
                if ($result->num_rows > 0) {
                    // Fetch and display each row
                    while ($row = $result->fetch_assoc()) {
                        $newId = $row['student_id'];
                        $name = $row['student_name'];
                        $address = $row['student_address'];
                    }
                } 
                else {
                    echo "No records found.";
                }
            } 
            else {
                echo "Error: " . $conn->error;
            }
        }

       
    ?>
    <form action = "update2.php">
        <h2 >Students Form</h2>
        <label><input type="hidden"name ="id"value="<?php echo $newId?>"></label><br>
        <label>Enter student name : <input type="text"name ="name"value="<?php echo $name?>"></label><br>
        <label>Enter address <textarea name="address"><?php echo $address?></textarea></label><br>
        <input type="submit">
    </form>
</body>
</html>