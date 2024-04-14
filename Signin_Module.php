<?php
include 'Connection_Module.php';
date_default_timezone_set("Asia/Calcutta");
if (isset($_POST['submit'])) {
    //$job_id;
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $conn->real_escape_string($_POST['pass']);
    if ($email == "Admin@gmail.com" && $pass == "Admin@123") {
        echo "<script>window.location.href = 'dashboard/admin/dashboard.php'</script>";
    } else {
        $user = $_POSfT["user"];
        $sql = "SELECT * FROM `$user` WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $password = $row["password"];
            $key = $row["ekey"];
            function decryptAES($encryptedData, $key) {
                $cipher = "aes-256-gcm";
                $decodedData = base64_decode($encryptedData);

                // Extract IV, ciphertext, and tag from the combined data
                $iv = substr($decodedData, 0, openssl_cipher_iv_length($cipher));
                $ciphertext = substr($decodedData, openssl_cipher_iv_length($cipher), -$tagLength = 16);
                $tag = substr($decodedData, -$tagLength);

                // Perform decryption
                $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);

                echo "<script>alert('$plaintext')</script>";

                return $plaintext;
            }
            $password = decryptAES($password, $key);
            if (!isset($row['bantime'])) {
                if ($pass == $password) {
                    $_SESSION['ID'] = $row["id"];
                    $_SESSION['USER'] = $user;
                    $conn->close();
                    if ($user == "jobseeker") {
                        echo "<script>window.location.href='dashboard/jobseeker/dashboard.php'</script>";
                    } else {
                        echo "<script>window.location.href='dashboard/employer/dashboard.php'</script>";
                    }
                } else {
                    echo 'Wrong Password';
                }
            } else {
                $bandate = $row['startdate'];
                $bantime = $row['starttime'];
                $bannumber = $row['bantime'];
                $banduration = $row['bantimespan'];
                $ban = "$bandate $bantime";
                if ($banduration == "h") {
                    $timestamp = strtotime($ban);
                    $time = $timestamp + ($bannumber * 60 * 60);
                    $ban = new DateTime(date("Y-m-d H:i:s", $time));
                }
                if ($banduration == "d") {
                    $timestamp = strtotime($ban);
                    $time = $timestamp + ($bannumber * 60 * 60 * 24);
                    $ban = new DateTime(date("Y-m-d H:i:s", $time));
                }
                if ($banduration == "m") {
                    $timestamp = strtotime($ban);
                    $time = $timestamp + ($bannumber * 60 * 60 * 24 * 30);
                    $ban = new DateTime(date("Y-m-d H:i:s", $time));
                }
                if ($banduration == "y") {
                    $timestamp = strtotime($ban);
                    $time = $timestamp + ($bannumber * 60 * 60 * 24 * 30 * 12);
                    $ban = new DateTime(date("Y-m-d H:i:s", $time));
                }
                $currenttime = date("H:i:s");
                $currentdate = date("Y-m-d");
                $current = new DateTime("$currentdate $currenttime");
                if ($ban > $current) {
                    $diff = $ban->diff($current);
//                        echo $diff->days.' Days total<br>';
                    echo 'Your Account is Ban for' . $diff->y . ' Years ';
                    echo $diff->m . ' Months ';
                    echo $diff->d . ' Days ';
                    echo $diff->h . ' Hours ';
                    echo $diff->i . ' Minutes ';
                    echo $diff->s . ' Seconds ';
                } else {
                    $sql = "UPDATE `$user` SET `bantime`=null,`bantimespan`=null,`startdate`=null,`starttime`=null WHERE email='$email'";
                    $conn->query($sql);
                    if ($pass == $row["password"]) {
                        $_SESSION['ID'] = $row["id"];
                        $conn->close();
                        if ($user == "jobseeker") {
                            echo "<script>window.location.href='dashboard/jobseeker/dashboard.php'</script>";
                        } else {
                            echo "<script>window.location.href='dashboard/employer/dashboard.php'</script>";
                        }
                    } else {
                        echo 'Wrong Password';
                    }
                }
            }
        } else {
            echo 'No Account Found';
        }
    }
}
?>