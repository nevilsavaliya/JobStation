<?php

require_once "db.php";

$sender = $_POST["sender"];
$receiver = $_POST["receiver"];
$message = $_POST["message"];
$iv = $_POST["iv"];

$sql = "INSERT INTO messages(sender, receiver, message, iv) VALUES (?, ?, ?, ?)";
$result = $conn->prepare($sql);
$result->execute([
    $sender,
    $receiver,
    $message,
    $iv
]);
echo $conn->lastInsertId();