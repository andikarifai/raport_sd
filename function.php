<?php
function encryptId($id)
{
    $encryption_key = "Kunc1Enkr1ps1@2023"; // ganti dengan kunci enkripsi yang Anda inginkan
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($id, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

function decryptId($encrypted)
{
    $encryption_key = "Kunc1Enkr1ps1@2023"; // ganti dengan kunci enkripsi yang Anda inginkan
    list($encrypted_data, $iv) = explode('::', base64_decode($encrypted), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}
