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
    $eid = $_SESSION['ID'];
    $address = $conn->real_escape_string($_POST['add']);
    $field = $conn->real_escape_string($_POST['field']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $foundation = $_POST['foundation'];
    $foundation = date_create($foundation);
    $foundation = date_format($foundation, "Y/m/d");
    $statusMsg = '';
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg');
    if (in_array($fileType, $allowTypes)) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';

    }
    echo $statusMsg;
    if ($statusMsg == '') {
        $about = $conn->real_escape_string($_POST['about']);
        $city = $conn->real_escape_string($_POST['city']);
        $sql = "UPDATE `employer` SET `address`='$address',`field_name`='$field'" . ",`phone`='$mobile',`date_of_establishment`='$foundation',`about`='$about'," . "`city`='$city',`image`='$imgContent',`complete`= 1 WHERE `id` = $eid";
        if($conn->query($sql) === TRUE){
            echo "<script>window.location.href = 'dashboard.php'</script>";
        }
    }
    $conn->close();
}
?>
</body>
</html>
