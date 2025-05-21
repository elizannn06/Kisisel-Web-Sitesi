<?php

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    $user = $_POST["user"];
    $pass = $_POST["pass"];

    // Alanlar boş mu?
    if (empty($user) || empty($pass)) {
        echo "Kullanıcı adı veya şifre boş olamaz!";
        exit;
    }

    // Geçerli e-posta formatı mı?
    if (!filter_var($user, FILTER_VALIDATE_EMAIL)) {
        echo "Geçersiz e-posta formatı!";
        exit;
    }

    // Sadece @sakarya.edu.tr uzantılı mı?
    if (substr($user, -17) !== '@sakarya.edu.tr') {
        echo "Sadece @sakarya.edu.tr uzantılı e-postalara izin verilmektedir!";
        exit;
    }

    // Beklenen şifre: e-posta adresinin '@' öncesi
    $expected_pass = explode('@', $user)[0];

    if ($pass === $expected_pass) {
        echo "Giriş başarılı. Hoşgeldiniz <strong>$pass</strong>!";
    } else {
        echo "Şifre yanlış. Giriş başarısız!";
    }
} else {
    echo "Form verisi alınamadı! Lütfen tekrar deneyin.";
}


?>