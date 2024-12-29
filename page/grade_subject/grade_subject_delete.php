<?php
include('../../config.php');
$sql = "delete from grades_subjects where Id = {$_GET['rowid']};";
$conn->query($sql);
$conn->close();
header("location:grade_subject_report.php");
?>