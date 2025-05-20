<?php
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Extract local part of email before @
$student_no_from_email = '';
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $parts = explode('@', $email);
    $student_no_from_email = $parts[0];
}

// Regex pattern: one letter followed by 9 digits
$pattern = '/^[a-zA-Z]{1}\d{9}$/';

if (preg_match($pattern, $student_no_from_email) && preg_match($pattern, $password)) {
    if ($password === $student_no_from_email) {
        echo "<!DOCTYPE html>
        <html lang='tr'>
        <head>
            <meta charset='UTF-8'>
            <title>Successfull login</title>
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
        <body class='messagebox'>
            <h2>Welcome, $password</h2>
            <a href='../index.html'>Go to homepage</a>
        </body>
        </html>";
    } else {
        header("Location: login.html");
        exit();
    }
} else {
    // Invalid format
    header("Location: login.html");
    exit();
}
?>
