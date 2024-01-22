<?php
session_start();

require_once '../dbconfig/dbconfig.php'; // Include the Database class
require_once '../Pelanggan.php'; // Include the Pelanggan class

$db = new Pelanggan($pdo); // Create an instance of the Pelanggan class and pass the PDO connection

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Pelanggan</title>
        <link rel="icon" type="image/x-icon" href="../images/di_icon.png">
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <header>
        <h2>Data Pelanggan</h2>
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
            <table class= "admin-table">
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Email Pelanggan</th>
                    <th>No HP Pelanggan</th>
                </tr>
                <?php
                $pelanggan = $db->getAllPelanggan(); // Get all pelanggan

                foreach ($pelanggan as $pelanggan) {
                    echo 
                    "<tr>
                    <td>{$pelanggan['id_pelanggan']}</td>
                    <td>{$pelanggan['nama_pelanggan']}</td>
                    <td>{$pelanggan['email_pelanggan']}</td>
                    <td>{$pelanggan['no_hp_pelanggan']}</td>
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

