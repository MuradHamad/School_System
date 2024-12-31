<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Select</title>
    <link rel="stylesheet" href="../../styles/form.css">
</head>
<body>
    <?php
        include("..\..\config.php");
        buildBreadcrumb('mark_select.php');
    ?>
    <form action="mark_report.php">
        <label>Choose Grade : 
        <select required name="grade">
                <option value="" selected disabled>--Select</option>
                <?php
                
                $sql = "select * from grades;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        echo "<option value=\"$id\">$name</option>";

                    }
                }
                ?>
        </select>
        </label>
        <input type="submit">
    </form>
</body>
</html>