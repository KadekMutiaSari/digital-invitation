<?php
session_start();

// Memastikan bahwa ada informasi pesanan yang disimpan di sesi
if (!isset($_SESSION['pesanan'])) {
    header("Location: pesanan.php");
    exit();
}

// Mendapatkan informasi pesanan dari sesi
$pesanan = $_SESSION['pesanan'];
unset($_SESSION['pesanan']); // Hapus informasi pesanan dari sesi setelah ditampilkan

// Nomor WhatsApp untuk dihubungi
$nomor_whatsapp = '6289524655346';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pesanan</title>
    <link rel="icon" type="image/x-icon" href="images/di_icon.png"> <!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <h2>Konfirmasi Pesanan</h2><br>

    <div class="container">
        <p>Pesanan Anda berhasil!</p>
        <p>Segera hubungi kami melalui WhatsApp:</p>
        <p><strong>Nomor WhatsApp:</strong> <?php echo $nomor_whatsapp; ?></p>

        <a href="https://wa.me/<?php echo $nomor_whatsapp; ?>?text=Halo,%20saya%20tertarik%20dengan%20pesanan%20saya%20(<?php echo $pesanan['paket']; ?>)%20dan%20saya%20menginginkan%20info%20lebih%20lanjut."
            target="_blank">
            <button>Contact via WhatsApp</button>
        </a>
    </div>
</body>
</html>
