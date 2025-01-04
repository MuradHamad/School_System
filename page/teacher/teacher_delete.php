<?php
include '../../AccessBySession.php';
?>
<?php
include('../../config.php');
$sql = "delete from teachers where Id = {$_GET['rowid']};";
$conn->query($sql);
$conn->close();
header("location:teacher_report.php");
?>