<?php
session_start();
$jid = $_SESSION['ID'];
$id = $_GET['id'];
$currentdate = date('Y-m-d');
include '../../Connection_Module.php';
$sql = "SELECT * FROM `jobpost_apply` WHERE `id`=$id AND `jid`=$jid";
$alreadyapply = $conn->query($sql);
if($alreadyapply->num_rows == 0) {
    $sql = "INSERT INTO `jobpost_apply`(`id`, `jid`,`applyDate`) VALUES ('$id','$jid','$currentdate')";
    $conn->query($sql);
    echo "<script>window.location.href = 'jobs.php'</script>";
}else{
    echo "<script>window.location.href = 'jobs.php'</script>";
}
?>