<?php
session_start();
$jid = $_SESSION['ID'];
$id = $_GET['id'];
include '../../Connection_Module.php';
$sql = "DELETE FROM `jobpost_apply` WHERE id = $id and jid = $jid";
$conn->query($sql);
echo "<script>window.location.href = 'AppliedJob.php'</script>";
?>