<?php
session_start();

// Inisialisasi $pesanan dengan nilai default jika belum ada
$pesanan = isset($_SESSION['pesanan']) ? $_SESSION['pesanan'] : array('paket' => 'Paket Default');

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
    <link rel="stylesheet" type="text/css" href="input.css">
</head>
<body>
    <h2>Konfirmasi Pesanan</h2><br>

    <div class="container">
        <p>Pesanan Anda berhasil!</p>
        <p>Segera hubungi kami melalui WhatsApp</p>
        <p>Nomor WhatsApp: <?php echo $nomor_whatsapp; ?></p>

        <a href="https://wa.me/<?php echo $nomor_whatsapp; ?>?text=Halo,%20saya%20telah%20melakukan%20pemesanan%20(<?php echo $pesanan['paket']; ?>)%20dan%20saya%20menginginkan%20info%20lebih%20lanjut." target="_blank">
            Contact via WhatsApp
        </a><br>
    </div>

</body>
</html>
