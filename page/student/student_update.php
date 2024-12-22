<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Update</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>

<body>
    <?php
    include('../../config.php');
    $sql = "select * from students where students.id = {$_GET['rowid']};";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) { ?>
            <form method="post">
                <h2>Students Update</h2>
                <label>Enter student first name : <input required type="text" name="first_name"
                        value="<?php echo $row["first_name"] ?>"></label>
                <label>Enter student last name : <input required type="text" name="last_name"
                        value="<?php echo $row["last_name"] ?>"></label>
                <label>Select grade
                    <select required name="grade">
                        <?php
                        $sql = "select * from grades";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($inRow = $result->fetch_assoc()) {
                                echo "<option value='{$inRow["id"]}'" . (($row["grade"] == $inRow["id"]) ? "selected" : "") . ">{$inRow["name"]}</option>";
                            }
                        }
                        ?>
                    </select>

                </label>
                <label>Select gender
                    <select required name="gender">
                        <option value="1" <?php if ($row["gender"])
                            echo "selected" ?>>Male</option>
                            <option value="0" <?php if (!$row["gender"])
                            echo "selected" ?>>Female</option>
                        </select>
                    </label>
                    <label>Enter date of birth: <input type="date" name="dob" value="<?php echo $row["dob"] ?>" required></label>

                <input type="hidden" name="edited" value="1">
                <input type="submit">
            </form>

            <?php
            if (isset($_POST["edited"])) {
                $sql = "update students
            set  first_name = '{$_POST["first_name"]}' , last_name = '{$_POST["last_name"]}' ,grade = '{$_POST["grade"]}' ,gender = '{$_POST["gender"]}' ,dob = '{$_POST["dob"]}' 
            where id = {$row["id"]}";
                $conn->query($sql);
                $conn->close();
                header("location:student_report.php");

            }

        }

    }
    ?>


</body>

</html>