<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$student_no_from_email = '';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $parts = explode('@', $email);
    $student_no_from_email = $parts[0];
}

$expected_password = $student_no_from_email;

if ($password === $expected_password) {
    echo "<!DOCTYPE html>
    <html lang='tr'>
    <head>
        <meta charset='UTF-8'>
        <title>Başarılı Giriş</title>
        <style>
            body {
                background-color: #000;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <h2>Hoşgeldiniz $password</h2>
    </body>
    </html>";
} else {
    header("Location: login.html");
    exit();
}
?>
