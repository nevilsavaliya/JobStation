<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
{
    require("PHPMailer/Exception.php");
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'jobstationa07@gmail.com';                     //SMTP username
        $mail->Password = 'stuhhsokrmmtejjb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        //Recipients
        $mail->setFrom('jobstationa07@gmail.com', 'Job Station Mail verification');
        $mail->addAddress($email);     //Add a recipient
        $mail->isHTML(true);
        $otp = $v_code;
        $mail->Subject = 'Email verification';
        $mail->Body = " <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 240px;
        }

        .content {
            margin-top: 20px;
            padding: 0 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #007bff;
            margin-bottom: 15px;
        }

        p {
            font-size: 20px;
            margin-bottom: 20px;
            color: #444;
        }

        .otp {
            font-size: 32px;
            font-weight: bold;
            color: #00cc66;
            margin-bottom: 35px;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 28px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }

        .footer {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #888;
        }
    </style>".'<div class="container">
        <div class="header">
            <h1>OTP Verification</h1>
        </div>
        <div class="content">
            <p>Welcome to our secure verification process!</p>
            <p>To proceed, please enter the OTP code below:</p>
            <p class="otp">' . $otp . '</p>
            <p>This OTP is valid for a limited time. Keep it confidential and do not share it with anyone.</p>
            <a href="#" class="cta-button">Verify Now</a>
        </div>
        <div class="footer">
            <p>If you didnt request this OTP, please ignore this email.</p>
            <p>&copy; 2023 Your Company Name. All rights reserved.</p>
        </div>
    </div>';
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

include 'Connection_Module.php';

if (isset($_POST['user'])) {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $pass = $conn->real_escape_string($_POST["pass"]);
    $user = $conn->real_escape_string($_POST["user"]);
    $sql = "SELECT email from `$user` where email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo 'Account Already Exists';
    } else {
        $otp = rand(10000000, 99999999);
        sendMail($email, $otp);
        $sql = "INSERT INTO `email_verification`( `email`,  `otp`) VALUES ('$email','$otp')";
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
        $_SESSION['user'] = $user;
        $_SESSION['email'] = $email;
        if (!isset($_SESSION['name'])) {
            echo "Cookie named is not set!";
        } else {
            echo "Value is: " . $_SESSION['name'];
        }
        $conn->query($sql);
        echo "<script>window.location.href='http://localhost/JobStation/otp_verification.php'</script>";
    }
}
?>

