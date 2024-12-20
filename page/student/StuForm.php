<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");

    if (isset($_GET['first_name']) && isset($_GET['last_name']) && isset($_GET['grade']) && isset($_GET['dob']) && isset($_GET['gender'])) {
        $first_name = $_GET['first_name'];
        $last_name = $_GET['last_name'];
        $grade = $_GET['grade'];
        $dob = $_GET['dob'];
        $gender = $_GET['gender'] == 1 ? "male" : "female";
        $sql = "insert into students 
            (first_name , last_name , grade , dob , gender) values ('$first_name','$last_name','$grade','$dob','$gender');";
        if ($conn->query($sql) === true) {
            header('location:StuReport.php');
        } else {
            echo '<h1 style= "color = red;">0 rows inserted</h1>';
        }

    }
    ?>
    <form>
        <h2>Students Form</h2>
        <label>Enter student first name : <input type="text" name="first_name"></label><br>
        <label>Enter student last name : <input type="text" name="last_name"></label><br>
        <label>Enter grade :
            <select name="grade">
                <option value="" selected>--Select</option>
                <?php
                $sql = "select * from grades;";
                $result = $conn->query($sql);
                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            echo "<option value=\"$id\">$name</option>";

                        }
                    }
                }
                ?>
            </select>
        </label><br>
        <label>Enter date of birth : <input type="date" name="dob"></label><br>
        Enter gender:
        <select name="gender">
            <option value="" selected>--Select</option>
            <option value="1">male</option>
            <option value="0">female</option>
        </select>
        <br>
        <input type="submit">
    </form>
</body>

</html>