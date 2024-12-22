<?php
include('../../config.php');
$sql = "delete from marks where Id = {$_GET['rowid']};";
$conn->query($sql);
$conn->close();
header("location:mark_report.php");
?>