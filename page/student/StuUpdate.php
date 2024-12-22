<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../styles/form.css">

</head>

<body>
    <?php
    include('../../config.php');
    if (isset($_GET['rowid']) && !empty($_GET['rowid'])) {

        $id = $_GET['rowid'];
        $sql = "select * from students where id = $id;";
        $result = $conn->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $newId = $row['id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $grade = $row['grade'];
                    $dob = $row['dob'];
                    $gender = $row['gender'];
                }
            } else {
                echo "No records found.";
            }
        } else {
            echo "<h1 style =\"color :red;\">Error: " . $conn->error . "</h1>";
        }


        ?>
        <form action="StuUpdate2.php">
            <h2>Students Form</h2>
            <label><input type="hidden" name="id" value="<?php echo $newId ?>"></label><br>
            <label>Enter student first name : <input type="text" name="first_name"
                    value="<?php echo $first_name ?>"></label><br>
            <label>Enter student last name : <input type="text" name="last_name"
                    value="<?php echo $last_name ?>"></label><br>
            <label>Enter grade <br>

                <select name="grade">
                    <?php
                    $sql = "select * from grades;";
                    $result = $conn->query($sql);
                    if ($result) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['id'];
                                $name = $row['name'];
                            if($grade == $id )
                                echo  "<option value=\"$id\" selected>$name</option>";
                            else
                                    echo "<option value=\"$id\">$name</option>";

                            }
                        }
                    }
                    ?>
                </select>

            </label><br>
            <label>Enter gender <br>
                <select name="gender">
                    <option value="1" <?php if ($gender == 1) echo "selected" ?>>male</option>
                        <option value="0" <?php if ($gender == 0) echo "selected" ?>>female</option>
                    </select>

                </label><br>
                <label>Enter date of birth : <br><input type="date" name="dob" value="<?php echo $dob ?>"></label><br>
            <input type="submit">
        </form>
        <?php
    } else {
        header('location:StuReport.php?err=1');
    }
    ?>
</body>

</html>