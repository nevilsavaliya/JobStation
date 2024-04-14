<?php
include('config.php');
include 'Connection_Module.php';
session_start();
$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
if (!isset($token['error'])) {
    $password = "Job123";
    $user = $_COOKIE['user'];
    $google_client->setAccessToken($token['access_token']);
    $_SESSION['access_token'] = $token['access_token'];
    $google_service = new Google_Service_Oauth2($google_client);
    $data = $google_service->userinfo->get();
    if (!empty($data['email']) && !empty($data['given_name']) && !empty($data['family_name']) && !empty($data['picture'])) {
        if ($user == "employer") {
            $name = $data['given_name'] . " " . $data['family_name'];
            $email = $data['email'];
            $picture = $data['picture'];
            $sql = "SELECT id,email FROM employer WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows <= 0) {
                $imgContent = addslashes(file_get_contents($picture));
                $sql = "INSERT INTO `employer` (`name`, `email`, `password`, `image`) VALUES ('$name', '$email', '$password', '$imgContent')";
                $conn->query($sql);
                $sql = "SELECT id,email FROM employer WHERE email = '$email'";
                $result = $conn->query($sql);
            }
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row["id"];
            $_SESSION['USER'] = $user;
            echo '<script>window.location.href="dashboard/employer/dashboard.php"</script>';
        } elseif ($user == "jobseeker") {
            $name = $data['given_name'] . " " . $data['family_name'];
            $email = $data['email'];
            $picture = $data['picture'];
            $sql = "SELECT id,email FROM jobseeker WHERE email = '$email'";
            $result = $conn->query($sql);
            if ($result->num_rows <= 0) {
                $imgContent = addslashes(file_get_contents($picture));
                if (!empty($data['gender'])) {
                    $gender = $data['gender'];
                    $sql = "INSERT INTO `jobseeker` (`name`, `email`, `password`, `image`,`gender`) VALUES ('$name', '$email', '$password', '$imgContent','$gender')";
                }else{
                    $sql = "INSERT INTO `jobseeker` (`name`, `email`, `password`, `image`) VALUES ('$name', '$email', '$password', '$imgContent')";
                }
                $conn->query($sql);
                $sql = "SELECT id,email FROM jobseeker WHERE email = '$email'";
                $result = $conn->query($sql);
            }
            $row = $result->fetch_assoc();
            $_SESSION['ID'] = $row["id"];
            $_SESSION['USER'] = $user;
            echo '<script>window.location.href="dashboard/jobseeker/dashboard.php"</script>';
        }
    }
}else{
    echo $token['error'];
}
?>