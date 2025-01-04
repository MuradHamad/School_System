<?php
include '../../AccessBySession.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mark Form</title>
    <link rel="stylesheet" href="..\..\styles\form.css">

</head>

<body>
    <?php
    include("..\..\config.php");
    $grade = $_GET['grade'];
    buildBreadcrumb('mark_form.php',$grade);
    if (isset($_GET['student_id']) && isset($_GET['subject']) && isset($_GET['year']) && isset($_GET['semester']) && isset($_GET['month']) && isset($_GET['mark'])) {
        $sql = "insert into marks 
        (student_id ,grade, subject , year , semester , month,mark) values ('{$_GET['student_id']}',$grade,'{$_GET['subject']}','{$_GET['year']}','{$_GET['semester']}','{$_GET['month']}','{$_GET['mark']}');";
        try{
            if ($conn->query($sql) === true) {
                header("location:mark_report.php?grade=$grade");
            } 
        }
        catch(mysqli_sql_exception $e1){
                echo '<h1 style= "color : red;">0 rows inserted. Error: Duplicate entry </h1>';
            }
        }
    ?>
    <form>
        <h2>Marks Form</h2>
        <label>Select student:
            <select required name="student_id">
                <option value="" selected disabled>--Select</option>
                <?php
                
                $sql = "select * from students where grade = $grade;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['first_name'] . " " . $row['last_name'];
                        if($_GET['student_id']==$id){
                            echo "<option value=\"$id\" selected>$name</option>";
                        }
                        else{
                            echo "<option value=\"$id\">$name</option>";
                        }

                    }
                }
                ?>
            </select>

        </label>
        <label>
            Enter Grade : <input type="text"name = 'grade'value =<?php echo $grade?> readonly>
        </label>
        <label>Select subject:
            <select required name="subject">
                <option value="" selected disabled>--Select</option>
                <?php
                $sql = "select id, grade , subject , (select name from subjects s where s.id = gs.subject)name  from grades_subjects gs where grade = $grade;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $subject = $row['subject'];
                        $name = $row['name'];
                        if($_GET['subject']==$subject){
                            echo "<option value=\"$subject\" selected>$name</option>";
                        }
                        else{
                            echo "<option value=\"$subject\">$name</option>";
                        }

                    }
                }
                ?>
            </select>
        </label>

        <label>Enter year: <input required type="number" name="year"value =<?php 
        if(isset($_GET['year']))echo $_GET['year']
        ?>></label>

        <label>Select semester:
            <select required name="semester">
                <option value="" selected disabled>--Select</option>
                <?php
                $sql = "select * from semesters;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        if($_GET['semester']==$id){
                            echo "<option value=\"$id\" selected>$name</option>";
                        }
                        else{
                            echo "<option value=\"$id\">$name</option>";
                        }

                    }
                }
                ?>
            </select>
        </label>
        <label>Select month:
            <select required name="month">
                <option value="" selected disabled>--Select</option>
                <?php
                $sql = "select * from months;";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        if($_GET['month']==$id){
                            echo "<option value=\"$id\" selected>$name</option> ";
                        }
                        else{
                            echo "<option value=\"$id\">$name</option>";
                        }

                    }
                }
                ?>
            </select>
        </label>
        <label>Enter marks:<input required type="number" name="mark" value =<?php 
        if(isset($_GET['mark']))echo $_GET['mark']
        ?>></label>
        <input type="submit">

    </form>
</body>

</html>