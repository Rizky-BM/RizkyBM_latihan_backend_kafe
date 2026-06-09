<?php
session_start();

$kelasList = [
    "Basic Brewing" => 150000,
    "Latte Art Pemula" => 200000,
    "Bisnis Kopi Rumahan" => 250000
];

if (isset($_POST['reset'])) {
    session_destroy();
    header("Location: index.php");
    exit;
}

$errors = [];

if (isset($_POST['daftar'])) {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $wa = trim($_POST['wa'] ?? '');
    $kelas = $_POST['kelas'] ?? '';
    $jumlah = (int) ($_POST['jumlah'] ?? 0);

    if ($nama == '') {
        $errors[] = "Nama wajib diisi.";
    }

    if ($email == '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    if ($wa == '') {
        $errors[] = "Nomor WhatsApp wajib diisi.";
    }

    if (!array_key_exists($kelas, $kelasList)) {
        $errors[] = "Pilih kelas yang tersedia.";
    }

    if ($jumlah < 1) {
        $errors[] = "Jumlah peserta minimal 1.";
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['success'] = false;
        header("Location: index.php");
        exit;
    }

    $harga = $kelasList[$kelas];
    $total = $harga * $jumlah;

    $_SESSION['order'] = [
        'nama' => $nama,
        'email' => $email,
        'wa' => $wa,
        'kelas' => $kelas,
        'jumlah' => $jumlah,
        'harga' => $harga,
        'total' => $total
    ];

    $_SESSION['success'] = true;

    header("Location: index.php");
    exit;
}

header("Location: index.php");
exit;