<?php

// A simple JWT implementation in PHP, for get files with a JWT token

// JWT secret
$secret = 'my_secret_key';

// Get the JWT token from the URL
$action = $_GET['action'];
$token = $_GET['jwt_file'];

// Decode the JWT token
$decoded = JWT::decode($token, $secret, array('HS256'));

// Get the file name from the decoded JWT token
$file = $decoded->file;

if ($action == 'DOWNLOAD') {
    // Download the file
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
}
elseif ($action == 'VIEW') {
    // View the file
    $content = file_get_contents($file);
}
else {
    // Invalid action
    die('Invalid action');
}

// Return the file content
echo $content;

// JWT class
class JWT
{
    public static function encode($data, $key)
    {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
        $payload = json_encode($data);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $key, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    public static function decode($jwt, $key)
    {
        $jwt = explode('.', $jwt);

        $payload = json_decode(base64_decode(str_replace(['-', '_'], ['+', '/'], $jwt[1])));

        return $payload;
    }
}

?>