<?php
session_start();

require_once '../dbconfig/dbconfig.php'; // Include the Database class
require_once 'Paket.php'; // Include the Paket class

$db = new Paket($pdo); // Create an instance of the Paket class and pass the PDO connection

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
        <title>Data Paket</title>
        <link rel="icon" type="image/x-icon" href="../images/di_icon.png">
        <link rel="stylesheet" href="admin.css">
    </head>
    <body>
        <header>
        <h2>Data Paket</h2>
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
                    <th>Nama Paket</th>
                    <th>Harga Paket</th>
                    <th>Deskripsi Paket</th>
                </tr>

                <?php
                $paket = $db->getAllPaket(); // Get all Paket
                foreach ($paket as $paket) {
                    echo 
                    "<tr>
                        <td>{$paket['id_paket']}</td>
                        <td>{$paket['nama_paket']}</td>
                        <td class='harga'>{$paket['harga_paket']}</td>
                        <td>{$paket['deskripsi_paket']}</td>
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

