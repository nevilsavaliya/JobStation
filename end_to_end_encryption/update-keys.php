<?php

require_once "db.php";

$email = $_POST["email"];
$publicKey = $_POST["publicKey"];
$privateKey = $_POST["privateKey"];

$sql = "UPDATE users SET publicKey = ?, privateKey = ? WHERE email = ?";
$result = $conn->prepare($sql);
$result->execute([
    $publicKey,
    $privateKey,
    $email
]);

echo "Updated";
exit();