<?php

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    if (empty($user) || empty($pass)) {
        echo "Kullanıcı adı veya şifre boş olamaz";
        exit;
    }

    if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
        echo "Geçersiz e-posta formatı";
        exit;
    }

    if (substr($user, -17) !== '@sakarya.edu.tr') {
        echo "Sadece @sakarya.edu.tr uzantılı e-postalara izin verilmektedir";
        exit;
    }

    $expected_pass = explode('@', $user)[0];

    if ($pass === $expected_pass) {
        echo "Giriş başarılı. Hoşgeldiniz <strong>$pass</strong>";
    } else {
        echo "Şifre yanlış. Giriş başarısız";
    }
} else {
    echo "Form verisi alınamadı Lütfen tekrar deneyin.";
}

?>