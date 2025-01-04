<?php
include '../../AccessBySession.php';
include('../../config.php');
$sql = "delete from grades where Id = {$_GET['rowid']};";
try {
    $conn->query($sql);
    header("location:grade_report.php");
} catch (\Throwable $th) {
    header("location:grade_report.php");
}

$conn->close();
header("location:grade_report.php");
?>
