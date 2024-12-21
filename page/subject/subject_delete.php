<?php
include('../../config.php');
$sql = "delete from subjects where Id = {$_GET['rowid']};";
try {
    $conn->query($sql);
} catch (\Throwable $th) {
    header("location:subject_report.php");
}
$conn->close();
header("location:subject_report.php");
?>