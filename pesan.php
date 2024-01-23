<?php
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Memasukkan koneksi dari dbconfig.php
require_once 'dbconfig/dbconfig.php';

// Ambil data paket dari database
$sql = "SELECT * FROM paket";
$result = $pdo->query($sql);

// Periksa jumlah baris hasil query
$rowCount = $result->rowCount();

// Inisialisasi variabel
$id_pelanggan = $_SESSION['id_pelanggan'];

// Proses form pemesanan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paket = $_POST["nama_paket"];
    $note_pesanan = $_POST["note_pesanan"];
    $status_pesanan = "PENDING"; // Langsung atur status_pesanan ke "PENDING"

    // Tanggal pesanan bisa didapatkan dari waktu pembuatan pesanan
    $tgl_pesanan = date("Y-m-d");

    // Simpan pesanan ke database
    $sql = "INSERT INTO pesanan (id_pelanggan, id_paket, tgl_pesanan, note_pesanan, status_pesanan) 
            VALUES (:id_pelanggan, :id_paket, :tgl_pesanan, :note_pesanan, :status_pesanan)";

    // Menggunakan prepared statement untuk menghindari SQL injection
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_pelanggan', $id_pelanggan, PDO::PARAM_INT);
    $stmt->bindParam(':id_paket', $id_paket, PDO::PARAM_INT);
    $stmt->bindParam(':tgl_pesanan', $tgl_pesanan, PDO::PARAM_STR);
    $stmt->bindParam(':note_pesanan', $note_pesanan, PDO::PARAM_STR);
    $stmt->bindParam(':status_pesanan', $status_pesanan, PDO::PARAM_STR);

    // Setelah pesanan berhasil dibuat
    if ($stmt->execute()) {
        // Redirect langsung ke halaman konfirm_pesanan.php
        header("Location: konfirm_pesanan.php");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
        // Pastikan tidak ada output lainnya sebelum header
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Pemesanan Paket</title>
    <link rel="icon" type="image/x-icon" href="images/di_icon.png"> <!-- logo icon -->
    <link rel="stylesheet" type="text/css" href="input.css">
    <script>
        function updateHarga() {
            // Mendapatkan nilai yang dipilih dari nama_paket dropdown
            var selectedPaket = document.getElementById("nama_paket").value;

            // Menetapkan harga_paket sesuai dengan pilihan nama_paket
            var hargaPaket = document.getElementById("nama_paket").options[document.getElementById("nama_paket").selectedIndex].getAttribute('data-harga');
            document.getElementById("harga_paket").value = hargaPaket;
        }
    </script>
</head>
<body>
    <h2>Pemesanan Paket</h2>
    <div class="container">
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="nama_paket">Nama Paket:</label>
            <select name="nama_paket" id="nama_paket" onchange="updateHarga()">
                <?php
                if ($rowCount > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row["id_paket"] . "' data-harga='" . $row["harga_paket"] . "'>" . $row["nama_paket"] . "</option>";
                    }
                }
                ?>
            </select>
            <br><br>
            <label for="harga_paket">Harga Paket:</label>
            <input type="text" name="harga_paket" id="harga_paket" readonly>
            <label for="note_pesanan">Note Pesanan:</label><br>
            <textarea name="note_pesanan" id="note_pesanan" rows="4" cols="50"></textarea>
            <br><br>
            <input type="submit" name= 'submit_pesanan' value="Buat Pesanan">
        </form>
    </div>
</body>
</html>
