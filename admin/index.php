<?php
session_start();

// Jika pengguna belum login, redirect ke halaman login
if (!isset($_SESSION['loggedin_admin']) || $_SESSION['loggedin_admin'] !== true) {
    header("Location: login_admin.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Digital Invitation</title>
        
        <!-- logo icon -->
        <link rel="icon" type="image/x-icon" href="../images/di_icon.png">
        
        <!-- custom css file link -->
        <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
    <header>
      <h2>Halaman Admin</h2>
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
        <h1>Tentang Halaman Admin</h1>
        <p>Terdapat beberapa halaman yang hanya dapat diakses oleh Admin, seperti:</p>
        <ol>
          <li>Data Admin</li>
          <li>Data Paket</li>
          <li>Data Pelanggan</li>
          <li>Data Pesanan</li>
        </ol>
        <p>
          Gunakan menu di sebelah kiri untuk mengakses halaman-halaman tersebut.
        </p>
      </article>
    </section>

    <footer>
        <div class="credit">created by <span>mutiaaasss</span> | © 2023</div>
    </footer>
    </body>
</html>
