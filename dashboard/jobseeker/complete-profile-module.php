<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
include '../../Connection_Module.php';
if (isset($_POST['submit'])) {
    $jid = $conn->real_escape_string($_SESSION['ID']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $skill = $_POST['skill'];
    $qualification = $_POST['qualification'];
    $address = $conn->real_escape_string($_POST['add']);
    $field = $conn->real_escape_string($_POST['field']);
    $mobile = $conn->real_escape_string($_POST['MobileNo']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $experience = $conn->real_escape_string($_POST['exp']);
    $city = $conn->real_escape_string($_POST['city']);
    $dob = date_create($dob);
    $dob = date_format($dob, "Y/m/d");
    $statusMsg = '';
    $fileName = basename($_FILES["image"]["name"]);
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $resume = $_FILES['resume']['tmp_name'];
    $pdf_data = file_get_contents($resume);
    $resumecontent = base64_encode($pdf_data);
    $about = $conn->real_escape_string($_POST['about']);
    $city = $conn->real_escape_string($_POST['city']);
    $sql = "UPDATE `jobseeker` SET `gender`='$gender',`address`='$address',`field_name`='$field'" . ",`resume`='$resumecontent',`phone`='$mobile',`date_of_Birth`='$dob',`about`='$about'," . "`city`='$city',`experience`='$experience',`image`='$imgContent',`complete`= 1 WHERE `id` = $jid";
    if ($conn->query($sql) === TRUE) {
        foreach ($qualification as $value) {
            $sql = "INSERT INTO `jobseeker_qualification`(`id`, `qualification`) VALUES ('$jid','$value')";
            $conn->query($sql);
        }
        foreach ($skill as $value) {
            echo $value;
            $sql = "INSERT INTO `jobseeker_skill`(`id`, `skill`) VALUES ('$jid','$value')";
            $conn->query($sql);
        }
        echo "<script>window.location.href = 'dashboard.php'</script>";
    }
    $conn->close();
}
?>
</body>
</html>
