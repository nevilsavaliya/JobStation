<?php
session_start();
$email = $_SESSION['EMAIL'];
$user = $_SESSION['USER'];

if(isset($_POST['captured-images'])) {
    include '../Connection_Module.php';
    $sql = "SELECT * FROM $user WHERE `email` = '$email'";
    $idarr = $conn->query($sql);
    $id = $idarr->fetch_assoc()['id'];
    $capturedImages = explode('#', $_POST['captured-images']);
    foreach ($capturedImages as $index => $imgContent) {
        $imgContent = substr($imgContent, strpos($imgContent, ',') + 1);
        $imgContent = str_replace(' ', '+', $imgContent);
        $sql = "INSERT INTO `faces`(`uid`, `user`, `img`) VALUES ('$id','$user','$imgContent')";
        $conn->query($sql);
    }
    $command = escapeshellcmd('python main.py');
    $output = shell_exec("$command $id $user");
    if ($output == "1"){
        echo "<script>window.location.href = '../dashboard/$user/dashboard.php'";
    }else {
        echo "<script>window.location.href = 'detail.php?err=true'</script>";
    }
    $sql = "DELETE FROM `faces` WHERE `uid` = $id";
    $conn->query($sql);

//    $sql = "SELECT * FROM `faces` WHERE `uid` = $id";
//    $imagesarr = $conn->query($sql);
//    while($images = $imagesarr->fetch_assoc()){
//        echo '<img src="data:image/jpg;charset=utf8;base64,';
//        echo $images['img'] . '"alt = "">';
//    }
}
?>
