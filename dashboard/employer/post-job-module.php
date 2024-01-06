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
            $title = $conn->real_escape_string($_POST['title']);
            $qualification = $_POST['qualification'];
            $lsalary = $conn->real_escape_string($_POST['lsalary']);
            $hsalary = $conn->real_escape_string($_POST['hsalary']);
            $add = $conn->real_escape_string($_POST['add']);
            $type = $conn->real_escape_string($_POST['jobtype']);
            $category = $conn->real_escape_string($_POST['category']);
            $experience = $conn->real_escape_string($_POST['experience']);
            $gender = $conn->real_escape_string($_POST['gender']);
            $skill = $_POST['skill'];
            $about = $conn->real_escape_string($_POST['about']);
            $deadline = $_POST['deadline'];
            $deadline = date_create($deadline);
            $deadline = date_format($deadline, "Y/m/d");
            $sql = "INSERT INTO `jobpost`(`eid`,`title`, `lsalary`, `hsalary`, `address`, `jobtype`, `category`, `experience`, `gender`, `about`, `deadline`) "
                    . "VALUES ('$eid','$title','$lsalary','$hsalary','$add','$type','$category','$experience','$gender','$about','$deadline')";
            $conn->query($sql);
            $sql = "select id from jobpost where eid = '$eid' ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $postid = $row['id'];
            foreach ($qualification as $value) {
                $sql = "INSERT INTO `jobpost_qualification`(`id`, `qualification`) VALUES ('$postid','$value')";
                $conn->query($sql);
            }
            foreach ($skill as $value) {
                $sql = "INSERT INTO `jobpost_skill`(`id`, `skill`) VALUES ('$postid','$value')";
                $conn->query($sql);
            }
            echo '<script>window.location.href="dashboard.php"</script>';
            $conn->close();
        }
        ?>
    </body>
</html>
