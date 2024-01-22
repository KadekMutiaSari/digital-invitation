<?php
session_start();

require_once '../dbconfig/dbconfig.php'; // Include the Database class
require_once 'Pesanan.php'; // Include the Pesanan class

$db = new Pesanan($pdo); // Create an instance of the Pesanan class and pass the PDO connection

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    header("Location: index.php");
    exit();
}

// Periksa apakah form status_pesanan disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pesanan = $_POST["id_pesanan"];
    $status_pesanan = $_POST["status_pesanan"];

    // Lakukan pembaruan status_pesanan di database
    $updateResult = $db->updatePesanan($id_pesanan, $status_pesanan);

    // if ($updateResult) {
    //     echo "Status pesanan berhasil diperbarui.";
    // } else {
    //     echo "Gagal memperbarui status pesanan.";
    // } belum berhasil menampilkan ini
}

// Ambil data pesanan saat ini
$pesanan = $db->getAllPesanan();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pesanan</title>
    <link rel="icon" type="image/x-icon" href="../images/di_icon.png">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <h2>Data Pesanan</h2>
    </header>

    <section>
        <nav>
            <ul>
                <li><a href="data_admin.php"><b>Data Admin</b></a></li>
                <li><a href="data_paket.php"><b>Data Paket</b></a></li>
                <li><a href="data_pelanggan.php"><b>Data Pelanggan</b></a></li>            
                <li><a href="data_pesanan.php"><b>Data Pesanan</b></a></li>
                <li><a href="../logout.php"><b>Logout</b></a></li>
            </ul>
        </nav>

        <article>
            <table class="admin-table">
                <tr>
                    <th>ID Pesanan</th>
                    <th>ID Pelanggan</th>
                    <th>ID Paket</th>
                    <th>Tanggal Pesanan</th>
                    <th>Note Pesanan</th>
                    <th>Status Pesanan</th>
                </tr>

                <?php
                foreach ($pesanan as $pesanan_row) {
                    echo 
                    "<tr>
                        <td>{$pesanan_row['id_pesanan']}</td>
                        <td>{$pesanan_row['id_pelanggan']}</td>
                        <td>{$pesanan_row['id_paket']}</td>
                        <td>{$pesanan_row['tgl_pesanan']}</td>
                        <td>{$pesanan_row['note_pesanan']}</td>
                        <td>
                            <form method='post' action='{$_SERVER["PHP_SELF"]}'>
                                <input type='hidden' name='id_pesanan' value='{$pesanan_row['id_pesanan']}'>
                                <select name='status_pesanan' onchange='this.form.submit()'>
                                    <option value='PENDING' " . ($pesanan_row['status_pesanan'] == 'PENDING' ? 'selected' : '') . ">PENDING</option>
                                    <option value='DIPROSES' " . ($pesanan_row['status_pesanan'] == 'DIPROSES' ? 'selected' : '') . ">DIPROSES</option>
                                    <option value='SELESAI' " . ($pesanan_row['status_pesanan'] == 'SELESAI' ? 'selected' : '') . ">SELESAI</option>
                                </select>
                            </form>
                        </td>                    
                    </tr>\n";
                }
                ?>
            </table>
        </article>
    </section>

    <footer>
        <div class="credit">created by <span>mutiaaasss</span> | © 2023</div>
    </footer>
</body>
</html>
