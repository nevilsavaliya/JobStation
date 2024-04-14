<?php

require_once "db.php";

$sender = $_POST["sender"];
$receiver = $_POST["receiver"];

$sql = "SELECT * FROM messages WHERE sender = ? AND receiver = ?";
$result = $conn->prepare($sql);
$result->execute([
    $sender,
    $receiver
]);
$messages = $result->fetchAll(PDO::FETCH_OBJ);

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
    "messages" => $messages,
    "privateKey" => $userSender->privateKey,
    "publicKey" => $userReceiver->publicKey
]);
exit();