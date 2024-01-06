<?php
include '../../Connection_Module.php';
$status = $_GET['status'];
$id = $_GET['id'];
$postid = explode(",",$id)[0];
$jid = explode(",",$id)[1];
if($status == "approve"){
    $sql = "UPDATE `jobpost_apply` SET `status`='a' WHERE id=$postid and jid=$jid";
    $conn->query($sql);
}
if($status == "reject"){
    $sql = "UPDATE `jobpost_apply` SET `status`='r' WHERE id=$postid and jid=$jid";
    $conn->query($sql);
}
if($status == "delete"){
    $sql = "UPDATE `jobpost_apply` SET `status`='d' WHERE id=$postid and jid=$jid";
    $conn->query($sql);
}
echo '<script>window.location.href="http://localhost/JobStation/dashboard/employer/applicants.php"</script>';