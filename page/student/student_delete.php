<?php
include('../../config.php');
$sql = "delete from students where Id = {$_GET['rowid']};";
$conn->query($sql);
$conn->close();
header("location:student_report.php");
?>