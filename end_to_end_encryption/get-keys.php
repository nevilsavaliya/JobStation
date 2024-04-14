<?php

require_once "db.php";

$sender = $_POST["sender"];
$receiver = $_POST["receiver"];

$sql = "SELECT privateKey FROM users WHERE email = ?";
$result = $conn->prepare($sql);
$result->execute([
    $sender
]);
$userSender = $result->fetchObject();

$sql = "SELECT publicKey FROM users WHERE email = ?";
$result = $conn->prepare($sql);
$result->execute([
    $receiver
]);
$userReceiver = $result->fetchObject();

echo json_encode([
    $userSender->privateKey,
    $userReceiver->publicKey
]);
exit();