<?php
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// List paket pesanan beserta harga
$paket_pesanan = [
    'Paket Basic' => 200000,
    'Paket Standard' => 400000,
    'Paket Premium' => 600000,
    'Paket Deluxe' => 800000,
    'Paket Exclusive' => 1000000,
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses pemesanan
    $selected_paket = $_POST['paket'] ?? '';
    $note_pesanan = $_POST['note_pesanan'] ?? '';

    if (!empty($selected_paket)) {
        $total_harga = $paket_pesanan[$selected_paket];
        // Proses penyimpanan pesanan atau langkah selanjutnya sesuai kebutuhan
        // ...

        // Contoh: Simpan pesanan ke dalam sesi untuk ditampilkan di halaman konfirmasi
        $_SESSION['pesanan'] = [
            'paket' => $selected_paket,
            'note_pesanan' => $note_pesanan,
            'total_harga' => $total_harga
        ];

        header("Location: konfirm_pesanan.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan</title>
    <link rel="icon" type="image/x-icon" href="images/di_icon.png"> <!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <h2>Pesanan</h2><br>

    <div class="container">
        <form method="post">
            <label for="paket">Pilih Paket Pesanan:</label><br>
            <select name="paket" id="paket">
                <?php foreach ($paket_pesanan as $paket => $harga): ?>
                    <option value="<?php echo $paket; ?>"><?php echo $paket . ' - $' . $harga; ?></option>
                <?php endforeach; ?>
            </select>

            <br><br>

            <label for="note_pesanan">Note Pesanan:</label>
            <textarea name="note_pesanan" id="note_pesanan" rows="4" cols="50"></textarea>

            <br>

            <input type="submit" name="pesan" value="Pesan">
        </form>

        <?php if (isset($total_harga)): ?>
            <p>Total Harga: Rp<?php echo number_format($total_harga, 0, ',', '.'); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
