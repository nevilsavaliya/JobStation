<?php

function encryptAES($plaintext, $key, $iv) {
    $cipher = "aes-256-gcm";
    $tag = "";
    $ciphertext = openssl_encrypt($plaintext, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);

    // Combine IV, ciphertext, and tag for storage or transmission
    $encryptedData = $iv . $ciphertext . $tag;

    return base64_encode($encryptedData);
}

function decryptAES($encryptedData, $key) {
    $cipher = "aes-256-gcm";
    $decodedData = base64_decode($encryptedData);

    // Extract IV, ciphertext, and tag from the combined data
    $iv = substr($decodedData, 0, openssl_cipher_iv_length($cipher));
    $ciphertext = substr($decodedData, openssl_cipher_iv_length($cipher), -$tagLength = 16);
    $tag = substr($decodedData, -$tagLength);

    // Perform decryption
    $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv, $tag);

    return $plaintext;
}

// Example usage
$key = "your_secret_key_here";
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length("aes-256-gcm"));

$plaintext = "Hello, encryption and decryption in PHP!";
$encryptedData = encryptAES($plaintext, $key, $iv);

echo "Original Text: $plaintext\n";
echo "Encrypted Data: $encryptedData\n";

$decryptedText = decryptAES($encryptedData, $key);
echo "Decrypted Text: $decryptedText\n";

?>
