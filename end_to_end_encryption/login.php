<?php

require_once "db.php";
$email = $_POST["email"];

$sql = "SELECT publicKey FROM users WHERE email = ?";
$result = $conn->prepare($sql);
$result->execute([
    $email
]);
$user = $result->fetchObject();

echo ($user && $user->publicKey != null);
exit();